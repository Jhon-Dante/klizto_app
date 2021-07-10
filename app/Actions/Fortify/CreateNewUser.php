<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Levels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        dd($input);
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            //
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required','image','max:1024'],
            //
            'direction' => ['required'],
            'description' => ['required'],
            'phone' => ['required'],
            'category_id' => ['required'],
            'services_id' => ['required'],
            //
            'bank_id' => ['required'],
            'count_bank' => ['required'],
            //
            'name_employed' => ['required'],
            'last_name_employed' => ['required'],
            'phone_employed' => ['required'],
            'personal_email' => ['required'],
            // 'password_personal' => ['required'],
            // 'password_confirmation_personal' => ['required'],
            //
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $level_id=4;

        return DB::transaction(function () use ($input, $level_id, $wallet) {
            return tap(User::create([
                'name' => $input['name'],
                'profile_photo_path' => $this->uploadImage(1),
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'level_id' => $level_id,
                'count_bank' => $input['count_bank'],
                'bank_id' => $input['bank_id'],
                'services_id' => $input['services_id']

            ]), function (User $user) {
                // $this->createPremise($user, $input);
                // $this->createWallet($user,);
                $this->createOwner($user, $input);
                $this->createTeam($user, $input);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    public function uploadImage($option)
    {
        return $option;
    }

    protected function createTeam(User $user, $input)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    protected function createOwner(User $user, $input)
    {
        $owner=\DB::table('owner')->insert([
            'name' => $input['name_employed'],
            'last_name' => $input['last_name_employed'],
            'phone' => $input['phone_employed'],
            'email' => $input['personal_email']
        ]);

        $this->createPremise($user, $input, $owner);
    }

    protected function createPremise($user, $input, $owner)
    {
        $premise=\DB::table('premises')->insert([
            'user_id' => $user->id,
            'service_id' => $input['service_id'],
            'count_bank' => $input['count_bank'],
            'bank_id' => $input['bank_id'],
            'owner_id' => $owner->id
        ]);

        $this->createWallet($premise);
        $this->createBranch($premise, $input);
    }

    protected function createWallet($premise)
    {
        $wallet= \DB::table('wallets')->insert([
            'monto' => 0,
            'description' => 'Bienvenido',
            'premise_id' => $premise->id,
            'status' => 0
        ]);
    }

    protected function createBranch($premise, $input)
    {
        $premise=\DB::table('branches')->insert([
            'direction' => $input['direction'],
            'phone' => $input['description'],
            'premise_id' => $premise->id,
            'principal' => 1
        ]);
    }
}
