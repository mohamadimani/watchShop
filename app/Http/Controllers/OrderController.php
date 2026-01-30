<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {}

    public function store()
    {
        $baskets = user()->baskets;
        if ($baskets->count() > 0) {
            $totalAmount = $baskets->sum(function ($basket) {
                $price = $basket->product->price - ($basket->product->price * $basket->product->discount) / 100;
                $totalPrice = $price * $basket->count;
                return $totalPrice;
            });
            DB::beginTransaction();
            try {
                $order = Order::create([
                    'user_id' => user()->id,
                    'total_amount' => $totalAmount,
                    'create_by' => user()->id,
                    'status' => 'pending',
                ]);

                foreach ($baskets as $key => $basket) {
                    $price = $basket->product->price - ($basket->product->price * $basket->product->discount) / 100;
                    $totalPrice = $price * $basket->count;
                    $orderItem = OrderItem::create([
                        'user_id' => user()->id,
                        'order_id' => $order->id,
                        'product_id' => $basket->product_id,
                        'color_id' => $basket->color_id,
                        'count' => $basket->count,
                        'price' => $price,
                        'total_amount' => $totalPrice,
                        'created_by' => user()->id,
                    ]);
                }

                // $order->orderItems()->createMany($baskets->toArray());
                Basket::query()->where('user_id', user()->id)->delete();
                DB::commit();
                return redirect()->route('user.orders.show', $order->id)->with('success', 'با موفقیت ثبت شد');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } elseif ($baskets->count() == 0) {
            return redirect()->back()->withError('سبد خرید شما خالی است');
        }
        return redirect()->back()->withError('مشکل در ثبت');
    }
}
