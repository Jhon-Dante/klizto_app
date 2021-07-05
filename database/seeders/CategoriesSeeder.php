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
			'name' => 'Secado',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Planchado',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Tintes',
			'image' => null,
			'status' => 1
		]);

		\DB::table('categories')->insert([
			'name' => 'Esmaltado',
			'image' => null,
			'status' => 1
		]);
    }
}
