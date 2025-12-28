@extends('admin.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div class="p-5">
                <div class=" mb-4 mt-0 mt-md-n2">
                    <h3 class="secondary-font text-right"><span>ایجاد دسته بندی</span>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-info col-md-2 btn-sm float-end" >لیست دسته بندی ها</a>
                    </h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mb-5 text-center">
                        <ul class="list-unstyled p-0 m-0">
                            @foreach ($errors->all() as $error)
                                <li class="font-16 fw-bold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-success text-center  mb-5 font-18 fw-bold">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 " for="basic-icon-default-full-title"><span>عنوان دسته</span> {{ requireSign() }}</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="title" id="basic-icon-default-full-title" placeholder="نام ...">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary me-sm-3 me-1 text-white">ثبت</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            پاک کردن
                        </button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
@endsection
