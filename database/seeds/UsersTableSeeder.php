<?php

use App\Role;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    	$user1 = User::firstOrCreate([
            'name' => 'admin',
            'no_badan' => 'G00001',
            'jawatan' => 'Insp E7D1/A',
            'rank_id' => '7',
            'email' => 'admin@esmail.com',
            'cawangan' => 'Bukit Aman',
            'kontinjen' => '',
            'category_id' => 6,
            'subcategory_id' => 26,
            'status' => 1,
			'password' => bcrypt('123456'),
        ]);
        
        Role::firstOrCreate([
            'name' => 'admin',
            'user_id' => $user1->id
        ]);

    	// $user2 = User::firstOrCreate([
        //     'name' => 'Kpl Azrul Hisyam Bin Ibrahim',
        //     'email' => 'azrul_hisyam@esmail.com',
        //     'status' => 1,
        //     'category_id' => 1,
        //     'subcategory_id' => 1,
		// 	'password' => bcrypt('azrul_hisyam123'),	
        //     ]);
            
        //     Role::firstOrCreate([
        //         'name' => 'petugas',
        //         'user_id' => $user2->id
        //     ]);

    	// $user3 = User::firstOrCreate([
        //     'name' => 'Kpl Muhammad Firdaus Bin Idris',
        //     'email' => 'muhammad_firdaus@esmail.com',
        //     'status' => 1,
        //     'category_id' => 1,
        //     'subcategory_id' => 1,
		// 	'password' => bcrypt('muhammad_firdaus123'),	
        //     ]);
            
        //     Role::firstOrCreate([
        //         'name' => 'petugas',
        //         'user_id' => $user3->id
        //     ]);

    	// $user4 = User::firstOrCreate([
        //     'name' => 'Konst Mohd Azrin Shah Bin Abu Hasan',
        //     'email' => 'mohd_azrin@esmail.com',
        //     'status' => 1,
        //     'category_id' => 1,
        //     'subcategory_id' => 1,
		// 	'password' => bcrypt('mohd_azrin123'),	
        //     ]);
            
        //     Role::firstOrCreate([
        //         'name' => 'petugas',
        //         'user_id' => $user4->id
        //     ]);
        
	}
}
