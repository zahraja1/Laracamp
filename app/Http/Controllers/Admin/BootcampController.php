<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Requests\UpdateBootcampRequest;
use App\Models\KategoriBootcamp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bootcamp = Bootcamp::all();
        return view('Admin.Bootcamp.bootcamp', compact('bootcamp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriBootcamp::all();
        $mentor = User::where('role', 2)->get();

        return view('Admin.Bootcamp.createBootcamp', compact('kategori','mentor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBootcampRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        Bootcamp::create([
            'kategori_id'=>$request->kategori_id,
            'mentor_id'=>$request->mentor_id,
            'nama'=>$request->nama,
            'slug'=>Str::slug($request->nama),
            'harga'=>$request->harga,
            'deskripsi'=>$request->deskripsi,
            'kuota'=>$request->kuota,
            'thumbnail'=>$request->file('thumbnail')->store('img_bootcamp'),
        ]);

        return redirect()->route('Bootcamp.index')->with('create',"Berhasi Menambahkan Data Bootcamp $request->nama !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function show(Bootcamp $bootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function edit(Bootcamp $bootcamp)
    {
        $kategori = KategoriBootcamp::all();
        $mentor = User::where('role', 2)->get();
        $bootcamp = Bootcamp::findOrFail($bootcamp);

        return view('Admin.Bootcamp.editBootcamp', compact('kategori', 'mentor', 'bootcamp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBootcampRequest  $request
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBootcampRequest $request, Bootcamp $bootcamp)
    {
       $bootcamp->update([
        'nama'=> $request->nama,
        'kategori_id'=> $request->kategori_id,
        'mentor_id'=> $request->mentor_id,
        'harga'=> $request->harga,
        'kuota'=> $request->kuota,
        'deskripsi'=> $request->deskripsi,
       ]);


       if($request->file('image')){
        $thumbnail = $request->file('image');
        $thumbnail->storeAs('public/images', $thumbnail->hashName());

        Storage::delete('public/images'. $bootcamp->thumbnail);

        $bootcamp->update([
            'thumbnail'=>$thumbnail->hashName(),
        ]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $bootcamp)
    {
        $bootcamp = Bootcamp::findOrFail($bootcamp->id);
        Storage::delete($bootcamp->thumbnail);
        $bootcamp->delete();

        return redirect()->back()->with('delete', 'Berhasil update Data Kategori !');
    }
}
