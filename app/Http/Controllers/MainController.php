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
      $nasabah = Nasabah::where('wilayah_id', $id )->get();

    // Simpan $nasabah dalam session
    session(['nasabah' => $nasabah]);

      // dd($nasabah);
      return view('pages.pilihHadiah', compact('hadiah', 'wilayah', 'nasabah'));
    }

    public function undiPemenang($id) {
      $jumlahHadiah = Hadiah::where('id', $id)->value('jumlahHadiah');
      $hadiahNasabah = Hadiah::with('nasabah')->where('id', $id)->firstOrFail();

      // Ambil $nasabah dari databsae, untuk random name saat loading
      $nasabah = Nasabah::all();
      // dd($nasabah);
      return view('pages.undiHadiah', compact('hadiahNasabah', 'jumlahHadiah', 'nasabah'));
    }

    public function hasilUndi($id)
    {
        // Ambil $nasabah dari session
        $nasabah = session('nasabah');
        
        // Data seluruh nasabah berdasarkan id wilayah
        $nasabahByWilayah = Nasabah::where('wilayah_id', $id)->get();
    
        // Data hadiah berdasarkan wilayah
        $hadiahNasabah = Hadiah::where('wilayah_id', $id)->firstOrFail();
    
        // Pilih secara acak satu rekaman dari model $nasabahByWilayah 
        // di mana 'hadiah_id' tidak sama dengan $id dan dapat bernilai null
        $hasilUndiNasabah = $nasabahByWilayah->where('hadiah_id', '!=', $id)->whereNull('hadiah_id')->shuffle()
            ->first();
    
        // Perbarui 'hadiah_id' dari rekaman yang dipilih dengan nilai $id yang diberikan
        if ($hasilUndiNasabah) {
            $hasilUndiNasabah->update(['hadiah_id' => $id]);
        }
        $jumlahHadiah = Hadiah::where('id', $id)->value('jumlahHadiah');
        Alert::success('Anda Berhasil, Selamat!!!', 'Kepada Para Pemenang');
        return view('pages.undiHadiah', compact('hasilUndiNasabah', 'hadiahNasabah', 'jumlahHadiah'));
    }
    













    
    public function dashboard()
    {
        return view('admin.index');
    }
}
