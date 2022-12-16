<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $req) {
        $str = $req->str;

        $products = Product::when($str, function ($query, $str) {
            $query->where('name', 'like', '%' . $str . '%')
                ->orWhere('description', 'like', '%' . $str . '%');
        })->get();

        return view('product.index', [
            'products' => $products
        ]);
    }
}
