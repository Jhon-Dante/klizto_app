<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('levels')->insert([
			'name' => 'Administrador',
			'code' => 'user/admin'
		]);

		\DB::table('levels')->insert([
			'name' => 'Empleado',
			'code' => 'user/employed'
		]);

		\DB::table('levels')->insert([
			'name' => 'Comprador',
			'code' => 'user/buyer'
		]);

		\DB::table('levels')->insert([
			'name' => 'Cliente',
			'code' => 'user/admin'
		]);
    }
}
