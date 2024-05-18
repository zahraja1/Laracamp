<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';



    protected $fillable=[
        'title',
        'slug',
        'tags',
        'img_artikel',
        'artikel'
    ];

    public function tag(){

        return $this->belongsTo(tags::class, 'tags', 'id');
        // belongs to bwt relasi antar table laravel
    }
}
