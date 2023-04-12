<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getColorSize(Request $request){
        $product = $request->input('product');
        $color = $request->input('color');
        $data = ProductVariation::with('product', 'color', 'size')->where(['product_id' => $product, 'color_id' => $color])->get();

        return $data;
    }
}
