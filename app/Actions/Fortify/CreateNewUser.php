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
        // dd($input['image']);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required','image','max:1024'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $level_id=4;
        // if (isset($input['image'])) {
        //    $photo->storePublicly();
        // }

        // dd($photo);
        $wallet= \DB::table('wallets')->insert([
            'monto' => 0,
            'description' => 'Bienvenido'

        ]);

        return DB::transaction(function () use ($input, $level_id, $wallet) {
            return tap(User::create([
                'name' => $input['name'],
                'profile_photo_path' => $input['image'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'level_id' => $level_id,
                //billetera
                'wallet_id' => $wallet->id,
                //cuenta bancaria
                'count_bank' => $input['count_bank'],
                'bank_id' => $input['bank_id'],
                'services_id' => $input['services_id']

            ]), function (User $user) {
                $this->createPremise($user, $input);
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
    protected function createTeam(User $user, $input)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    protected function createPremise(User $user, $input)
    {
        $premise=\DB::table('premises')->insert([
            'nombre' => $
            'category_id' => $
            'user_id' => $
            'status' => $
            'services_id' => $
            'count_bank' => $
            'bank_id' => $
        ]);
    }

    protected function createOwner(User $user, $input)
    {

    }
}
