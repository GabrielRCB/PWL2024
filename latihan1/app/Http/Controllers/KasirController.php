<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(){
        return view('content.kasir.index');
    }

    public function searchProduct(Request $request){
        $product = Product::query()->where('barcode',$request->barcode)->first();
        if ($product === null){
            return response()->json([],404);
        }
        return response()->json($product);
    }
}
