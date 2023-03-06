<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiData extends Seeder
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
                'name' => 'Informatika',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Sistem Informasi',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Teknik Sipil',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Arsitektur',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Biologi',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Manajemen',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Akuntansi',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Ilmu Hukum',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Teknik Industri',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Ilmu Komunikasi',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Sosiologi',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Ekonomi Pembangunan',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Manajemen Kelas Internasional',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Akuntansi Kelas Internasional',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Teknik Industri Kelas Internasional',
                'status' => 'Aktif',
                'creator' => 1,
            ],
            [
                'name' => 'Teknik Industri ATMI',
                'status' => 'Aktif',
                'creator' => 1,
            ],
        ];

        foreach ($tabel as $key => $value) {
            Prodi::create($value);
        }
    }
}
