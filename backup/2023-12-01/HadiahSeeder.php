<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('hadiahs')->insert([
        'name' => 'NMax',
        'jumlahHadiah' => 1,
        'description' => 'Yamaha Nmax',
        'img' => 'hadiah_Nmax_1697294219.png',
        'wilayah_id' => 1,
    ]);
      DB::table('hadiahs')->insert([
        'name' => 'Scoopy',
        'jumlahHadiah' => 2,
        'description' => 'Honda Scoopy',
        'img' => 'hadiah_motor scopy_1697294272.jpeg',
        'wilayah_id' => 2,
    ]);

    }
}
