<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    public function run()
    {
        // 新增一筆資料
        DB::table('members')->insert([
            'name' => 'ooo',
            'mobile' => '0900123123',
            'password' => Hash::make('0000'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
