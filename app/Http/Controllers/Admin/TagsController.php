<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    public function tags(Request $request){

        $tags = Tags::all();
        return view('Admin.Tag.tag', compact('tags'));
    }

// BUTA SEARCH
    public function searchTags(Request $request){
        if($request->has('search')){
            $tags = Tags::where('tags', 'like', '%'.$request->search.'%')->get();
        }else{
            $tags = Tags::all();
        }
        return view('Admin.Tag.tag', compact('tags'));
    }


    // BUAT TAMBAH DATA
    public function createTags(Request $request){
        // dd($request->all());

        tags::create([
            'tags' => $request->tags,
            'slug' => Str::slug($request->tags)
        ]);

        return redirect()->back()->with('create', 'Berhasil nambah data');
    }


    // BUAT EDIT DATA
    public function updateTags(Request $request){
        $tags = tags::findOrFail($request->id);

        $tags->Tags = $request->tags;
        $tags->slug = Str::slug($request->tags) ;
        $tags->update();
        return redirect()->back()->with('update', 'Data berhasi kamu edit');
    }

    
    
    // BUAT HAPUS DATA
    public function DeleteTags(Request $request){

        $tags = tags::findOrFail($request->id);
        $tags->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }

    
}
