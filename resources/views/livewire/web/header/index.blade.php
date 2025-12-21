<header class="ecommerce-header">

    <div class="middle-header d-none d-lg-block py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product-search-one flex-grow-1">
                        <form class="form-inline search-pill-shape" action="#" method="post">
                            <input type="text" class="form-control search-field" name="search" placeholder="جستجو کالای مورد نظر...">
                            <button type="submit" name="submit" class="search-submit"><i class="flaticon-search flat-mini"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <a class="navbar-brand" href="index.html"><img class="nav-logo" src="assets/images/logo/18.png" alt="Image not found !"></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="margin-right-1 h-100 d-flex align-items-center justify-content-end">
                        <div class="sign-in position-relative font-general my-account-dropdown">
                            <a href="my-account.html" class="has-dropdown d-flex align-items-center text-dark text-decoration-none" title="My Account">
                                <i class="flaticon-user-3 flat-small me-1"></i>
                            </a>
                        </div>
                        <div class="wishlist-view">
                            <a href="wishlist.html" class="position-relative top-quantity d-flex align-items-center text-white text-decoration-none">
                                <i class="flaticon-like flat-small text-dark"></i>
                            </a>
                        </div>
                        <div class="refresh-view">
                            <a href="#" class="position-relative top-quantity d-flex align-items-center text-dark text-decoration-none">
                                <i class="flaticon-shuffle flat-small text-dark"></i>
                            </a>
                        </div>
                        <div class="header-cart-2">
                            <a href="cart.html" class="cart has-cart-data" title="View Cart">
                                <div class="cart-icon"><i class="flaticon-add-to-basket flat-small"></i> <span class="header-cart-count">2</span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav py-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg nav-dark nav-primary-hover nav-line-active">
                        <a class="navbar-brand d-lg-none" href="#"><img class="nav-logo" src="assets/images/logo/18.png" alt="Image not found!"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="navbar-toggler-icon flaticon-menu-2 flat-small text-dark"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item"><a class="nav-link" href="/">صفحه اصلی</a> </li>
                                <li class="nav-item"><a class="nav-link" href="index.html">ساعت مردانه</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.html">ساعت زنانه</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.html">ساعت هوشمند</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">فروشگاه</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog-grid-left-sidebar.html">وبلاگ</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact-us.index') }}">تماس با ما</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- MOBILE --}}
    <div class="header-sticky bg-white py-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-6 order-lg-1">
                    <div class="d-flex align-items-center h-100 md-py-10">
                        <div class="nav-leftpush-overlay">
                            <nav class="navbar navbar-expand-lg nav-general nav-primary-hover">
                                <button type="button" class="push-nav-toggle d-lg-none border-0">
                                    <i class="flaticon-menu-2 flat-small text-primary"></i>
                                </button>
                                <div class="navbar-slide-push transation-this">
                                    <div class="menu-and-category">
                                        <div class="tab-content" id="menu-and-categoryContent">
                                            <div class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description" id="pills-push-menu" role="tabpanel"
                                                aria-labelledby="pills-push-menu-tab">
                                                <div class="push-navbar">
                                                    <ul class="navbar-nav">
                                                        <li class="nav-item"><a class="nav-link" href="/">صفحه اصلی</a> </li>
                                                        <li class="nav-item"><a class="nav-link" href="index.html">ساعت مردانه</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="index.html">ساعت زنانه</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="index.html">ساعت هوشمند</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">فروشگاه</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="blog-grid-left-sidebar.html">وبلاگ</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{ route('contact-us.index') }}">تماس با ما</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <a class="navbar-brand" href="index.html"><img class="nav-logo" src="assets/images/logo/17.png" alt="Image not found !"></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-3 col-6 order-lg-3">
                    <div class="margin-right-1 d-flex align-items-center justify-content-end h-100 md-py-10">
                        <div class="sign-in position-relative font-general my-account-dropdown">
                            <a href="my-account.html" class="has-dropdown d-flex align-items-center text-dark text-decoration-none" title="My Account">
                                <i class="flaticon-user-3 flat-small me-1"></i>
                            </a>

                        </div>
                        <div class="wishlist-view">
                            <a href="wishlist.html" class="position-relative top-quantity d-flex align-items-center text-white text-decoration-none" title="Wishlist">
                                <i class="flaticon-like flat-small text-dark"></i>
                            </a>
                        </div>
                        <div class="refresh-view">
                            <a href="#" class="position-relative top-quantity d-flex align-items-center text-dark text-decoration-none">
                                <i class="flaticon-shuffle flat-small text-dark"></i>
                            </a>
                        </div>
                        <div class="header-cart-2">
                            <a href="cart.html" class="cart has-cart-data" title="View Cart">
                                <div class="cart-icon"><i class="flaticon-add-to-basket flat-small"></i> <span class="header-cart-count">2</span></div>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6 col-lg-6 col-12 order-lg-2">
                    <div class="product-search-one">
                        <form class="form-inline search-pill-shape" action="#" method="post">
                            <input type="text" class="form-control search-field" name="search" placeholder="جستجو کالای مورد نظر...">
                            <div class="select-appearance-none">
                                <select class="form-control">
                                    <option selected>همه دسته بندی</option>
                                    <option value="1">یک</option>
                                    <option value="2">دو</option>
                                    <option value="3">سه</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="search-submit"><i class="flaticon-search flat-mini text-dark"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
