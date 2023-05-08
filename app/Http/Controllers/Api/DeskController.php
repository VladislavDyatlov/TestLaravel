<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskRequest;
use App\Models\Desk;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index(){
        return Desk::orderBy('id', 'desc')->get();
    }

    public function discount(){
        return Desk::orderBy('price', 'desc')->get();
    }

    public function show($id){
        return Desk::find($id);
    }

    public function filter(Request $request){
        $product = Desk::query();

        if($request->filled('price_from') && $request->filled('price_to')){
            $product->where('price', '>=', $request->price_from);
            $product->where('price', '<=', $request->price_to);
        }

        if($request->filled('title')){
            $product->where('title', 'like', "%{$request->title}%");
        }

        $products = $product->paginate();

        return response()->json($products, 200);
    }

    public function sends(DeskRequest $request){
        Desk::create($request->validated());
        return response()->json(['messages' => "Данные успешно добавлены"], 200);
    }

    public function delete($id){
        return Desk::find($id)->delete();
    }

    public function update(Request $request){
        $product = Desk::find($request->id);
        $product->update($request->all());

        return response()->json(['messages' => "Данные успешно обновлены"], 200);
    }
}
