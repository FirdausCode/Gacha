<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wilayahs')->insert([
          'name' => 'Bandung',
      ]);
        DB::table('wilayahs')->insert([
          'name' => 'Jakarta',
      ]);
    }
} 
