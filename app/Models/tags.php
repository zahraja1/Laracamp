<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;

    protected $table ='tags';

    protected $fillable = [
        'tags',
        'slug'
    ];
}
