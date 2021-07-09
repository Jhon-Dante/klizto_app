<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('services')->insert([
			'name' => 'Tintes',
			'description' => 'Coloramiento para el cabello',
			'category_id' => 1,
			'status' => 1
		]);

		\DB::table('services')->insert([
			'name' => 'Cortes',
			'description' => 'Cortes de cabello del catálogo',
			'category_id' => 1,
			'status' => 1
		]);

		\DB::table('services')->insert([
			'name' => 'Planchado',
			'description' => 'Planchado de Pelo',
			'category_id' => 1,
			'status' => 1
		]);

		\DB::table('services')->insert([
			'name' => 'Manicure',
			'description' => 'Esmaltado de manos',
			'category_id' => 2,
			'status' => 2
		]);

		\DB::table('services')->insert([
			'name' => 'Pedicure',
			'description' => 'Esmaltado de pies',
			'category_id' => 3,
			'status' => 1
		]);

		\DB::table('services')->insert([
			'name' => 'Masajes',
			'description' => 'Masajes relajantes para todo el cuerpo',
			'category_id' => 4,
			'status' => 1
		]);


    }
}
