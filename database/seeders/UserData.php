<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tabel = [
            [
                'name' => 'Admin',
                'email' => 'unisec.uajy@gmail.com',
                'username' => 'admin',
                'password'  => bcrypt('admin12345'),
                'level' => 1,
            ],
            [
                'name' => 'Penanggung Jawab Valorant',
                'email' => '1',
                'username' => 'pjvalo',
                'password'  => bcrypt('123456'),
                'level' => 2,
            ],
            [
                'name' => 'Penanggung Jawab Mobile Legend',
                'email' => '2',
                'username' => 'pjml',
                'password'  => bcrypt('123456'),
                'level' => 2,
            ],
            [
                'name' => 'Penanggung Jawab Dota 2',
                'email' => '3',
                'username' => 'pjdota',
                'password'  => bcrypt('123456'),
                'level' => 2,
            ],
            [
                'name' => 'Penanggung Jawab PUBG Mobile',
                'email' => '4',
                'username' => 'pjpubgm',
                'password'  => bcrypt('123456'),
                'level' => 2,
            ],
        ];

        foreach ($tabel as $key => $value) {
            User::create($value);
        }
    }
}
