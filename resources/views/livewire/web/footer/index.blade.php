<div>

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
    <footer class="full-row bg-white p-0">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1">
                <div class="col">
                    <div class="footer-widget my-5">
                        <div class="footer-logo mb-4">
                            <a href="index.html"><img src="{{ GetImage('logo/18.png') }}" alt="Image not found!" /></a>
                        </div>
                        <div class="widget-ecommerce-contact">
                            <div class="text-general mt-20">
                                {{ $aboutUs->summary }}
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget media-widget">
                        @foreach ($socials as $social)
                            @php
                                $width = '30px';
                                if ($social->icon == 'telegram') {
                                    $width = '24px';
                                }
                            @endphp
                            <a href="{{ $social->link }}"><img src="{{ GetImage('social/' . $social->icon . '.png') }}" style="width:{{ $width }};"></a>
                        @endforeach
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget category-widget my-5">
                        <h6 class="widget-title mb-sm-4">دسته بندی</h6>
                        <ul>
                            <li><a class="" href="{{ route('products.search', [1]) }}">ساعت مردانه</a></li>
                            <li><a class="" href="{{ route('products.search', [2]) }}">ساعت زنانه</a></li>
                            <li><a class="" href="{{ route('products.search', [3]) }}">ساعت هوشمند</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget category-widget my-5">
                        <h6 class="widget-title mb-sm-4">سایر صفحات</h6>
                        <ul>
                            <li><a class="" href="{{ route('home.index') }}">صفحه اصلی</a></li>
                            <li><a href="{{ route('products.index') }}">فروشگاه</a></li>
                            <li><a href="{{ route('contact-us.index') }}">تماس با ما</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget widget-nav my-5">
                        <h6 class="widget-title mb-sm-4">حساب کاربری</h6>
                        <ul>
                            <li><a href="">ورود</a></li>
                            <li><a href="">ثبت نام</a></li>
                            <li><a href="">پیگیری سفارشات</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="full-row copyright bg-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="sm-mb-10 d-block">طراحی شده با عشق در بامبو وب</span>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="bg-primary text-white" id="scroll"><i class="fa fa-angle-up"></i></a>

</div>
