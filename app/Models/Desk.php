<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $table = "price";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'img',
        'title',
        'price',
        'text',
        'discount',
        'star'
    ];
}
