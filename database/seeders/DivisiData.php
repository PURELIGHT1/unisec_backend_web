<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiData extends Seeder
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
                'name' => 'Mobile Legend',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Pubg Mobile',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Dota 2',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Valorant',
                'status' => 'Aktif',
                'creator' => 1,
            ],
        ];

        foreach ($tabel as $key => $value) {
            Divisi::create($value);
        }
    }
}
