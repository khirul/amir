<?php

use App\Role;
use App\SubCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    SubCategory::create(
        [
            'category_id' => '1',
            'subcategory_name' => 'E2M',
        ]);
    	SubCategory::create(
            [
                'category_id' => '1',
                'subcategory_name' => 'E2A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '1',
                    'subcategory_name' => 'E2B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '1',
                        'subcategory_name' => 'E2C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '1',
                            'subcategory_name' => 'E2D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '2',
            'subcategory_name' => 'E3M',
        ]);
        SubCategory::create(
            [
                'category_id' => '2',
                'subcategory_name' => 'E3A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '2',
                    'subcategory_name' => 'E3B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '2',
                        'subcategory_name' => 'E3C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '2',
                            'subcategory_name' => 'E3D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '3',
            'subcategory_name' => 'E4M',
        ]);             
        SubCategory::create(
            [
                'category_id' => '3',
                'subcategory_name' => 'E4A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '3',
                    'subcategory_name' => 'E4B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '3',
                        'subcategory_name' => 'E4C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '3',
                            'subcategory_name' => 'E4D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '4',
            'subcategory_name' => 'E5M',
        ]);
        SubCategory::create(
            [
                'category_id' => '4',
                'subcategory_name' => 'E5A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '4',
                    'subcategory_name' => 'E5B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '4',
                        'subcategory_name' => 'E5C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '4',
                            'subcategory_name' => 'E5D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '5',
            'subcategory_name' => 'E6M',
        ]);
        SubCategory::create(
            [
                'category_id' => '5',
                'subcategory_name' => 'E6A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '5',
                    'subcategory_name' => 'E6B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '5',
                        'subcategory_name' => 'E6C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '5',
                            'subcategory_name' => 'E6D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '6',
            'subcategory_name' => 'E7M',
        ]);
        SubCategory::create(
            [
                'category_id' => '6',
                'subcategory_name' => 'E7A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '6',
                    'subcategory_name' => 'E7B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '6',
                        'subcategory_name' => 'E7C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '6',
                            'subcategory_name' => 'E7D',
                        ]);

    SubCategory::create(
        [
            'category_id' => '7',
            'subcategory_name' => 'E8M',
        ]);
        SubCategory::create(
            [
                'category_id' => '7',
                'subcategory_name' => 'E8A',
            ]);
            SubCategory::create(
                [
                    'category_id' => '7',
                    'subcategory_name' => 'E8B',
                ]);
                SubCategory::create(
                    [
                        'category_id' => '7',
                        'subcategory_name' => 'E8C',
                    ]);
                    SubCategory::create(
                        [
                            'category_id' => '7',
                            'subcategory_name' => 'E8D',
                        ]);
                
        
	}
}
