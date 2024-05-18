<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BootcampController;
use App\Http\Controllers\Admin\chartController;
use App\Http\Controllers\Admin\kategoriBootcampController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Mentor\MentorController as MentorMentorController;
use App\Http\Controllers\Peserta\PesertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// INI AKSES TAMU = GAUSAH LOGIN BISA LIAT LANDING PADGE
Route::controller(FrontController::class)->group(function(){
    Route::get('/', 'index')->name('front.index');
    Route::get('/bootcamp', 'bootcamp')->name('front.bootcamp');
    Route::get('/bootcamp/mentor/{name}', 'bootcampMentor')->name('front.bootcampmentor');
    Route::get('/bootcamp/kategori/{slug}', 'kategoriBootcamp')->name('front.kategoriBootcamp');
    Route::get('/detail/bootcamp/{slug}', 'detailBootcamp')->name('front.detailBootcamp');
    // Pendaftaran Bootcamp / Trasnsaksi 
    Route::post('/bootcamp/daftar', 'daftarBootcamp')->name('front.daftar.bootcamp');
});

// ini route admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::controller(BaseController::class)->group(function(){
        Route::get('/home', 'index')->name('index.home');
    });

    // Tags
    Route::controller(TagsController::class)->group(function(){
        Route::get('/tags', 'tags')->name('admin.index.tag');
        Route::post('/tags/create', 'createTags')->name('admin.create.tag');
        Route::put('/tags/update', 'updateTags')->name('admin.update.tag');
        Route::delete('/tags/delete', 'deleteTags')->name('admin.delete.tag');
        Route::get('/tags/search', 'searchTags')->name('admin.search.tag');
      
    });

    // buat artikel
    Route::controller(ArtikelController::class)->group(function(){
        Route::get('/artikel', 'index')->name('admin.index.artikel');
        Route::get('/artikel/form', 'formArtikel')->name('admin.form.artikel');
        Route::post('/artikel/create', 'createArtikel')->name('admin.create.artikel');
        Route::get('/artikel/edit/{id}', 'editArtikel')->name('admin.edit.artikel');
        Route::put('/artikel/update/{id}', 'updateArtikel')->name('admin.update.artikel');
        Route::delete('/artikel/delete', 'deleteArtikel')->name('admin.delete.artikel');
    });

    // biat mentor
    Route::controller(MentorController::class)->group(function () {
        Route::get('/data/mentor', 'index')->name('admin.index.data.mentor');
        Route::get('/data/mentor/form', 'formMentor')->name('admin.form.data.mentor');
        Route::post('/data/mentor/create', 'createMentor')->name('admin.create.data.mentor');
        Route::delete('/data/mentor/delete', 'deleteMentor')->name('admin.delete.data.mentor');
    });


    Route::resource('kategoriBootcamp', kategoriBootcampController::class);
    Route::resource('Bootcamp', BootcampController::class);
    Route::resource('Product', ProdukController::class);
    

    // filter 
    Route::controller(ProdukController::class)->group(function(){
        // filter
       Route::get('/product/skincare', 'skincare')->name('produk.skincare');
    //    search
       Route::get('/product-search', 'searchProduct')->name('Produk.search');
       
    });

    // search
    Route::controller(KategoriProdukController::class)->group(function(){
        Route::get('/kategori-search', 'searchKategori')->name('Kategori.search');
    });
    // TRANSAKSI
    Route::controller(TransaksiController::class)->group(function(){
        Route::get('/transaksi', 'index')->name('index.transaksi');
        Route::delete('/transaksi/hapus', 'hapusTransaksi')->name('hapus.transaksi');
        Route::put('/update/transaksi', 'updateTransaksi')->name('update.transaksi');
    });
    // CHART
    Route::controller(chartController::class)->group(function(){
        Route::get('/chart', 'index')->name('index.chart');
    });


    

    Route::resource('KategoriProduk', KategoriProdukController::class);
   

});


// route Mentor
Route::prefix('mentor')->middleware(['auth', 'isMentor'])->group(function() {
    Route::controller(MentorMentorController::class)->group(function(){
        Route::get('/home', 'index')->name('mentor.index.home');
        Route::get('/mybootcamp', 'mybootcamp')->name('mentor.my.botcamp');
        Route::get('/profile', 'profile')->name('mentor.profile');
        Route::get('/list/peserta/{$id}', 'listPeserta')->name('mentor.list.peserta');
    });
   

});

// route Peserta
Route::prefix('peserta')->middleware(['auth', 'isPeserta'])->group(function() {
    Route::controller(PesertaController::class)->group(function(){
        Route::get('/home', 'index')->name('peserta.index');
        Route::get('/profile', 'profile')->name('peserta.profile');
        Route::get('/profile/update/{id}', 'profileUpdate')->name('peserta.profile.update');
        Route::post('/profile/update', 'updateProfile')->name('peserta.update.profile');

        // SUCCES TRANSAKSI
        Route::get('/sukses-Beli', 'suksesBeli')->name('peserta.sukses.beli');
        // SUKSES BOOTCAMP
        Route::get('/transaksi', 'transaksi')->name('peserta.transaksi');
        Route::get('/mybootcamp', 'mybootcamp')->name('peserta.mybootcamp');
    });
   

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
   