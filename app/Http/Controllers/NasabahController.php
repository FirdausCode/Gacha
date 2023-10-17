<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use GuzzleHttp\Client;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() {
      // 1. Ambil data dari API
      $apiUrl = 'https://sheet2api.com/v1/ElpacIqT42dt/test';
      $client = new Client();
      $response = $client->get($apiUrl);
  
      // 2. Parse data JSON dari respons API
      $data = json_decode($response->getBody(), true);
  
      if ($data) {
          // 3. Buat atau perbarui entri dalam model Nasabah
          foreach ($data as $item) {
              Nasabah::updateOrCreate(
                  ['id' => $item['id']],
                  [
                      'name' => $item['name'],
                      'nameCabang' => $item['nameCabang'],
                      'cif' => $item['cif'],
                      'wa' => $item['wa'],
                  ]
              );
          }
      
        // 4. Setelah mengambil data dari api dan memasukannya ke model
        //    melakukan undi / random nasabah
      $nasabah = Nasabah::all();
      return view ('admin.nasabah.index', compact('nasabah')); 
      
      } else {
        // Handle jika terjadi kesalahan saat mengambil data dari API
        dd('Gagal mengambil data dari API');
      }
    }


    
    public function dataPemenang() {
      // 1. Fetch data from the API
      $apiUrl = 'https://sheet2api.com/v1/ElpacIqT42dt/test';
      $client = new Client();
      try {
          $response = $client->get($apiUrl);
      } catch (\Exception $e) {
          // Handle API request error here
          return view('error.api_error', compact('e'));
      }
  
      // 2. Parse JSON data from the API response
      $data = json_decode($response->getBody(), true);
  
      if ($data) {
          // 3. Update or create entries in the Nasabah model
          foreach ($data as $item) {
              Nasabah::updateOrCreate(
                  ['id' => $item['id']],
                  [
                      'name' => $item['name'],
                      'nameCabang' => $item['nameCabang'],
                      'cif' => $item['cif'],
                      'wa' => $item['wa'],
                  ]
              );
          }
  
          // 4. Retrieve winners and pass them to the view
          $nasabah = Nasabah::whereNotNull('hadiah_id')->get();
          return view('admin.nasabah.dataPemenang', compact('nasabah'));
      } else {
          // Handle if there was an issue fetching or parsing data from the API
          return view('error.api_data_error');
      }
  }
  
}
