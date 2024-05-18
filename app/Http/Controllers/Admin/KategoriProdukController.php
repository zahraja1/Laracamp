<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriBootcamp;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('Admin.Kategori.Kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Kategori.createKategori");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kategori::create([
            'kategori_id'=>$request->kategori_id,
            'slug'=>Str::slug($request->kategori_id),
        ]);
        
        return redirect()->route('KategoriProduk.index')->with('Create', "Berhasil Menambahkan Data Bootcamp $request->nama !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.Kategori.updateKategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->kategori_id = $request->kategori_id;
        $kategori->slug = Str::slug($request->kategori_id);
        $kategori->update(); 

        return redirect()->route('KategoriProduk.index')->with('Update', 'Berhasil Update Data Kategori !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        
        return redirect()->back()->with('Delete', 'Berhasil Update Data Kategori !');
    }

    public function searchKategori(Request $request){
        if ($request->has('search')){
            $kategori = Kategori::where('kategori_id', 'LIKE', '%' .$request->search.'%')->get();
        }else{
            $kategori = Kategori::all();
        }
        return view('Admin.Kategori.kategori', compact('kategori'));
    }
}
