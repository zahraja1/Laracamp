<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatHelper;
use Carbon\Carbon;
use App\Models\Bootcamp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BootcampApiController extends Controller
{
    public function index(){
        $bootcamp = Bootcamp::get()
                     ->map(function($bootcamp){
                        return $this->format($bootcamp);
                     })
        ;

        return $this->response($bootcamp);
    }

    public function detail($id){
        $bootcamp = Bootcamp::where('id', $id)
                  ->get()
                  ->map(function($bootcamp){
                    return $this->format($bootcamp);
                 })
    ;
    return $this->response($bootcamp);
  
    }

    public function tambah(Request $request){

        $validasi = Validator::make($request->all(), [
            'kategori_id'=>'required',
            'mentor_id'=>'required',
            'slug'=>'required|unique:bootcamps',
            'harga'=>'required|numeric',
            'deskripsi'=>'required',
            'kuota'=>'required',
            'thumbnail'=>'required',
        ]);

        if($validasi->fails()){
            $valindex= $validasi->errors()->all();
        //    return $this->errorWoe($valindex[0]);
        
        // helper bisa dipake kemana-mana
        return MessageHelper::error(false, $valindex[0]);
        }
        
        $bootcamp = Bootcamp::create([
            'kategori_id'=>$request->kategori_id,
            'mentor_id'=>$request->mentor_id,
            'slug'=>$request->slug,
            'harga'=>$request->harga,
            'deskripsi'=>$request->deskripsi,
            'kuota'=>$request->kuota,
            'thumbnail'=>$request->file('thumbnail')->store('img_bootcamp'),
        ]);


        $bootcamp = Bootcamp::where('id', $bootcamp->id)
        ->get()
        ->map(function($bootcamp){
          return $this->format($bootcamp);
       });
        return $this->response($bootcamp);
        // return $this->response($request->all());
    }

    public function errorWoe($message){
        return response()->json([
            'status'=>false,
            'messages' => $message,
        ], 200);
    }

    public function format($bootcamp){
        return[
            'id'=>$bootcamp->id,
            'nama'=>$bootcamp->slug,
            'nama_mentor'=>$bootcamp->mentor_id,
            'bootcamp'=>$bootcamp->deskripsi,
            'image'=>$bootcamp->thumbnail,
            'price'=>$bootcamp->harga,
            'status'=>$bootcamp->status,
            'tanggal_tambah'=>Carbon::parse($bootcamp->created_at)->translatedFormat('d F Y'),
            'kuota'=>$bootcamp->kuota,
        ];
    }

    public function response($bootcamp){
        return response()->json([
            'status'=>true,
            'data'=>$bootcamp,
        ],200);
    }

    // BUAT NGAPUSS DATA

    public function hapus(Request $request){
        $bootcamp = Bootcamp::where('id', $request->id)->first();
        
        if(!$bootcamp){
            return MessageHelper::error(false, 'data g ada');
        }
        Storage::delete($bootcamp->thumbnail);
        $bootcamp->delete();
        return MessageHelper::error(true, 'berhasil hapus data');
    }

    public function update(Request $request, $id){
        $bootcamp = Bootcamp::where('id', $id)->first();
        if(!$bootcamp){
            return MessageHelper::error(false,'data tidak ditemukan');
        }
        $validasi = Validator::make($request->all(), [
            'kategori_id' => ['required', ],
            'mentor_id' => ['required'],
            'nama' => ['required'],
            'harga' => ['required'],
            'kuota' => ['required'],
            'deskripsi' => ['required'],
    ]);
    if($validasi->fails()){
        $valindex= $validasi->errors()->all();
    return MessageHelper::error(false, $valindex[0]);
     }

     $bootcamp->update([
        'kategori_id'=>$request->kategori_id,
        'mentor_id'=>$request->mentor_id,
        'nama'=>$request->nama,
        'harga'=>$request->harga,
        'kuota'=>$request->kuota,
        'deskripsi'=>$request->deskripsi,
        // 'thumbnail'=>$request->file('thumbnail')->store('img-bootcamp'),
     ]);
     
     $detail = Bootcamp::where('id', $bootcamp->id)
     ->get()
     ->map(function($bootcamp){
       return $this->format($bootcamp);
    });

        $pesan = "berhasil menambahkan data bootcamp";
      return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }

}
