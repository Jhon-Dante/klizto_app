<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
			'name' => 'Cabello',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Pies',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Manos',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Cuerpo Entero',
			'image' => null,
			'status' => 1
		]);
    }
}
