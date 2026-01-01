    @extends('layouts.master')
    @section('main')
        <!--==================== Registration Form Start ====================-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="woocommerce">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                    <div class="registration-form">
                                        <h3>ثبت نام</h3>
                                        @include('admin.layouts.alerts')
                                        <form method="post" action="{{ route('user.register') }}">
                                            @csrf
                                            <p>
                                                <label for="mobile">موبایل&nbsp;<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" />
                                            </p>
                                            <p>
                                                <label for="password">رمزعبور&nbsp;<span class="required">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" />
                                            </p>
                                            <p>
                                                <label for="re_password">تکرار رمزعبور&nbsp;<span class="required">*</span></label>
                                                <input type="password" class="form-control" name="re_password" id="re_password" />
                                            </p>
                                            <p>
                                                <button type="submit" class="btn btn-primary rounded-0" name="register" value="Register">ثبت نام</button>
                                                <a href="{{ route('user.login') }}" type="submit" class="btn btn-info rounded-0 text-white" name="register" value="Register">ورود</a>
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
        <!--==================== Registration Form Start ====================-->
    @endsection
