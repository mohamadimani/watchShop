@extends('layouts.master')
@section('main')

    <div class="full-row pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="products-header d-flex justify-content-between align-items-center py-10 px-20 bg-light md-mt-30">
                        <div class="products-header-right">
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order">
                                    <option value="1" selected="selected">مرتب سازی پیش فرض</option>
                                    <option value="2">مرتب سازی براساس محبوب ترین</option>
                                    <option value="3">مرتب سازی براساس امتیاز بالا</option>
                                    <option value="4">مرتب سازی براساس جدیدترین</option>
                                    <option value="5">مرتب سازی براساس قیمت: پایین به بالا</option>
                                    <option value="6">مرتب سازی براساس قیمت: بالا به پایین</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="showing-products pt-30 pb-50 border-2 border-bottom border-light">
                        <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 product-style-3 e-hover-image-zoom e-image-bg-light g-4">

                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="#" class="woocommerce-LoopProduct-link">
                                                <img src="assets/images/products/squire-79.png" alt="Product Image">
                                            </a>
                                            <div class="product-labels">
                                                <div class="shape1-badge3"><span>جدید</span></div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="#">هودی </a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins><span>685000</span>  تومان</ins>
                                                </div>
                                            </div>

                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="#"><i class="fas fa-star"></i><span> 4.85</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(132)</a>
                                                    </div>
                                                </div>
                                                <div class="sold-items">
                                                    <span>326</span> <span>فروش</span>
                                                </div>
                                            </div>

                                            <div class="hover-area">
                                                <div class="cart-button">
                                                    <a href="#" class="button add_to_cart_button">افزودن به سبد خرید</a>
                                                </div>
                                                <div class="wishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="افزودن به علاقه مندی"
                                                        aria-label="Add to Wishlist">افزودن به علاقه مندی</a>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================== Newslatter Section Start ====================-->
    <div class="full-row bg-secondary py-3">
        <div class="container text-center">
            <div class="row">
                <div class="text-center">
                    <div class="align-items-center h-100 text-center">
                        <h4 class="text-primary text-center">ساعت مهدیار</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-row bg-white">
        <div class="container">
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-sm-2 row-cols-1 g-0 gy-4 gy-xxl-0">
                <div class="col">
                    <div class="gray-right-line-one px-3 md-my-10 d-flex">
                        <i class="flaticon-smartphone-1 flat-medium text-secondary"></i>
                        <div class="mr-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">قیمت مناسب</a></h5>
                            <p>قیمت گذاری مناسب محصولات سایت</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one px-3 md-my-10 d-flex">
                        <i class="flaticon-airplane flat-medium text-secondary"></i>
                        <div class="mr-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">ارسال به تمام نقاط دنیا</a></h5>
                            <p>ارسال محصول به بیش از 200 شهر</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one px-3 md-my-10 d-flex">
                        <i class="flaticon-life-insurance flat-medium text-secondary"></i>
                        <div class="mr-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">پرداخت امن</a></h5>
                            <p>بهترین تجربه پرداخت آنلاین هنگام خرید</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one px-3 md-my-10 d-flex">
                        <i class="flaticon-shopping-1 flat-medium text-secondary"></i>
                        <div class="mr-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">خرید مطمئن</a></h5>
                            <p>بهبود رابط کاربری و تجربه یک خرید آسان</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one px-3 md-my-10 d-flex">
                        <i class="flaticon-24-hours flat-medium text-secondary"></i>
                        <div class="mr-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">خدمات مشتری</a></h5>
                            <p>پشتیبانی آنلاین و تلفنی به صورت 24 ساعت </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Service Info Section End ====================-->
@endsection
