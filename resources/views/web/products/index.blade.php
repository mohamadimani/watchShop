@extends('layouts.master')
@section('main')
    <div class="full-row pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="products-header d-flex justify-content-between align-items-center py-10 px-20 bg-light md-mt-30">
                        <div class="products-header-right">
                            {{-- <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order">
                                    <option value="1" selected="selected">مرتب سازی پیش فرض</option>
                                    <option value="mostSell">پرفروش ترین</option>
                                    <option value="mostViewed">پربازدید ترین</option>
                                    <option value="expensive">گران ترین</option>
                                    <option value="cheap">ارزان ترین</option>
                                </select>
                            </form> --}}
                        </div>
                    </div>

                    <div class="showing-products pt-30 pb-50 border-2 border-bottom border-light">
                        <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 product-style-3 e-hover-image-zoom e-image-bg-light g-4">
                            @foreach ($products as $product)
                                <div class="col" style="border: 1px solid rgb(234, 234, 234);">
                                    <div class="product type-product">
                                        <div class="product-wrapper">
                                            <div class="product-image">
                                                <a href="{{ route('products.show', [$product->id]) }}" class="woocommerce-LoopProduct-link">
                                                    <img src="{{ GetImage('products/gallery/' . ($product?->galleries()->where('position', 1)->first()?->image ?? 1)) }}" alt="Product Image">
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

                    @if ($products->hasPages())
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <div>
                                <p class="small text-muted">
                                    نمایش
                                    <span class="fw-semibold">{{ $products->firstItem() }}</span>
                                    تا
                                    <span class="fw-semibold">{{ $products->lastItem() }}</span>
                                    از
                                    <span class="fw-semibold">{{ $products->total() }}</span>
                                    نتیجه
                                </p>
                            </div>
                            <div class="pagination-style-one">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->url(1) }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        @for ($page = 1; $page <= $products->lastPage(); $page++)
                                            @if ($products->currentPage() == $page)
                                                <li class="page-item"><a class="page-link bg-info text-white" href="{{ $products->url($page) }}">{{ $page }}</a></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a></li>
                                            @endif
                                        @endfor
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->url($products->lastPage()) }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
