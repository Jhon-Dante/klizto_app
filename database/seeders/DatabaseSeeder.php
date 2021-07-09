<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	LevelsSeeder::class,
            CategoriesSeeder::class,
            ServicesTableSeeder::class,
            BanksTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
