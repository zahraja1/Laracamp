<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatHelper;
use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{
    public function index(){
        $mentor = User::where('role', 2)
        -> get()
                     ->map(function($mentor){
                        return FormatHelper::formatResaultAuth($mentor);
                     })
        ;
        $pesan = "berhasil menampilkan data mentor";
        return MessageHelper::resultAuth(true, $pesan, $mentor, 200);
    }


    public function mentorTambah(Request $request){
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'img'=>['required'],
    ]);
    if($validasi->fails()){
        $valindex= $validasi->errors()->all();
    //    return $this->errorWoe($valindex[0]);
    
    // helper bisa dipake kemana-mana
    return MessageHelper::error(false, $valindex[0]);
    }
    $mentor= User::create([
        'name' => $request->name,
        'username' => $request->username, 
        'email' => $request->email,
        'role' => 2,
        'password' => Hash::make($request->password),
        'img'=>$request->file('img')->store('img-mentor'),
    ]);
    $detail = FormatHelper::resultUser($mentor->id);

        $pesan = "berhasil menambahkan data mentor";
      return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }


    public function mentorHapus(Request $request){
        $mentor = User::where('id', $request->id)->first();
        
        if(!$mentor){
            return MessageHelper::error(false, 'data g ada');
        }
        Storage::delete($mentor->img);
        $mentor->delete();
        return MessageHelper::error(true, 'berhasil hapus data');
    }

    public function mentorUpdate(Request $request, $id){
        $mentor = User::where('id', $id)->first();
        if(!$mentor){
            return MessageHelper::error(false, 'data tidak ditemukan');
        }
     
        
        
        if($mentor->role !==2){
            return MessageHelper::error(false, "Mentor $mentor->username tidak ditemukan !");
        }

        $validasi = Validator::make($request->all(), [
            'name' => ['required', ],
            'username' => ['required'],
            'email' => ['required','email'],
            'password' => ['required', 'min:6'],
            // 'img'=>['required'],
    ]);
    if($validasi->fails()){
        $valindex= $validasi->errors()->all();
    return MessageHelper::error(false, $valindex[0]);
     }

     $mentor->update([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        // 'img'=>$request->img,
     ]);

     $detail = FormatHelper::resultUser($mentor->id);

        $pesan = "berhasil menambahkan data mentor";
      return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }
}
