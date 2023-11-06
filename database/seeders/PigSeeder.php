<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PigSeeder extends Seeder
{
    public function run()
    {
        DB::table('pigs')->insert(
            [
                [
                    'introduction' => '祝興',
                    'breed' => 'D',
                    'sex' => 1,
                    'name' => '14亞和',
                    'pig_number' => '242836',
                    'price' => 13842,
                    'status' => 0,
                    'boar_semen' => 2,
                    'created_at' => now()->toDateString(),
                ],
                [
                    'introduction' => '順安',
                    'breed' => 'D',
                    'sex' => 1,
                    'name' => '19季穆',
                    'pig_number' => '242837',
                    'price' => 38783,
                    'status' => 0,
                    'boar_semen' => 3,
                    'created_at' => now()->toDateString(),
                ],
                [
                    'introduction' => '暉煌',
                    'breed' => 'D',
                    'sex' => 1,
                    'name' => '06殿蕭',
                    'pig_number' => '242838',
                    'price' => 41891,
                    'status' => 0,
                    'boar_semen' => 2,
                    'created_at' => now()->toDateString(),
                ],
                [
                    'introduction' => '暉煌',
                    'breed' => 'D',
                    'sex' => 1,
                    'name' => '17合尹',
                    'pig_number' => '242839',
                    'price' => 48327,
                    'status' => 0,
                    'boar_semen' => 4,
                    'created_at' => now()->toDateString(),
                ],
                [
                    'introduction' => '祝興',
                    'breed' => 'D',
                    'sex' => 1,
                    'name' => '16合姚',
                    'pig_number' => '242840',
                    'price' => 34444,
                    'status' => 0,
                    'boar_semen' => 4,
                    'created_at' => now()->toDateString(),
                ]
            ],
        );
    }
}
