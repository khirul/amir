<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(SecContingentsTableSeeder::class);
        $this->call(SubSecContigentsTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(ContingentsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
    }
}
