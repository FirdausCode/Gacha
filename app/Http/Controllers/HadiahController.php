<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hadiah = Hadiah::with('wilayah')->latest()->get();

        // dd($hadiah);
        return view('admin.hadiah.index', compact('hadiah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $wilayah = Wilayah::all();
        return view('admin.hadiah.create', compact('wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      // dd($request);

      $hadiah = new Hadiah();
      
      $hadiah->name = $request->input('name'); 
      $hadiah->description = $request->input('description'); 
      $hadiah->wilayah_id = $request->input('wilayah_id'); 

      
      if ($request->hasFile('img')) {
        $image = $request->file('img');
        $newFileName = 'hadiah' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

        // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
        $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save(public_path('img/' . $newFileName));

        $hadiah->img =  $newFileName;
      }
      
      $hadiah->save();

      // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
      return redirect()->route('index.hadiah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hadiah $hadiah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hadiah $hadiah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Hadiah $hadiah)
    {
      $hadiah = Hadiah::findOrFail($id);
      $validatedData = $request->validate([
          'name' => 'required', 
          'img' => 'required', 
      ]);

      $hadiah->name = $request->input('name'); 
      $hadiah->description = $request->input('description'); 
      $hadiah->wilayah_id = $request->input('wilayah_id'); 

      if ($request->hasFile('img')) {
        $image = $request->file('img');
        $newFileName = 'hadiah' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

        // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
        $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save(public_path('img/' . $newFileName));

        $hadiah->img =  $newFileName;
      }
      
      // dd($hadiah);
      $hadiah->save();
      
      // dd($cource);
      return redirect()->route('index.hadiah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Hadiah $hadiah)
    {
      $cource = Hadiah::findOrFail($id);
      $cource->delete();
      return redirect()->route('index.hadiah');
    }
}
