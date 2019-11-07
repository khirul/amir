<?php

use App\Seccontingent;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecContingentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    	Seccontingent::create(
            [
                'section_name' => 'Ketua Cawangan Khas',
            ]);
            Seccontingent::create(
                [
                    'section_name' => 'Timbalan Ketua Cawangan Khas',
                ]);
	}
}
