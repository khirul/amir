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
                'subsection_name' => 'Timbalan Ketua Cawangan Khas Risikan & Operasi',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '2',
                    'subsection_name' => 'Timbalan Ketua Cawangan Khas Pengurusan & Koordinasi',
                ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '3',
                'subsection_name' => 'Pegawai Turus E2',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '3',
                'subsection_name' => 'E2A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '3',
                    'subsection_name' => 'E2B',
                ]);
                SubSeccontingent::create(
                    [
                        'seccontingent_id' => '3',
                        'subsection_name' => 'E2C',
                    ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '4',
                'subsection_name' => 'Pegawai Turus E3',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '4',
                'subsection_name' => 'E3A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '4',
                    'subsection_name' => 'E3B',
                ]);
                SubSeccontingent::create(
                    [
                        'seccontingent_id' => '4',
                        'subsection_name' => 'E3C',
                    ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '5',
                'subsection_name' => 'Pegawai Turus E4',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '5',
                'subsection_name' => 'E4A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '5',
                    'subsection_name' => 'E4B',
                ]);
                SubSeccontingent::create(
                    [
                        'seccontingent_id' => '5',
                        'subsection_name' => 'E4C',
                    ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '6',
                'subsection_name' => 'Pegawai Turus E5',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '6',
                'subsection_name' => 'E5A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '6',
                    'subsection_name' => 'E5B',
                ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '7',
                'subsection_name' => 'Pegawai Turus E6',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '7',
                'subsection_name' => 'E6A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '7',
                    'subsection_name' => 'E6B',
                ]);
                SubSeccontingent::create(
                    [
                        'seccontingent_id' => '7',
                        'subsection_name' => 'E6C',
                    ]);
                    SubSeccontingent::create(
                        [
                            'seccontingent_id' => '7',
                            'subsection_name' => 'E6D',
                        ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '8',
                'subsection_name' => 'Pegawai Turus E7',
            ]);
        SubSeccontingent::create(
            [
                'seccontingent_id' => '8',
                'subsection_name' => 'E7A',
            ]);
            SubSeccontingent::create(
                [
                    'seccontingent_id' => '8',
                    'subsection_name' => 'E7B',
                ]);
                SubSeccontingent::create(
                    [
                        'seccontingent_id' => '8',
                        'subsection_name' => 'E7C',
                    ]);
                
	}
}
