<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::active()->WithOutEconomy()->paginate(30);
        return view('web.products.index', compact('products'));
    }

    public function search($search)
    {
        $products = Product::active()->WithOutEconomy();

        if ($search) {
            if (in_array($search, [1, 2, 3]))
                $products = $products->where('brand_id', $search);
        }

        $products = $products->paginate(30);
        return view('web.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->review = $product->review + 1;
        $product->save();

        $products = Product::active()->WithOutEconomy()->where('brand_id', $product->brand_id)->whereNotIn('id', [$product->id])->limit(5)->get();
        return view('web.products.show', compact('product', 'products'));
    }
}
