<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(){

        $artikel = Artikel::all();
        $tags = Tags::all();
        return view('Admin.Artikel.artikel', compact('tags', 'artikel'));
    }

    public function formArtikel(){

        $tags = Tags::all();
        return view('Admin.Artikel.createArtikel', compact('tags'));
    }

    public function createArtikel(ArtikelRequest $request){

        // dd($request->all());

        // Cara pertama
        $request->validate([
            'title'=>'required',
            'tags' => 'required',
            'img_artikel' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'artikel' => 'required',
        ]);


        $img_artikel = $request->file('img_artikel');
        $namaFile = time() . '.' . $img_artikel->getClientOriginalExtension();
        $img_artikel->move(public_path('img'), $namaFile);

        Artikel::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'tags' => $request->tags,
            'artikel' => $request->artikel,
            'img_artikel' => $namaFile,
        ]);

        // cara kedua
              // Artikel::create([
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->title),
        //     'tags' => $request->tags,
        //     'artikel' => $request->artikel,
        //     'img_artikel' => $request->file('img_artikel')->store('img-artikel')
        // ]);


        return redirect()->route('admin.index.artikel')->with('Create',"Data $request->title berhasil disimpan !");
    }

    public function editArtikel($id){

        $tags = Tags::all();

        $artikel = Artikel::findOrFail($id);

        return view('Admin.Artikel.editArtikel', compact('tags', 'artikel'));
    }

    public function updateArtikel(Request $request, $id){
        // dd($request->all());

        // $artikel = Artikel::findOrFail($id);

        // // ini cara pertama/praktis
        // if($request->hasFile('image')) {

        //     // upload image baru
        //     $img_artikel = $request->file('img_artikel');
        //     $img_artikel->storeAs('public/images', $img_artikel->hasName());

        //     // Hapus foto lama
        //     Storage::delete('public/images/' . $artikel->img_artikel);

        //     // Update dengan gambar baru
        //     $artikel->update([
        //         'img_artikel' => $img_artikel->hasName(),
        //     ]);
        // }else{
        //     // kalo nggak up foto, tetep update data yang laen
        //     $artikel->title = $request->title;
        //     $artikel->tags = $request->tags;
        //     $artikel->img_artikel = $request->file('img_artikel')->store('img-artikel');
        //     $artikel->slug = Str::slug($request->title);
        //     $artikel->artikel = $request->artikel;
        // }

        // // Menyimpan data perubahan 
        // $artikel->update();

        // cara kedua = Ribet
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'artikel' => 'required',
            'img_artikel' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $artikel = Artikel::findOrFail($id);
        // Jika ingin menghapus foto  artikel dan tidak upload foto baru
        
        if($request->file('img_artikel') == ""){
            $artikel([
                'title' => $request->title,
                'artikel' => $request->artikel,
                'tags' => $request->tags,
                'img_artikel' => $request->img_artikel,
                'slug' => Str::slug($request->title),
            ]);
        }else{
            $img_artikel = $request->file('img_artikel');
            $namaFile = time() . '.' . $img_artikel->getClientOriginalExtension();
            $img_artikel->move(public_path('img'), $namaFile);

            $artikel->update([
                'title' => $request->title,
                'tags' => $request->tags,
                'artikel' => $request->artikel,
                'slug' => Str::slug($request->title),
                'img_artikel' => $namaFile,
            ]);
        }

        return redirect()->route('admin.index.artikel')->with('Update',"Data $request->title berhasil diupdate !");
    }

    public function deleteArtikel(Request $request){
        $artikel = Artikel::findOrFail($request->id);
        Storage::delete($artikel->img_artikel);
        $artikel->delete();
        return redirect()->back();
    }    
}