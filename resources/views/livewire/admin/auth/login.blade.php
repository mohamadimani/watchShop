<div>
    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center">
                                <a href="index.html" class="app-brand-link gap-2">
                                    <span class="app-brand-text demo h3 mb-0 fw-bold">BamboCv</span>
                                </a>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="p-0 m-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="mb-3 secondary-font">به پنل مدیریت خوش آمدید!</h4>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">ایمیل یا نام کاربری</label>
                                <input type="text" class="form-control text-start" id="mobile" wire:model="mobile" placeholder="ایمیل یا نام کاربری خود را وارد کنید" autofocus dir="ltr">
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">رمز عبور</label>
                                    <a href="auth-forgot-password-basic.html"> <small>رمز عبور را فراموش کردید؟</small> </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control text-start" wire:model="password" placeholder="****" dir="ltr">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" wire:model="remember-me">
                                    <label class="form-check-label" for="remember-me"> به خاطر سپاری </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <span class="btn btn-primary d-grid w-100"  wire:click="checkLogin()">ورود</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</div>