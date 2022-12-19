<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(Product $product) {
        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product, Request $request) {

        if ($request->delete) {
            $product_price = ProductPrice::where('id',$request->delete)->get()->first();
            $product_price->delete();

            return back()->with('success','Cena usunięta');
        }

        if ($request->product_price) {
            if (is_numeric($request->product_price)) {
                ProductPrice::create([
                    'product_id' => $product->id,
                    'price' => $request->product_price
                ]);
                return back()->with('success','Cena dodana');
            }

            return back()->with('error','Cena musi być liczbą');
        }

        if ($request->action == 'save') {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Zapisano');
        }

        return view('product.edit', [
            'product' => $product
        ]);
    }

    public function create(Request $request) {
        if ($request->action == 'save') {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Zapisano');
        }

        return view('product.create');
    }

    public function delete(Product $product) {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Usunięto');
    }
}
