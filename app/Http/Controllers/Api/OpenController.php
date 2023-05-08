<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pay;

class OpenController extends Controller
{
    public function index($id){

        $res = Pay::find($id);
        $respons = $res->where('name', 'userVlad')->first();

        if($respons){
            $res->update(['name' => 'Vladislav']);
            return response()->json(['data' => $res],200);
        } else{
            return response()->json(['error' => [
                'code' => '403',
                'message' => 'Forbidden. There are open shifts!'
            ]],403);
        }
    }
}
