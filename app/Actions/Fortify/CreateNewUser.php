<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Levels;
use App\Models\Owner;
use App\Models\Premises;
use App\Models\Services;
use App\Models\Wallet;
use App\Models\Branches;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

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
        if($input['option'] == 1){
            Validator::make($input, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'name' => ['required', 'string', 'max:255'],
                'bank_id' => ['required'],
                'count_bank' => ['required'],
                //
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ],
            [
                'email.required' => 'Debe especificar un correo válido',
                'password.required' => 'Ingrese una contraseña válida',
                'name.required' => 'Ingrese eñ nombre de su negocio',
                'bank_id.required' => 'Indique el banco donde se operarán sus transferencias',
                'count_bank.required' => 'Indique el número de cuenta del banco seleccionado',
                'terms.required' => 'Debe aceptar los términos y condiciones'
            ])->validate();

            $level_id=4;

            return DB::transaction(function () use ($input, $level_id) {
                return tap(User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                    'level_id' => $level_id
                ]), function (User $user) use ($input) {
                    // $this->uploadImage($user, $input);
                    // $this->createWallet($user, $input);
                    $this->createTeam($user, $input);
                });
            });

        }else{
            Validator::make($input, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                //
                'name' => ['required', 'string', 'max:255'],
                'image' => ['required','image','max:1024'],
                //
                'direction' => ['required'],
                'description' => ['required'],
                'phone' => ['required', 'numeric'],
                // 'category_id' => ['required'],
                'bank_id' => ['required'],
                'count_bank' => ['required'],
                //
                'name_employed' => ['required'],
                'last_name_employed' => ['required'],
                'phone_employed' => ['required', 'numeric'],
                'personal_email' => ['required','string','email','unique:owners,email'],
                // 'password_personal' => ['required'],
                // 'password_confirmation_personal' => ['required'],
                //
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ],
            [
                'email.required' => 'Debe especificar un correo válido',
                'email.required' => 'Debe especificar un correo válido',
                'password.required' => 'Ingrese una contraseña válida',
                'name.required' => 'Ingrese eñ nombre de su negocio',
                'image.required' => 'Seleccione una imagen con el que se le pueda identificar',
                'direction.required' => 'Especifique la dirección de su negocio',
                'description.required' => 'Transcriba una descripción para que las personas puedan conocer su negocio',
                'phone.required' => 'Especifique el teléfono de contacto de su negocio',
                // 'category_id.required' => ''
                'bank_id.required' => 'Indique el banco donde se operarán sus transferencias',
                'count_bank.required' => 'Indique el número de cuenta del banco seleccionado',
                'name_employed.required' => 'Ingrese el nombre del encargado',
                'last_name_employed.required' => 'Ingrese el apellido del encargado',
                'phone_employed.required' => 'Ingrese un teléfono de contacto válido del encargado',
                'personal_email.required' => 'Ingrese un correo válido del encargado',
                'terms.required' => 'Debe aceptar los términos y condiciones'
            ])->validate();
        }


        $level_id=3;

        return DB::transaction(function () use ($input, $level_id) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'profile_photo_path' => 'imagen',
                'level_id' => $level_id
            ]), function (User $user) use ($input) {
                $this->uploadImage($user, $input);
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

    public function uploadImage($user, $input)
    {
        // dd($input['image']);
        $file = $input['image'];
        //Se optiene el nombre
        $name = time()."".$user->id.".png";
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('user')->put($name,  \File::get($file));
        // $avatar = Storage::putFile('public/defaults/users/avatar/', base64_decode($file_data));

        $user->profile_photo_path=$name;
        $user->save();
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
        $owner=Owner::create([
            'name' => $input['name_employed'],
            'last_name' => $input['last_name_employed'],
            'phone' => $input['phone_employed'],
            'email' => $input['personal_email']
        ]);

        $this->createPremise($user, $input, $owner);
    }

    protected function createPremise($user, $input, $owner)
    {
         // $random = Str::random(10);
        $date= substr(date('Y'),2);
        $profile = strtolower(substr($input['name'], 0, 5).''.$date);

        $premise=Premises::create([
            'user_id' => $user->id,
            'profile' => $profile,
            'count_bank' => $input['count_bank'],
            'bank_id' => $input['bank_id'],
            'owner_id' => $owner->id
        ]);

        // $premise=\DB::table('premises')->where()

        $this->createWallet($premise);
        $this->createBranch($premise, $input);
    }

    protected function createWallet($premise)
    {
        $wallet= Wallet::create([
            'monto' => 0,
            'description' => 'Bienvenido',
            'premise_id' => $premise->id
        ]);
    }

    protected function createBranch($premise, $input)
    {
        $branch=Branches::create([
            'direction' => $input['direction'],
            'phone' => $input['phone'],
            'premise_id' => $premise->id,
            'principal' => 1
        ]);
    }
}
