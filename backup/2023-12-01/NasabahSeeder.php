<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('nasabahs')->insert([
      'name' => 'Rifqi',
      'nameCabang' => 'Soreang',
      'cif' => '123',
      'wa' => '123',
      'wilayah_id' => '1',
  ]);
    }
}
