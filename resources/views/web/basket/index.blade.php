@extends('layouts.master')
@section('main')
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                    @include('admin.layouts.alerts')
                    <form class="woocommerce-cart-form" action="#" method="post">
                        <table class="shop_table cart">
                            <tr>
                                <th class="product-thumbnail">تصویر</th>
                                <th class="product-name">نام کالا</th>
                                <th class="product-price">رنگ</th>
                                <th class="product-price">قیمت</th>
                                <th class="product-quantity">تعداد</th>
                                <th class="product-subtotal">جمع مبلغ</th>
                                <th class="product-remove">حذف</th>
                            </tr>
                            @php
                                $sumBasketPrice = 0;
                            @endphp
                            @foreach ($baskets as $basket)
                                @php
                                    $sumBasketPrice = $sumBasketPrice + $basket->count * $basket->product->price;
                                @endphp
                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                    <td class="product-thumbnail">
                                        <a target="_blank" href="{{ GetImage('products/gallery/' . ($basket->product?->galleries()->where('position', 1)->first()?->image ?? 1)) }}"><img src="{{ GetImage('products/gallery/' . ($basket->product?->galleries()->where('position', 1)->first()?->image ?? 1)) }}" alt="{{ $basket->product->title }}"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('products.show', [$basket->product_id]) }}">{{ $basket->product->title }}</a>
                                    </td>
                                    <td class="product-quantity">{{ $basket->color->name }} </td>
                                    <td class="product-price"> <span><bdi>{{ number_format($basket->product->price) }}<span> تومان</span></bdi> </span> </td>
                                    <td class="product-quantity">{{ $basket->count }} </td>
                                    <td class="product-subtotal">
                                        <span><bdi>{{ number_format($basket->count * $basket->product->price) }}<span> تومان</span></bdi>
                                        </span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{ route('user.basket.delete',[$basket->id]) }}" class="remove">×</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>جمع سبد خرید</h2>
                            <table>
                                <tr>
                                    <th>قیمت کالاها</th>
                                    <td>
                                        <span><bdi> {{ number_format($sumBasketPrice) }} <span> تومان</span></bdi>
                                        </span>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>هزینه ارسال</th>
                                    <td>
                                        50,000 <span>تومان</span>
                                    </td>
                                </tr> --}}
                                <tr class="order-total">
                                    <th>جمع نهایی</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($sumBasketPrice) }}<span> تومان</span></bdi></span></strong> </td>
                                </tr>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="#" class="checkout-button">ادامـه خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
