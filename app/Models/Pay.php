<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = "pay";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'title',
        'price',
        'city'
    ];
}
