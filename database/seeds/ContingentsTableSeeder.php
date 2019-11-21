<?php

use App\Contingent;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContingentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    	Contingent::create(
            [
                'kontinjen_name' => 'Johor',
            ]);
            Contingent::create(
                [
                    'kontinjen_name' => 'Kedah',
                ]);
                Contingent::create(
                    [
                        'kontinjen_name' => 'Kelantan',
                    ]);
                    Contingent::create(
                        [
                            'kontinjen_name' => 'Melaka',
                        ]);
                        Contingent::create(
                            [
                                'kontinjen_name' => 'Negeri Sembilan',
                            ]);
                            Contingent::create(
                                [
                                    'kontinjen_name' => 'Pahang',
                                ]);
                                Contingent::create(
                                    [
                                        'kontinjen_name' => 'Pulau Pinang',
                                    ]);
                                    Contingent::create(
                                        [
                                            'kontinjen_name' => 'Perak',
                                        ]);
                                        Contingent::create(
                                            [
                                                'kontinjen_name' => 'Perlis',
                                            ]);
                                            Contingent::create(
                                                [
                                                    'kontinjen_name' => 'Selangor',
                                                ]);
                                                Contingent::create(
                                                    [
                                                        'kontinjen_name' => 'Terengganu',
                                                    ]);
                                                    Contingent::create(
                                                        [
                                                            'kontinjen_name' => 'Sabah',
                                                        ]);
                                                        Contingent::create(
                                                            [
                                                                'kontinjen_name' => 'Sarawak',
                                                            ]);
                                                            Contingent::create(
                                                                [
                                                                    'kontinjen_name' => 'Kuala Lumpur',
                                                                ]);
        
	}
}
