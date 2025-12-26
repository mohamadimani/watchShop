<div class="card p-2">
    <div class="card-header border-bottom">
        <h5 class="card-title">فیلتر جستجو محصولات</h5>

        <div class="row">
            <div class="col-md-2">
                <input type="text" wire:model.live="search" class="form-control" placeholder="جستجوی نام ... ">
            </div>
            <div class="col-md-8"></div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-info col-md-2 btn-sm">ایجاد محصول</a>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success  mb-5">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-success  mb-5">
            {{ Session::get('error') }}
        </div>
    @endif
    <style>
        .user-profile-image {
            width: 80px;
            height: 80px;
        }
    </style>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <caption class="ms-4">{{ $products->links() }}</caption>
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>دسته بندی</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>وضعیت</th>
                    {{-- <th>گارانتی</th> --}}
                    {{-- <th>برند</th> --}}
                    {{-- <th>رنگ</th> --}}
                    <th>اقتصادی</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $key }}</td>
                        <td>
                            <a href="{{ GetImage('products/gallery/' . ($product?->galleries()->where('position' , 1)->first()?->image ?? 1)) }}" target="_blank">
                                <img class="user-profile-image" src="{{ GetImage('products/gallery/' . ($product?->galleries()->where('position' , 1)->first()?->image ?? 1)) }}">
                            </a>
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category?->title }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ $product->count }}</td>
                        <td>
                            @if ($product->is_active)
                                <span class="btn btn-success btn-sm" wire:click='changeIsActive({{ $product->id }},0)'>فعال</span>
                            @else
                                <span class="btn btn-danger btn-sm"wire:click='changeIsActive({{ $product->id }},1)'>غیر فعال</span>
                            @endif
                        </td>
                        {{-- <td>{{ $product->guaranty }}</td> --}}
                        {{-- <td>{{ $product->brand?->title }}</td> --}}
                        {{-- <td> {{ implode(', ', $product->colors->pluck('name')->toArray()) }} </td> --}}
                        <td>
                            @if ($product->is_economy)
                                <span class="text-success btn-sm"><b>بله</b></span>
                            @else
                                <span class="text-danger btn-sm"><b>خیر</b></span>
                            @endif
                        </td>
                        <td> {{ \Verta::instance($product->created_at)->format('%B %d %Y') }} </td>
                        <td>
                            <div class="demo-inline-spacing">
                                <div class="btn-group">
                                    <button type="button" class="btn  btn-icon rounded-pill dropdown-toggle hide-arrow  " data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('admin.products.edit', [$product->id]) }}"><i class="fa fa-edit"></i> &nbsp;<span>ویرایش</span></a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.products.galleryIndex', [$product->id]) }}"><i class="fa fa-image"></i> &nbsp;<span>تصاویر</span></a></a>
                                        </li>
                                        {{-- <li><a class="dropdown-item" href="{{ route('admin.products.properties', [$product->id]) }}"><i class="fa fa-toolbox"></i> &nbsp;<span>ویژگی</span></a></a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
