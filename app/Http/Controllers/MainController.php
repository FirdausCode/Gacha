<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use App\Models\Nasabah;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function welcome() {
      return view ('pages.welcome');
    }

    public function pilihWilayah() {
      $wilayah = Wilayah ::all();

      return view('pages.pilihWilayah', compact('wilayah'));
    }

    public function pilihHadiah($id) {
      $wilayah = Wilayah::find($id);
      $hadiah = Hadiah ::where('wilayah_id' , $id )->get();

      return view('pages.pilihHadiah', compact('hadiah', 'wilayah'));
    }


        
    public function undiPemenang($id) {
      $hadiahNasabah = Hadiah::with('nasabah')->where('id', $id)->firstOrFail();

      // dd($hadiahNasabah);
      return view('pages.undiHadiah', compact('hadiahNasabah'));
    }

    public function hasilUndi($id)
    {
      // 1. Retrieve the specific Hadiah by its ID.
      $hadiahNasabah = Hadiah::where('id', $id)->firstOrFail();

      // 2. Randomly select Nasabah records based on $id.
      if ($id == 1) {
          $hasilUndiNasabah = Nasabah::inRandomOrder()->limit(1)->get();
      } elseif ($id == 2) {
          $hasilUndiNasabah = Nasabah::inRandomOrder()->limit(2)->get();
      } elseif ($id == 3) {
          $hasilUndiNasabah = Nasabah::inRandomOrder()->limit(3)->get();
      } elseif ($id == 4) {
          $hasilUndiNasabah = Nasabah::inRandomOrder()->limit(4)->get();
      } else {
          // Handle other cases or set $hasilUndiNasabah to an appropriate default value.
      }

      // 3. Update the hadiah_id for the selected Nasabah records.
      foreach ($hasilUndiNasabah as $nasabah) {
          $nasabah->update(['hadiah_id' => $id]);
      }

      // 4. Return the results to a view.
      Alert::success('Anda Berhasil, Selamat!!!', 'Kepada Para Pemenang');
      return view('pages.hasilUndiFinal', compact('hasilUndiNasabah', 'hadiahNasabah'));
    }


















    
    public function dashboard()
    {
        return view('admin.index');
    }
}
