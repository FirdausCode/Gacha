<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = Wilayah::latest()->get();

        return view('admin.wilayah.index', compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $wilayah = new Wilayah();
      
      $wilayah->name = $request->input('name'); 

      
      $wilayah->save();
      return redirect()->route('index.wilayah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Wilayah $wilayah)
    {
        $wilayah = Wilayah::findOrFail($id);

        return view('admin.wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
      $wilayah = Wilayah::find($id);
      
      $wilayah->name = $request->input('name'); 

      
      $wilayah->save();
      return redirect()->route('index.wilayah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $wilayah = Wilayah::find($id);
      $wilayah->delete();
      return redirect()->route('index.wilayah');
    }
}
