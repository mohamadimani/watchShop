<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()->paginate(30);
        return view('web.products.index', compact('products'));
    }
    public function show(Product $product)
    {
        $products = Product::active()->where('brand_id', $product->brand_id)->whereNotIn('id', [$product->id])->limit(5)->get();
        return view('web.products.show', compact('product', 'products'));
    }
}
