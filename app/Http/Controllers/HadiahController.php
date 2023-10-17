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
      $hadiah->jumlahHadiah = $request->input('jumlahHadiah'); 

      
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
    public function edit($id, Hadiah $hadiah)
    {
      $hadiah = Hadiah::find($id);
      $wilayah = Wilayah ::all();
      // dd($hadiah);
        return view('admin.hadiah.edit', compact('hadiah', 'wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
{
    try {
        // Find the Hadiah model by its ID
        $hadiah = Hadiah::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'jumlahHadiah' => 'required',
            'wilayah_id' => 'required',
            'img' => 'image', // You can add more specific validation rules here
        ]);

        // Update the fields
        $hadiah->name = $request->input('name');
        $hadiah->description = $request->input('description');
        $hadiah->jumlahHadiah = $request->input('jumlahHadiah');
        $hadiah->wilayah_id = $request->input('wilayah_id');

        if ($request->hasFile('img')) {
            // Handle file upload
            $image = $request->file('img');
            $newFileName = 'hadiah_' . $request->input('name') . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

            // Save the uploaded image to the public/img directory
            $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/' . $newFileName));

            // Update the image file name in the model
            $hadiah->img = $newFileName;
        }

        // Save the updated Hadiah model
        $hadiah->save();

        return redirect()->route('index.hadiah')->with('success', 'Hadiah updated successfully');
    } catch (\Exception $e) {
        // Handle the exception (e.g., log the error, show an error message, etc.)
        return redirect()->back()->with('error', 'Error updating Hadiah: ' . $e->getMessage());
    }
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
