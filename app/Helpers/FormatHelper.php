<?php
namespace App\Helpers;

use App\Models\User;
use Carbon\Carbon;

class FormatHelper{
    public static function formatResaultAuth($user){
        return[
            'Userid'=>$user->id,
            'nama'=>$user->name,
            'username'=>$user->username,
            'email'=>$user->email,
            'tanggal_daftar'=>Carbon::parse($user->created_at)->translatedFormat('d F Y'),
        ];
    }


    public static function resultUser($user_id){
        $user = User::where('id', $user_id)
        ->get()
        ->map(function($user){
           return FormatHelper::formatResaultAuth($user);
        });

        return $user;
    }
}