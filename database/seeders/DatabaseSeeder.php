<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('nasabahs')->insert([
          'name' => 'rifqi',
          'nameCabang' => 'Cianjur',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'munawar',
          'nameCabang' => 'Cianjur',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'ridwan',
          'nameCabang' => 'Cianjur',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'firdaus',
          'nameCabang' => 'Bekasi',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'Nur',
          'nameCabang' => 'Cikarang',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'Hariyanto',
          'nameCabang' => 'Bekasi',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'Raie',
          'nameCabang' => 'Bandung',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'Aswajjillah',
          'nameCabang' => 'Bandung',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);
        DB::table('nasabahs')->insert([
          'name' => 'restu faisal',
          'nameCabang' => 'Bandung',
          'cif' => '123456',
          'wa' => '085123456789',
      ]);


      DB::table('wilayahs')->insert([
          'name' => 'Jakarta',
      ]);
      DB::table('wilayahs')->insert([
          'name' => 'Bandung',
      ]);


      DB::table('hadiahs')->insert([
          'name' => 'Nmax',
          'description' => 'Yamaha',
          'img' => 'hadiah_Nmax_1697294219.png',
          'wilayah_id' => '1',
      ]);
      DB::table('hadiahs')->insert([
          'name' => 'Scoopy',
          'description' => 'Honda',
          'img' => 'hadiah_motor scopy_1697294272.jpeg',
          'wilayah_id' => '2',
      ]);

    }
}
