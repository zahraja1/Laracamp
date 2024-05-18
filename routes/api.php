<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BootcampApiController;
use App\Http\Controllers\Api\MentorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(BootcampApiController::class)->group(function(){
    Route::get('/Bootcamp', 'index');
    Route::get('/Bootcamp/detail/{id}', 'detail');
    Route::post('/Bootcamp/tambah', 'tambah');
    Route::delete('/Bootcamp/hapus/{id}', 'hapus');
    Route::put('/Bootcamp/update/{id}', 'update');
});
Route::controller(AuthApiController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});


// mentor
Route::controller(MentorController::class)->group(function (){
    Route::get('/mentor', 'index');
    Route::post('/mentor/tambah', 'mentorTambah');
    Route::delete('/mentor/hapus/{id}', 'mentorHapus');
    Route::put('/mentor/update/{id}', 'mentorupdate');
});