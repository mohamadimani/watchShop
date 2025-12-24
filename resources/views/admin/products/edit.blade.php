@extends('admin.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y col-md-8">
        <div class="card">
            <div class="p-5">
                <div class="text-center mb-4 mt-0 mt-md-n2">
                    <h3 class="secondary-font"> ثبت محصول</h3>
                    <div class="row mb-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-info col-md-12 btn-sm">لیست محصولات</a>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mb-5">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success  mb-5">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.products.update', [$product->id]) }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-3 " for="title"><span>نام محصول</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ old('title') ?? $product->title }}" name="title" id="title" placeholder="نام محصول ...">
                        </div>
                    </div>
                    <div class="row form-password-toggle mb-3">
                        <label class="col-sm-3 " for="category_id"><span>دسته بندی </span>{{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <select id="category_id" name="category_id" class="form-control select2">
                                <option value=" ">انتخاب کنید</option>
                                @foreach ($categories as $category)
                                    <option @if ((old('category_id') ?? $product->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 " for="description"><span>توضیحات</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="" rows="" class="form-control" placeholder="توضیحات">{{ old('description') ?? $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 " for="price"><span>قیمت</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <input type="number" id="price" value="{{ old('price') ?? $product->price }}" name="price" class="form-control    " placeholder="قیمت">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 " for="count"><span>تعداد</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <input type="number" id="count" value="{{ old('count') ?? $product->count }}" name="count" class="form-control    " placeholder="تعداد">
                        </div>
                    </div>
                    <div class="row form-password-toggle mb-3">
                        <label class="col-sm-3 " for="guaranty">گارانتی {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $product->guaranty ?? old('guaranty') }}" name="guaranty" id="guaranty" placeholder="گارانتی">
                        </div>
                    </div>
                    <div class="row form-password-toggle mb-3">
                        <label class="col-sm-3 " for="brand_id"> <span>برند</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <select id="brand_id" name="brand_id" class="form-control">
                                <option value=" ">انتخاب کنید</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if ($brand->id == (old('brand_id') ?? $product->brand_id)) selected @endif>{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-password-toggle mb-3">
                        <label class="col-sm-3 " for="colors"><span>رنگ</span> {{ requireSign() }}</label>
                        <div class="col-sm-8">
                            <select id="colors" name="colors[]" class="form-control select2" multiple="multiple">
                                @foreach ($colors as $color)
                                    <option @if (in_array($color->id, $product->colors()->pluck('id')->toArray()) or old('colors') == $color->id) selected @endif value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-password-toggle mb-3">
                        <label class="col-sm-3 " for="is_economy"><span>محصول اقتصادی</span></label>
                        <div class="col-sm-8">
                            <select id="is_economy" name="is_economy" class="form-control">
                                <option @if (old('is_economy', $product->is_economy) == 'no') selected @endif value="no">خیر</option>
                                <option @if (old('is_economy', $product->is_economy) == 'yes') selected @endif value="yes">بله</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary col-md-2 me-2 text-white">ثبت</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
