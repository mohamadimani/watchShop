@extends('layouts.master')
@section('main')
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="woocommerce">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                <div class="sign-in-form">
                                    <h3>اطلاعات حساب کاربری</h3>
                                    @include('admin.layouts.alerts')
                                    <form class="woocommerce-form-login" method="post" action="{{ route('user.do-login') }}">
                                        @csrf
                                        <p>
                                            <label for="mobile">موبایل<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" />
                                        </p>
                                        <p>
                                            <label for="password">رمز عبور&nbsp;<span class="required">*</span></label>
                                            <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" />
                                        </p>
                                        <p>
                                            <a type="submit" class="woocommerce-form-login__submit btn btn-info rounded-0 text-white" href="{{ route('user.register') }}" value="Log in">ثبت نام</a>
                                            {{-- <a href="#" class="text-secondary">رمز عبور خود را فراموش کرده اید؟</a> --}}
                                        </p>
                                        <p class="form-row">
                                            <button type="submit" class=" btn btn-primary rounded-0" value="Log in">ورود به حساب</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
