<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(){
        return Basket::all();
    }

    public function add(Request $request){
        return Basket::create($request->all());
    }

    public function delete($id){
        return Basket::find($id)->delete();
    }
}
