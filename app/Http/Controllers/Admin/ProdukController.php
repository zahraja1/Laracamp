<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $product = Product::all();
        return view('Admin.Product.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view("Admin.Product.createProduct", compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Product::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'image' => $request->file('image')->store('img-product'),
        ]);
        return redirect()->route('Product.index')->with('Create', "Berhasil Menambahkan data Product");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('Admin.Product.showProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $product = Product::findOrFail($id);
        return view('Admin.Product.updateProduct', compact('product', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // ini cara pertama/praktis
        if ($request->hasFile('image/storage/')) {

            // upload image baru
            $image = $request->file('image/storage/');
            $image->storeAs('public/images/storage/', $image->hasName());

            // Hapus foto lama
            Storage::delete('public/images/storage/' . $product->image);

            // Update dengan gambar baru
            $product->update([
                'image' => $image->hasName(),
            ]);
        } else {
            // kalo nggak up foto, tetep update data yang laen
            $product->kategori_id = $request->kategori_id;
            $product->nama_produk = $request->nama_produk;
            $product->harga = $request->harga;
            $product->image = $request->file('image')->store('img-product');
            $product->slug = Str::slug($request->title);
            $product->deskripsi = $request->deskripsi;
        }

        // Menyimpan data perubahan 
        $product->update();


        return redirect()->route('Product.index')->with('Update', "Data $request->nama_produk Berhasil Di Update !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();

        return redirect()->back()->with("Delete", "berhasil hapus data");
    }

    // filter 1
    public function skincare()
    {
        $kategori = Kategori::all();
        $product = Product::where('kategori_id', 7)->get();
        return view('Admin.Product.product', compact('product'));
    }
 
    // search
    public function searchProduct(Request $request){
        if ($request->has('search')){
            $kategori = Kategori::where('kategori_id', 'LIKE', '%' .$request->search.'%')->get();
        }else{
            $kategori = Kategori::all();
        }
        return view('Admin.Kategori.kategori', compact('kategori'));
    }

   
}
