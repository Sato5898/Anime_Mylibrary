<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
        DB::table('animes')->insert([
            'anime_name'=>'サンプル1',
            'genre'=>'ジャンル1',
            'official_page'=>'サイト1',
        ]);
    }
}
