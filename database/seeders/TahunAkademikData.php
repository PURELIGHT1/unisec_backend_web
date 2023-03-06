<?php

namespace Database\Seeders;

use App\Models\TahunAkademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademikData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tabel = [
            [
                'name' => 'TA. 2021/2022',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'TA. 2022/2023',
                'status' => 'Aktif',
                'creator' => 1,
            ],
        ];

        foreach ($tabel as $key => $value) {
            TahunAkademik::create($value);
        }
    }
}
