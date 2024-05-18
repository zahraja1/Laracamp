<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
       'peserta_id',
            'bootcamp_id',
           'kode_transaksi',
           'nama',
           'email',
           'pekerjaan',
           'rekening',
           'expired',
           'cvc',
           'status',
            // status transakasi
            // 1 = Transaksi sukses
            // 2 = Menunggu Pembayaran
            // 3 = Transaksi Gagal
           'total_harga',
            'kode_unik',
    ];

    public function bootcamp(){
        return $this->belongsTo(Bootcamp::class, 'bootcamp_id', 'id');
    
    }

    public function peserta(){
        return $this->belongsTo(User::class, 'peserta_id', 'id');
    }
}
