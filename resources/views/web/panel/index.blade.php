@extends('layouts.master')
@section('main')
    <div class="full-row">
        <div class="container">
            <div class="row">
                @include('web.panel.sidebar')
                <div class="col-lg-9">
                    <div class="single-post">
                        <div class="full-row">
                            <div class="container">
                                <div class="row g-3 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cos-1 d-flex">

                                    <a href="{{ route('user.basket.index') }}" class="d-block">
                                        <div class="col">
                                            <div class="bg-light hover-bg-primary hover-text-white transation p-40 text-center h-100">
                                                <i class="flaticon-seo flat-large text-secondary"></i>
                                                <h4 class="mt-4 f-vazir"><span class="text-secondary hover-text-white">سبد خرید</span></h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('user.orders.index') }}" class="d-block">
                                        <div class="col">
                                            <div class="bg-light hover-bg-primary hover-text-white transation p-40 text-center h-100">
                                                <i class="flaticon-refund flat-large text-secondary"></i>
                                                <h4 class="mt-4 f-vazir"><span class="text-secondary hover-text-white">سفارش ها</span></h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('contact-us.index') }}" class="d-block">
                                        <div class="col">
                                            <div class="bg-light hover-bg-primary hover-text-white transation p-40 text-center h-100">
                                                <i class="flaticon-customer-service flat-large text-secondary"></i>
                                                <h4 class="mt-4 f-vazir"><span class="text-secondary hover-text-white">پشتیبانی </span></h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('user.logout') }}" class="d-block">
                                        <div class="col">
                                            <div class="bg-light hover-bg-primary hover-text-white transation p-40 text-center h-100">
                                                <i class="flaticon-warning flat-large text-secondary"></i>
                                                <h4 class="mt-4 f-vazir"><span class="text-secondary hover-text-white">خروج</span></h4>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
