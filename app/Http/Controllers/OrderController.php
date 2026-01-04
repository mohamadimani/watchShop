<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {}

    public function store()
    {
        $baskets = auth()->user()->basket;
        if ($baskets->count() > 0) {
            $totalAmount = $baskets->sum(function ($basket) {
                $price = $basket->product->price - ($basket->product->price * $basket->product->discount) / 100;
                $totalPrice = $price * $basket->quantity;
                return $totalPrice;
            });
            DB::beginTransaction();
            try {
                $order = Order::create([
                    'user_id' => user()->id,
                    'total_amount' => $totalAmount,
                    'created_by' => user()->id,
                    'status' => 'pending',
                ]);

                $order->orderProducts()->createMany($baskets->toArray());
                Basket::query()->where('user_id', user()->id)->delete();
                DB::commit();
                return true;
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
        return false;
    }
}
