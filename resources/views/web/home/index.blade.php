@extends('layouts.master')
@section('main')
    <div id="page_wrapper" class="bg-white">

        <style>
            .border-1 {
                border: 1px solid silver;
            }
        </style>
        <!-- Slider HTML markup -->
        <div class="full-row py-0 overflow-hidden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div id="watch-slider" style="width:1420px; height:740px; margin:0 auto; margin-bottom: 0px;">

                            <!-- Slide 1-->
                            <div class="ls-slide"
                                data-ls="bgsize:cover; bgposition:50% 50%; duration:10000; transition2d:3; timeshift:-500; deeplink:home; kenburnszoom:in; kenburnsrotate:0; kenburnsscale:1.2; parallaxevent:scroll; parallaxdurationmove:500;">

                                <div style="width:100%; height:100%; top:50%; right:50%;" class="ls-l bg-light"
                                    data-ls="easingin:easeOutQuint; durationout:400; parallaxlevel:0; static:forever; position:fixed;"></div>

                                <img width="450" height="450" src="assets/images/slider/35.png" style="top:50%; right:50%;" class="ls-l"
                                    data-ls="offsetin:200; fadein:true; rotatein:0; durationout:400; parallax:false; position:fixed; loop:true; loopduration:60000; loopstartat:transitioninstart + 0; looprotate:360; loopcount:-1;"
                                    alt="image not found!">

                                <img width="1920" height="840" src="assets/images/slider/34.png" style="top:50%; right:50%;" class="ls-l"
                                    data-ls="offsetin:100; fadein:true; rotatein:0; delayin:500; durationout:400; parallax:false; position:fixed;" alt="image not found!">

                                <img width="311" height="503" src="assets/images/slider/36.png" style="top:50%; right:50.5%;" class="ls-l"
                                    data-ls="offsetin:200; fadein:true; rotatein:0; delayin:500; durationout:400; parallax:false; position:fixed;" alt="image not found!">

                                <p style="font-weight:400; text-align:right; width:300px; font-size:17px; line-height:50px; top:70px; right:20px; white-space:normal;"
                                    class="ls-l text-primary text-uppercase" data-ls="offsetyin:40; easingin:easeOutQuint; filterin:blur(10px); offsetyout:-200; durationout:200; parallax:false;">
                                    برندهای لوکس</p>

                                <p style="font-weight:600; text-align:right; width:400px; font-size:45px; line-height:60px; top:120px; right:20px; white-space:normal; font-family: 'IRANyekan' !important"
                                    class="ls-l higlight-font text-secondary"
                                    data-ls="offsetyin:40; delayin:250; easingin:easeOutQuint; filterin:blur(10px); offsetyout:-200; durationout:400; parallax:false;">ساعت مچی مردانه مدل دیزل
                                </p>

                                <p style="font-weight:400; text-align:right; width:300px; font-size:16px; line-height:30px; top:150px; right:87.5%; white-space:normal;"
                                    class="ls-l higlight-font text-secondary" data-ls="offsetyin:40; delayin:700; easingin:easeOutQuint; offsetyout:-250; durationout:400; parallax:false;">
                                    قابلیت‌های تخصصی ساعت
                                </p>
                                <div style="font-weight:400; text-align:right; width:300px; font-size:17px; line-height:30px; top:190px; right:87.5%; white-space:normal;" dir="rtl"
                                    class="ls-l higlight-font text-secondary" data-ls="offsetyin:40; delayin:900; easingin:easeOutQuint; offsetyout:-250; durationout:400; parallax:false;">
                                    تاریخ‌شمار, عقربه‌های شب‌تاب, کرنوگراف
                                </div>

                            </div>

                            <!-- Slide 2 -->
                            <div class="ls-slide"
                                data-ls="bgsize:cover; bgposition:50% 50%; duration:10000; transition2d:3; timeshift:-500; deeplink:home; kenburnszoom:in; kenburnsrotate:0; kenburnsscale:1.2; parallaxevent:scroll; parallaxdurationmove:500;">

                                <div style="width:100%; height:100%; top:50%; right:50%;" class="ls-l bg-light"
                                    data-ls="easingin:easeOutQuint; durationout:400; parallaxlevel:0; static:forever; position:fixed;"></div>

                                <img width="450" height="450" src="assets/images/slider/35.png" style="top:50%; right:50%;" class="ls-l"
                                    data-ls="offsetin:200; fadein:true; rotatein:0; durationout:400; parallax:false; position:fixed; loop:true; loopduration:60000; loopstartat:transitioninstart + 0; looprotate:360; loopcount:-1;"
                                    alt="image not found!">

                                <img width="1920" height="840" src="assets/images/slider/34.png" style="top:50%; right:50%;" class="ls-l"
                                    data-ls="offsetin:100; fadein:true; rotatein:0; delayin:500; durationout:400; parallax:false; position:fixed;" alt="image not found!">

                                <img width="311" height="503" src="assets/images/slider/37.png" style="top:50%; right:50.5%;" class="ls-l"
                                    data-ls="offsetin:200; fadein:true; rotatein:0; delayin:500; durationout:400; parallax:false; position:fixed;" alt="image not found!">

                                <p style="font-weight:400; text-align:right; width:300px; font-size:17px; line-height:50px; top:70px; right:20px; white-space:normal;"
                                    class="ls-l text-primary text-uppercase" data-ls="offsetyin:40; easingin:easeOutQuint; filterin:blur(10px); offsetyout:-200; durationout:200; parallax:false;">
                                    برندهای لوکس</p>

                                <p style="font-weight:600; text-align:right; width:400px; font-size:45px; line-height:60px; top:120px; right:20px; white-space:normal; font-family: 'IRANyekan' !important"
                                    class="ls-l higlight-font text-secondary"
                                    data-ls="offsetyin:40; delayin:250; easingin:easeOutQuint; filterin:blur(10px); offsetyout:-200; durationout:400; parallax:false;">ساعت مچی زنانه مدل ورساچه</p>

                                <p style="font-weight:400; text-align:right; width:300px; font-size:16px; line-height:30px; top:150px; right:87.5%; white-space:normal;"
                                    class="ls-l higlight-font text-secondary" data-ls="offsetyin:40; delayin:700; easingin:easeOutQuint; offsetyout:-250; durationout:400; parallax:false;">
                                    قابلیت‌های تخصصی ساعت
                                </p>
                                <div style="font-weight:400; text-align:right; width:300px; font-size:17px; line-height:30px; top:190px; right:87.5%; white-space:normal;" dir="rtl"
                                    class="ls-l higlight-font text-secondary" data-ls="offsetyin:40; delayin:900; easingin:easeOutQuint; offsetyout:-250; durationout:400; parallax:false;">
                                    تاریخ‌شمار, عقربه‌های شب‌تاب, کرنوگراف
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Slider Section End-->

        <!--==================== Banner Section Start ====================-->
        <div class="full-row pb-0">
            <div class="container">
                <div class="row g-4">

                    <div class="col-xl-4 col-md-6">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="banner-wrapper hover-img-zoom banner-one custom-class-125" style="background: url(assets/images/banner/87.png) no-repeat;">
                                    <div class="banner-image overflow-hidden transation"><img src="assets/images/banner/88.png" alt="Banner Image"></div>
                                    <div class="banner-content position-absolute">
                                        <a href="{{ route('products.search', [1]) }}" class="category">ساعت مچی مردانه</a>
                                        <h4 class="title"><a>بهترین کالکشن</a></h4>
                                        <a href="{{ route('products.search', [1]) }}" class="btn btn-outline-primary">مشاهده و خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="banner-wrapper hover-img-zoom banner-one custom-class-125" style="background: url(assets/images/banner/87.png) no-repeat;">
                                    <div class="banner-image overflow-hidden transation"><img src="assets/images/banner/90.png" alt="Banner Image"></div>
                                    <div class="banner-content position-absolute">
                                        <a href="{{ route('products.search', [2]) }}" class="category">ساعت مچی زنانه</a>
                                        <h4 class="title"><a>بهترین کالکشن</a></h4>
                                        <a href="{{ route('products.search', [2]) }}" class="btn btn-outline-primary">مشاهده و خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="banner-wrapper hover-img-zoom banner-one custom-class-125" style="background: url(assets/images/banner/87.png) no-repeat;">
                                    <div class="banner-image overflow-hidden transation"><img src="assets/images/banner/95.png" alt="Banner Image"></div>
                                    <div class="banner-content position-absolute">
                                        <a href="{{ route('products.search', [3]) }}" class="category">ساعت مچی هوشمند</a>
                                        <h4 class="title"><a>بهترین کالکشن</a></h4>
                                        <a href="{{ route('products.search', [3]) }}" class="btn btn-outline-primary">مشاهده و خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--==================== Banner Section End ====================-->

        <!--==================== Trending Products Section Start ====================-->
        <div class="full-row pb-0">
            <div class="container">
                <div class="row justify-content-center wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1000ms">
                    <div class="col-xxl-4 col-xl-6 col-lg-7 col-md-8">
                        <div class="text-center mb-5">
                            <h3 class="text-center font-400 mb-4 font-extra-large">محصولات پرفروش</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="products product-style-1 owl-mx-15">
                            <div class="four-carousel owl-carousel dot-disable nav-arrow-middle-show e-title-hover-primary e-hover-image-zoom e-info-center" dir="ltr">

                                @foreach ($mostViewedProducts as $mostViewedProduct)
                                    <div class="item border-1">
                                        <div class="product type-product">
                                            <div class="product-wrapper">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', [$mostViewedProduct->id]) }}" class="woocommerce-LoopProduct-link"><img
                                                            src="{{ GetImage('products/gallery/' . ($mostViewedProduct?->galleries()->where('position', 1)->first()?->image ?? 1)) }}"
                                                            alt="{{ $mostViewedProduct->title }}"></a>
                                                    <div class="hover-area">
                                                        <div class="cart-button">
                                                            <a href="#" class="button add_to_cart_button" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                                                                data-bs-original-title="افزودن به سبد خرید" aria-label="Add to Cart">افزودن به سبد خرید</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h3 class="product-title"><a href="{{ route('products.show', [$mostViewedProduct->id]) }}">{{ $mostViewedProduct->title }}</a></h3>
                                                    <div class="product-price">
                                                        <div class="price">
                                                            <ins><span>{{ $mostViewedProduct->price }}</span> تومان</ins>
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
        <hr>
        <!--==================== Trending Products Section Start ====================-->
        <div class="full-row pb-0">
            <div class="container">
                <div class="row justify-content-center wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1000ms">
                    <div class="col-xxl-4 col-xl-6 col-lg-7 col-md-8">
                        <div class="text-center mb-5">
                            <h3 class="text-center font-400 mb-4 font-extra-large">محصولات پربازدید</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="products product-style-1 owl-mx-15">
                            <div class="four-carousel owl-carousel dot-disable nav-arrow-middle-show e-title-hover-primary e-hover-image-zoom e-info-center" dir="ltr">
                                @foreach ($mostViewedProducts as $mostViewedProduct)
                                    <div class="item border-1">
                                        <div class="product type-product">
                                            <div class="product-wrapper">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', [$mostViewedProduct->id]) }}" class="woocommerce-LoopProduct-link"><img
                                                            src="{{ GetImage('products/gallery/' . ($mostViewedProduct?->galleries()->where('position', 1)->first()?->image ?? 1)) }}"
                                                            alt="{{ $mostViewedProduct->title }}"></a>
                                                    <div class="hover-area">
                                                        <div class="cart-button">
                                                            <a href="#" class="button add_to_cart_button" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                                                                data-bs-original-title="افزودن به سبد خرید" aria-label="Add to Cart">افزودن به سبد خرید</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h3 class="product-title"><a href="{{ route('products.show', [$mostViewedProduct->id]) }}">{{ $mostViewedProduct->title }}</a></h3>
                                                    <div class="product-price">
                                                        <div class="price">
                                                            <ins><span>{{ $mostViewedProduct->price }}</span> تومان</ins>
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
        <!--==================== Trending Products Section End ====================-->
        <hr>
        <!--==================== Our Partner Section Start ====================-->
        <div class="full-row bg-white pb-30 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center font-18"> برند ها </h4>
                        <div class="owl-carousel partner-slider" dir="ltr">
                            @foreach ($brands as $brand)
                                <div class="item">
                                    <h3 class="mt-3 text-info text-center">{{ $brand->title }}</h3>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==================== Our Partner Section End ====================-->
        <hr>
        <!--==================== Inspirational Posts Section Start ====================-->
        {{-- <div class="full-row bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h3 class="down-line font-extra-large text-center font-500 mb-40">مقالات</h3>
                    </div>
                </div>
                <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4 gy-xl-0">

                    <div class="col border-1">
                        <div class="thumb-blog-simple text-center transation hover-img-zoom">
                            <div class="post-image overflow-hidden">
                                <img src="assets/images/blog/3.png" alt="Image not found!">
                            </div>
                            <div class="post-content">
                                <h5><a href="blog-single.html" class="transation text-dark hover-text-primary d-table my-10 mx-auto font-500">کورنوگراف چیست؟</a></h5>
                                <p>ساعتی خریده اید که یکی از مزیت های آن کرنوگراف است. این به چه معنا می‌باشد؟ در چه...</p>
                                <a href="blog-single.html" class="btn-link-down-line d-table mx-auto">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr> --}}
        <!--==================== Inspirational Posts Section End ====================-->
    </div>
@endsection
