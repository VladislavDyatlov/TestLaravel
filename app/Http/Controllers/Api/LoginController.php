<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Str;
use App\Http\Requests\RegRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(RegRequest $request){

        $data = $request->validated();

        $user = User::create([
            'login' => $data['login'],
            'pass' => bcrypt($data['pass']),
            'name' => $data['name'],
            'status' => $data['status'],
        ]);            

        $token = Str::random(60);
        return response()->json(['token' => $token], 200);
    }

    public function signup(LoginRequest $request){

        $auth = User::where('login', $request->input('login'))->firstOrFail();

        if(!Hash::check($request->input('pass'), $auth->pass)){
            return response()->json([
                'messange' => 'Неправильный логин или пароль'
            ],200);
        } elseif($auth->status == 'ADM'){
            return response()->json(['admin' => true], 200);
        } else{
            $token = Str::random(60);
            return response()->json(['token' => $token], 200);             
        }


    }
}
