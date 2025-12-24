@extends('layouts.master')
@section('main')
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <h3 class="down-line mb-5 font-large">ارسال درخواست</h3>
                    <div class="form-simple mb-5">
                        @include('admin.layouts.alerts')
                        <form id="contact-form" action="{{ route('contact-us.index')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>نام و نام خانوادگی:</label>
                                        <input type="text" class="form-control bg-gray" name="name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label> موبایل:</label>
                                        <input type="text" class="form-control bg-gray" name="mobile" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>متن درخواست:</label>
                                        <textarea class="form-control bg-gray" name="message" rows="8" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" name="submit" type="submit">ارسال پیام</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <h3 class="down-line mb-5 font-large">راه های ارتباطی با ما</h3>
                    <p></p>
                    <div class="d-flex mb-3">
                        <ul>
                            <li class="mb-3">
                                <strong>آدرس شعبه 1 :</strong><br>تاکستان - سمت راست
                            </li>
                            <li class="mb-3">
                                <strong>آدرس شعبه 2 :</strong><br>تهران - سمت راست
                            </li>
                            <li class="mb-3">
                                <strong>شماره های تماس :</strong><br>021658000 - 81023737
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
