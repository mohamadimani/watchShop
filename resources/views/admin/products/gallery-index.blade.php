@extends('admin.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y col-md-8">
        <div class="card p-1">
            @if (Session::has('success'))
                <div class="alert alert-success  mb-5 text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger  mb-5 text-center">
                    {{ Session::get('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li class="font-13">* {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header border-bottom p-1">
                <h5 class="card-title col-md-12">
                    <span class=" col-md-8"> <span>تصاویر محصول : </span> <span class="text-info">{{ $product->title }}</span></span>

                    <a href="{{ route('admin.products.index') }}" class="btn btn-info col-md-3 btn-sm float-end"> <i class="fa fa-backward me-2"></i> بازگشت </a>
                </h5>
                <form class="col-md-12" action="{{ route('admin.products.galleryStore', [$product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row font-14">
                        <div class="col-md-12 mb-3">
                            <label for="">عنوان {{ requireSign() }}</label>
                            <input type="text" name="title" class="form-control" placeholder="عنوان">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">تصویر </label> {{ requireSign() }}<strong> (حداقل: 200 * 200) (حداکثر: 600 * 600) </strong>
                            <input type="file" name="image" class="form-control" placeholder="عکس">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-info w-100 ">بارگزاری </button>
                        </div>
                    </div>
                </form>
            </div>


            <livewire:Admin.Products.Gallery :product="$product" />

        </div>
    </div>

@endsection
