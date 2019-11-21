<?php

use App\Role;
use App\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    Category::create(
        [
            'category_name' => 'BP&K',
        ]);
    Category::create(
            [
                'category_name' => 'E1M',
            ]);
    	Category::create(
            [
                'category_name' => 'E2M',
            ]);
            Category::create(
                [
                    'category_name' => 'E3M',
                ]);
                Category::create(
                    [
                        'category_name' => 'E4M',
                    ]);
                    Category::create(
                        [
                            'category_name' => 'E5M',
                        ]);
                        Category::create(
                            [
                                'category_name' => 'E6M',
                            ]);
                            Category::create(
                                [
                                    'category_name' => 'E7M',
                                ]);
                                Category::create(
                                    [
                                        'category_name' => 'E8M',
                                    ]);
        
	}
}
