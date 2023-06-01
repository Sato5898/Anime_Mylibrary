<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App/Models/User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $names = [
            'taro' => '太郎',
            'jiro' => '次郎',
            'saburo' => '三郎',
            'shiro' => '四郎',
            'taro' => '五郎',
            'rokuro' => '六郎',
            'shichiro' => '七郎',
            'hachiro' => '八郎',
            'taro' => '九郎',
        ];

        foreach($name as $name_en => $name_jp){

            User::create([
                'name' => $name_jp,
                'email' => $name_en .'@example.com',
                'password' => bcrypt('XXXXXXXXXXXXX')
            ]);
        }
    }
}
