<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();

        return view('Admin.Transaksi.transaksi', compact('transaksi'));
    }
    public function hapusTransaksi(Request $request){
        $transaksi = Transaksi::findOrFail($request->id);
        $transaksi ->delete();
        return redirect()->route('index.transaksi')->with(['delete' => 'Data Berhasil Dihapus']);
    }

    public function updateTransaksi(Request $request){
        $transaksi = Transaksi::findOrFail($request->id);
        $transaksi->status = $request->status;
        $transaksi->update();

        return redirect()->back()->with('Update', 'Berhasil Update Data Transaksi!');
    }
}
