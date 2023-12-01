<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use GuzzleHttp\Client;
use App\Models\Nasabah;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() {
      // 1. Ambil data dari API
      // $apiUrl = 'https://sheet2api.com/v1/ElpacIqT42dt/test';
      // $client = new Client();
      // $response = $client->get($apiUrl);
      // $data = json_decode($response->getBody(), true);
      // if ($data) {
      //     foreach ($data as $item) {
      //         Nasabah::updateOrCreate(
      //             ['id' => $item['id']],
      //             [
      //                 'name' => $item['name'],
      //                 'nameCabang' => $item['nameCabang'],
      //                 'cif' => $item['cif'],
      //                 'wa' => $item['wa'],
      //             ]
      //         );
      //     }
      // $nasabah = Nasabah::all();
      // return view ('admin.nasabah.index', compact('nasabah')); 
      
      // } else {
      //   dd('Gagal mengambil data dari API');
      // }

      $nasabah = Nasabah::with('wilayah')->latest()->get();
      // dd($nasabah);
      return view ('admin.nasabah.index', compact('nasabah'));
    }

    public function create (){
      $wilayah = Wilayah::latest()->get();
      return view('admin.nasabah.create', compact('wilayah'));
    }

    public function store(Request $request){
      $nasabah = new nasabah();
      
      $nasabah->name = $request->input('name'); 
      $nasabah->nameCabang = $request->input('nameCabang'); 
      $nasabah->cif = $request->input('cif'); 
      $nasabah->wa = $request->input('wa'); 
      $nasabah->wilayah_id = $request->input('wilayah_id'); 

      $nasabah->save();
      return redirect()->route('index.nasabah');
    }

    public function edit($id){
      $wilayah = Wilayah::all();
      $nasabah= Nasabah::findOrFail($id);
      return view('admin.nasabah.edit', compact('nasabah', 'wilayah'));
    }

    public function update($id, Request $request)
    {
      $nasabah = nasabah::find($id);
      $nasabah->name = $request->input('name'); 
      $nasabah->nameCabang = $request->input('nameCabang'); 
      $nasabah->cif = $request->input('cif'); 
      $nasabah->wa = $request->input('wa'); 
      $nasabah->wilayah_id = $request->input('wilayah_id');
      $nasabah->save();
      return redirect()->route('index.nasabah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $nasabah = Nasabah::find($id);
      $nasabah->delete();
      return redirect()->route('index.nasabah');
    }

    
    public function dataPemenang() {
  //     $apiUrl = 'https://sheet2api.com/v1/ElpacIqT42dt/test';
  //     $client = new Client();
  //     try {
  //         $response = $client->get($apiUrl);
  //     } catch (\Exception $e) {
  //         return view('error.api_error', compact('e'));
  //     }
  //     $data = json_decode($response->getBody(), true);
  //     if ($data) {
  //         foreach ($data as $item) {
  //             Nasabah::updateOrCreate(
  //                 ['id' => $item['id']],
  //                 [
  //                     'name' => $item['name'],
  //                     'nameCabang' => $item['nameCabang'],
  //                     'cif' => $item['cif'],
  //                     'wa' => $item['wa'],
  //                 ]
  //             );
  //         }
  //         $nasabah = Nasabah::whereNotNull('hadiah_id')->get();
  //         return view('admin.nasabah.dataPemenang', compact('nasabah'));
  //     } else {
  //         return view('error.api_data_error');
  //     }
  }
}
