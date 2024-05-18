<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Models\KategoriBootcamp;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){

        $kategori = KategoriBootcamp::all();
        return view("Front.page.indexFront", compact('kategori'));
    }

    public function bootcamp(){
        $kategori = KategoriBootcamp::all();
        $bootcamp = Bootcamp::all();
        return view("Front.page.bootcamp", compact('kategori', 'bootcamp'));
    }

    public function kategoriBootcamp($slug){
        $kategori = KategoriBootcamp::where('slug', $slug)->first();
        $bootcamp = Bootcamp::where('kategori_id', $kategori->id)->get();

        return view('Front.page.per-kategori', compact('kategori','bootcamp'));
    }


    // BUAT FILTER
    public function bootcampMentor($name){
        $user = User::where('name', $name)->first();
        $bootcamp = Bootcamp::where('mentor_id', $user->id)->get();

        return view('Front.page.mentorBootcamp', compact('user','bootcamp'));
    }

    public function detailBootcamp($slug){
        $bootcamp = Bootcamp::where('slug', $slug)->first();

        return view('Front.page.detailBootcamp', compact('bootcamp'));
    }

    public function daftarBootcamp(Request $request){
        $brand = 'Jay';
        $karakter_code = '0123456789';
        $acak = str_shuffle($karakter_code);
       // str_shuffel bikin kode secara acak dari $karakter_kode
       $kode_transaksi = substr($acak,0,12);
       $kode_fix = $brand.'-'.$kode_transaksi;


       Transaksi::create([
        'peserta_id'=> Auth::user()->id,
        'bootcamp_id'=> $request->bootcamp_id,
        'kode_transaksi'=> $kode_fix,
        'nama'=> $request->nama,
        'email'=> $request->email,
        'pekerjaan'=> $request->pekerjaan,
        'rekening'=> $request->rekening,
        'expired'=> $request->expired,
        'cvc'=> $request->cvc,
        'total_harga'=> $request->total_harga,
        'kode_unik'=> mt_rand(100, 999),
       ]);

       return redirect()->route('peserta.sukses.beli');
    }



}
