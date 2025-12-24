@extends('layouts.master')
@section('main')
    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary font-large">جزئیات محصول <span>{{ $product->title }}</span></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <div class="full-row">
        <div class="container">
            <div class="row single-product-wrapper">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="product-images">
                        <div class="images-inner">
                            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4"
                                style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                                <figure class="woocommerce-product-gallery__wrapper">
                                    <div class="bg-light">
                                        <img id="single-image-zoom" src="assets/images/products/squire-233.png" alt="Thumb Image" data-zoom-image="assets/images/products/squire-233.png" />
                                    </div>

                                    <div id="gallery_09" class="product-slide-thumb">
                                        <div class="owl-carousel four-carousel dot-disable nav-arrow-middle owl-mx-5" dir="ltr">
                                            <div class="item">
                                                <a class="active" href="#" data-image="assets/images/products/squire-269.png" data-zoom-image="assets/images/products/squire-269.png">
                                                    <img src="assets/images/products/squire-269.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a href="#" data-image="assets/images/products/squire-270.png" data-zoom-image="assets/images/products/squire-270.png">
                                                    <img src="assets/images/products/squire-270.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a href="#" data-image="assets/images/products/squire-271.png" data-zoom-image="assets/images/products/squire-271.png">
                                                    <img src="assets/images/products/squire-271.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a href="#" data-image="assets/images/products/squire-272.png" data-zoom-image="assets/images/products/squire-272.png">
                                                    <img src="assets/images/products/squire-272.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a href="#" data-image="assets/images/products/squire-269.png" data-zoom-image="assets/images/products/squire-269.png">
                                                    <img src="assets/images/products/squire-269.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                            <div class="item">
                                                <a href="#" data-image="assets/images/products/squire-270.png" data-zoom-image="assets/images/products/squire-270.png">
                                                    <img src="assets/images/products/squire-270.png" alt="Thumb Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="summary entry-summary">
                        <div class="summary-inner">

                            <h1 class="product_title entry-title">{{ $product->title }}</h1>
                            {{-- <div class="woocommerce-product-rating">
                                    <div class="fancy-star-rating">
                                        <div class="rating-wrap" dir="ltr"> <span class="fancy-rating good">5 ★</span>
                                        </div>
                                        <div class="rating-counts-wrap">
                                            <a href="#reviews" class="bigbazar-rating-review-link" rel="nofollow"> <span class="rating-counts"> (2) </span> </a>
                                        </div>
                                    </div>
                                </div> --}}
                            <p class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>{{ $product->price }}<span class="woocommerce-Price-currencySymbol"> تومان</span></bdi>
                                </span>
                            </p>
                        </div>
                        <div class="stock-availability in-stock"><span>{{ $product->count }}</span> عدد موجود در انبار فروشنده</div>
                        <div class="product-offers">
                            <ul class="product-offers-list">
                                <li class="product-offer-item"><span class="h6">گارانتی : </span> {{ $product->guaranty }} </li>
                                <li class="product-offer-item"><span class="h6">نوع : </span> {{ $product->category->title }} </li>
                                <li class="product-offer-item"><span class="h6">برند : </span> {{ $product->brand->title }} </li>
                            </ul>
                        </div>
                        <div class="product-services">
                            <span class="f-vazir-bold">خدمات:</span>
                            <ul class="product-services-list">
                                <li class="product-service-item"> 3 روز ضمانت بازگشت کالا</li>
                                <li class="product-service-item"> امکان تحویل اکسپرس</li>
                            </ul>
                        </div>
                        {{-- <div class="woocommerce-product-details__short-description"> <span class="f-vazir-bold">ویژگی ها:</span>
                            <div class="short-description">
                                <ul>
                                    <li>نوع کاربری : ورزشی، روزمره، فشن</li>
                                    <li>قابل استفاده برای : آقایان، بانوان، پسران، دختران</li>
                                    <li>فرم صفحه : گرد</li>
                                    <li>جنس شیشه : معدنی</li>
                                    <li>نوع قفل بند : سگکی ساده</li>
                                </ul>
                            </div>
                        </div> --}}
                        <form class="variations_form cart kapee-swatches-wrap" action="#" method="post" enctype="multipart/form-data">
                            <table class="variations">
                                <tr>
                                    <td class="label f-vazir-bold"><label>رنگ</label></td>
                                    <td class="value with-swatches">
                                        <div class="bigbazar-swatches">
                                            @foreach ($product->colors as $color)
                                                <span class="swatch swatch-color swatch-circle swatch-selected" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="{{ $color->name }}">
                                                    <span class="bigbazar-tooltip" style="background-color:{{ $color->code }}" title="{{ $color->name }}">{{ $color->name }}</span>
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="single_variation_wrap">
                                <div class="quantity">
                                    <input type="number" min="1" max="9" step="1" value="1">
                                </div>
                                <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
                                    <button type="submit" class="single_add_to_cart_button button alt single_add_to_cart_ajax_button">افزودن به سبد</button>
                                    <div class="bigbazar-quick-buy">
                                        <button class="bigbazar_quick_buy_button bigbazar_quick_buy_variable bigbazar_quick_buy_58" value="Buy Now">همین حالا خرید کن!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="yith-wcwl-add-to-wishlist wishlist-fragment">
                            <div class="wishlist-button">
                                <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="افزودن به علاقه مندی"
                                    aria-label="Add to Wishlist">افزودن به علاقه مندی</a>
                            </div>
                            <div class="compare-button">
                                <a class="compare button" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="مقایسه کالا"
                                    aria-label="Compare">مقایسه کالا</a>
                            </div>
                        </div>
                        <div class="bigbazar-wc-message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--==================== Product Description Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-head border-bottom">
                        <div class="woocommerce-tabs wc-tabs-wrapper ps-0">
                            <ul class="nav nav-pills wc-tabs" id="pills-tab-one" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-description-one-tab" data-bs-toggle="pill" href="#pills-description-one" role="tab" aria-controls="pills-description-one"
                                        aria-selected="true">معرفی</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-information-one-tab" data-bs-toggle="pill" href="#pills-information-one" role="tab" aria-controls="pills-information-one"
                                        aria-selected="true">مشخصات</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">
                        <div class="tab-content" id="pills-tabContent-one">
                            <div class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description" id="pills-description-one" role="tabpanel"
                                aria-labelledby="pills-description-one-tab">
                                <div class="row">
                                    <div class="col-md-8">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-information-one" role="tabpanel" aria-labelledby="pills-information-one-tab">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 class="my-3">مشخصات</h2>
                                        <table class="woocommerce-product-attributes shop_attributes">
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">
                                                <th class="woocommerce-product-attributes-item__label">وزن :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>۳۸.۸ گرم</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">ابعاد قاب :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>۴۵x۳۸x۱۰.۷ میلی‌متر</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">ظرفیت باتری :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>نامشخص میلی آمپر ساعت</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">مدل :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>MF841HN/A</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">سیستم عامل :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>WatchOS</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">سایر مشخصات سخت افزاری :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>پردازنده دو هسته ای</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Product Description Section End ====================-->

    <!--==================== Related Products Section Start ====================-->
    <div class="full-row pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-head border-bottom d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex section-head-side-title">
                            <h4 class="text-dark mb-0">کالاهای مشابه</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="showing-products pt-30 pb-50 border-2 border-bottom border-light">
                        <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 product-style-3 e-hover-image-zoom e-image-bg-light g-4">
                            @foreach ($products as $product)
                                <div class="col" style="border: 1px solid rgb(234, 234, 234);">
                                    <div class="product type-product">
                                        <div class="product-wrapper">
                                            <div class="product-image">
                                                <a href="{{ route('products.show', [$product->id]) }}" class="woocommerce-LoopProduct-link">
                                                    <img src="{{ asset('assets/images/products/squire-79.png') }}" alt="Product Image">
                                                </a>
                                                {{-- <div class="product-labels">
                                                    <div class="shape1-badge3"><span>جدید</span></div>
                                                </div> --}}
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title"><a href={{ route('products.show', [$product->id]) }}">{{ $product->title }} </a></h3>
                                                <div class="product-price">
                                                    <div class="price">
                                                        <ins><span>{{ $product->price }}</span> تومان</ins>
                                                    </div>
                                                </div>
                                                <div class="shipping-feed-back">
                                                    <div class="star-rating">
                                                        {{-- <div class="rating-wrap">
                                                            <a href="{{ route('products.show',[$product->id]) }}"><i class="fas fa-star"></i><span> 4.85</span></a>
                                                        </div> --}}
                                                        {{-- <div class="rating-counts-wrap">
                                                            <a href="{{ route('products.show',[$product->id]) }}">(132)</a>
                                                        </div> --}}
                                                    </div>
                                                    <div class="sold-items">
                                                        <span> {{ $product->review }}</span> <span>بازدید</span>
                                                    </div>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="cart-button">
                                                        <a href="#" class="button add_to_cart_button">افزودن به سبد خرید</a>
                                                    </div>
                                                    <div class="wishlist-button">
                                                        <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-bs-original-title="افزودن به علاقه مندی" aria-label="Add to Wishlist">افزودن به علاقه مندی</a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a class="compare button" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="مقایسه"
                                                            aria-label="Compare">مقایسه</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Related Products Section End ====================-->
@endsection
