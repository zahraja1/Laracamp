<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBootcamp;
use App\Http\Controllers\Controller;

class kategoriBootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriBootcamp::all();
        return view('Admin.KategoriBootcamp.KategoriBootcamp', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KategoriBootcamp::create([
            'kategori'=> $request->kategori,
            'slug'=> Str::slug($request->kategori),
        ]);
        return redirect()->back()->with('create', 'Berhasil Tambah Data Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBootcamp  $kategoriBootcamp
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBootcamp $kategoriBootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBootcamp  $kategoriBootcamp
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBootcamp $kategoriBootcamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBootcamp  $kategoriBootcamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $kategori = KategoriBootcamp::findOrFail($request->id);
        $kategori->kategori = $request->kategori;
        $kategori->slug = Str::slug($request->kategori);
        $kategori->update(); 

        return redirect()->route('kategoriBootcamp.index')->with('update', 'Berhasil Update Data Kategori !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBootcamp  $kategoriBootcamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBootcamp $kategoriBootcamp)
    {
        $kategori = KategoriBootcamp::findOrFail($kategoriBootcamp->id);
        $kategori->delete();
        
        return redirect()->back()->with('delete', 'Berhasil Update Data Kategori !');
    }
}
