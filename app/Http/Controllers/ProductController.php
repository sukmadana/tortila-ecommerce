<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $terlaris = Product::inRandomOrder()->limit(3)->get();

        return view('product', compact('products', 'terlaris'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $related = Product::inRandomOrder()->limit(3)->whereNot('id', $id)->get();

        return view('single-product', compact('product', 'related'));
    }
}
