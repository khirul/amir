<?php

use App\Rank;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	public function run(){
    	Rank::create(
            [
                'rank_name' => 'KONST',
            ]);
            Rank::create(
                [
                    'rank_name' => 'L/KPL/D',
                ]);
                Rank::create(
                    [
                        'rank_name' => 'KPL/D',
                    ]);
                    Rank::create(
                        [
                            'rank_name' => 'SJN/D',
                        ]);
                        Rank::create(
                            [
                                'rank_name' => 'SM/D',
                            ]);
                            Rank::create(
                                [
                                    'rank_name' => 'SI/D',
                                ]);
                                Rank::create(
                                    [
                                        'rank_name' => 'INSP',
                                    ]);
                                    Rank::create(
                                        [
                                            'rank_name' => 'ASP',
                                        ]);
                                        Rank::create(
                                            [
                                                'rank_name' => 'DSP',
                                            ]);
                                            Rank::create(
                                                [
                                                    'rank_name' => 'SUPT',
                                                ]);
                                                Rank::create(
                                                    [
                                                        'rank_name' => 'ACP',
                                                    ]);
                                                    Rank::create(
                                                        [
                                                            'rank_name' => 'SAC',
                                                        ]);
                                                        Rank::create(
                                                            [
                                                                'rank_name' => 'DCP',
                                                            ]);
                                                            Rank::create(
                                                                [
                                                                    'rank_name' => 'CP',
                                                                ]);
        
	}
}
