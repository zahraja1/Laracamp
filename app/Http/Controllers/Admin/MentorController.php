<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    //

    public function index(){


        $mentor = User::where('role', 2)->get();
        
        return view('Admin.CrudMentor.indexMentor', compact('mentor'));
    }

    public function formMentor(){
        return view('Admin.CrudMentor.formMentor');
    }

    public function createMentor(Request $request){

        User::create([
            'name'=> $request->name,
            'username'=> $request->nuserame,
            'email'=> $request->email,
            'role'=>2,
            'password'=> Hash::make($request->password),
            'img'=> $request->file('img')->store('img_mentor'),
        ]);

        return redirect()->route('Admin.CrudMentor.indexMentor')->with('create', "Data $request->name berhasil disimpan");
    }
    public function updateArtikel(Request $request, $id)
    {
    }
}
