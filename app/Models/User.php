<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model
{
    use HasApiTokens;

    protected $table = "user";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'login',
        'pass',
        'name',
        'status',
    ];
}
