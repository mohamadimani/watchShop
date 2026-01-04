<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        return view('web.panel.index');
    }

    public function basket()
    {
        $baskets = Basket::where(['user_id' => user()->id])->with('product')->orderBy('id','DESC')->get();
        return view('web.basket.index', compact('baskets'));
    }


    public function basketDelete(Basket $basket)
    {
        $basket->delete();
        return redirect()->back()->with('success', 'با موفقیت انجام شد');
    }

    public function basketStore(Product $product, Request $request)
    {
        $request->validate([
            'color' => 'required|integer',
            'count' => 'required|integer',
        ]);

        $basket = Basket::where([
            'product_id' => $product->id,
            'user_id' => user()->id,
            'color_id' => $request->color,
        ])->first();

        if ($basket) {
            $basket->count = $basket->count + $request->count;
            $basket->save();
        } else {
            $createdBasket = Basket::create([
                'product_id' => $product->id,
                'user_id' => user()->id,
                'color_id' => $request->color,
                'count' => $request->count,
                'created_by' => user()->id,
            ]);
        }
        return redirect()->back()->with('success', 'با موفقیت ثبت شد');
    }
}
