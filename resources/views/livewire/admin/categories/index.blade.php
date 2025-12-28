<div class="card p-3">
    <div class="card-header border-bottom">
        <h5 class="card-title">جستجوی دسته بندی</h5>
        <div class="row">
            <div class="col-md-4">
                <input type="text" wire:model.live="search" class="form-control" placeholder="جستجوی دسته بندی  ... ">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2 ">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
            </div>
        </div>
    </div>
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
    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <caption class="ms-4">{{ $categories->appends(Request::except('page'))->links() }}</caption>
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                    <th>تاریخ ایجاد</th>
                </tr>
            </thead>
            <tbody class=" ">
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>
                            @if ($editCategoryId == $category->id)
                                <input type="text" wire:model='title' class="form-control sm">
                                @error('title')
                                    <span class="text-danger font-11">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $category->title }}
                            @endif
                        </td>
                        <td>
                            @if ($category->is_active)
                                <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $category->id }},0)'>فعال</a>
                            @else
                                <a class="btn text-white btn-sm btn-warning" wire:click='updateStatus({{ $category->id }},1)'>غیرفعال</a>
                            @endif
                        </td>
                        <td>
                            @if ($editCategoryId == $category->id)
                                <a class="btn text-white btn-sm btn-success" wire:click='updateCategory'>ثبت</a>
                            @else
                                <a class="btn text-white btn-sm btn-info" wire:click='$set("editCategoryId" , {{ $category->id }})'>ویرایش</a>
                            @endif
                            <a class="btn btn-sm text-white btn-danger" wire:click='deleteCategory({{ $category->id }})'>حذف</a>
                        </td>
                        <td> {{ \Verta::instance($category->created_at)->format('%B %d %Y') }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
