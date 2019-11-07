<?php

use App\SubSeccontingent;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSecContigentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
        SubSeccontingent::create(
        [
            'seccontingent_id' => '1',
            'subsection_name' => 'Ketua Cawangan Khas',
        ]);
    	SubSeccontingent::create(
            [
                'seccontingent_id' => '2',
                'subsection_name' => 'Timbalan Ketua Cawangan Khas 1',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '2',
                    'subsection_name' => 'Timbalan Ketua Cawangan Khas 2',
                ]);
	}
}
