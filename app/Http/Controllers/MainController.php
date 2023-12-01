<?php

namespace App\Http\Controllers;

use App\Http\Resources\NasabahResource;
use App\Models\Hadiah;
use GuzzleHttp\Client;
use App\Models\Nasabah;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function welcome() { //hal 1
      return view ('pages.welcome');
    }

    public function pilihWilayah() { //hal 2
      $wilayah = Wilayah ::all();

      return view('pages.pilihWilayah', compact('wilayah'));
    }

    public function pilihHadiah($id) { //hal 3 id wilayah
      $wilayah = Wilayah::find($id);
      $hadiah = Hadiah::where('wilayah_id', $id)->get();
      $nasabah = Nasabah::where('wilayah_id', $id)->get();
  
      // dd($nasabah);
      // Simpan $nasabah dalam session
      session(['nasabah' => $nasabah]);
  
      return view('pages.pilihHadiah', compact('hadiah', 'wilayah', 'nasabah'));
  } //sudah benar tidak usah di ganggu
  
  
public function undiPemenang($id) { //id hadiah hal 4
  $jumlahHadiah = Hadiah::where('id', $id)->value('jumlahHadiah');
  $hadiahNasabah = Hadiah::with('nasabah')->where('id', $id)->firstOrFail(); //mencari nasabah yang sudah menang

  // dd($hadiahNasabah);
  // Ambil $nasabah dari databsae, untuk random name saat loading
  $nasabah = Nasabah::all();
  return view('pages.undiHadiah', compact('hadiahNasabah', 'jumlahHadiah', 'nasabah'));
}

public function hasilUndi($id)
{
    // Ambil $nasabah dari session
    $nasabah = session('nasabah');

    // Data seluruh nasabah berdasarkan id wilayah
    $nasabahByWilayah = $nasabah;

    // Pilih secara acak satu rekaman dari model $nasabahByWilayah 
    // di mana 'hadiah_id' tidak sama dengan $id dan dapat bernilai null
    $hasilUndiNasabah = $nasabahByWilayah->where('hadiah_id', '!=', $id)->whereNull('hadiah_id')->shuffle()
        ->first();

        // dd($hasilUndiNasabah);
    // Perbarui 'hadiah_id' dari rekaman yang dipilih dengan nilai $id yang diberikan
    if ($hasilUndiNasabah) {
        $hasilUndiNasabah->update(['hadiah_id' => $id]);
    }

    $jumlahHadiah = Hadiah::where('id', $id)->value('jumlahHadiah');

    //mencari nasabah yang sudah menang
    $hadiahNasabah = Hadiah::with('nasabah')->where('id', $id)->firstOrFail(); 

    // Ambil kembali data nasabah setelah pembaruan
    $nasabah = Nasabah::all();

    // Tampilkan data pada view
    return view('pages.undiHadiah', compact('hasilUndiNasabah', 'jumlahHadiah', 'nasabah', 'hadiahNasabah'));
}

















    
    public function dashboard()
    {
        return view('admin.index');
    }
}
