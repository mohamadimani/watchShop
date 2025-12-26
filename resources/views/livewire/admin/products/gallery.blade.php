<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <style>
                .user-profile-image {
                    width: 80px;
                    height: 80px;
                }
            </style>
            <tr>
                <th>ردیف</th>
                <th>تصویر </th>
                <th>عنوان</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($product->galleries as $key => $gallery)
                <tr>
                    <td>{{ 1 + $key }}</td>
                    <td>
                        <a href="{{ GetImage('products/gallery/' . $gallery->image) }}" target="_blank">
                            <img class="user-profile-image" src="{{ GetImage('products/gallery/' . $gallery->image) }}"></a>
                    </td>
                    <td>{{ $gallery->title }}</td>
                    <td>
                        @if ($gallery->position)
                            <a class="btn text-white btn-sm btn-success">شاخص</a>
                        @else
                            <a class="btn text-white btn-sm btn-danger" wire:click='updatePosition({{ $gallery->id }},1)'>غیرشاخص</a>
                        @endif
                    </td>
                    <td>
                        @if ($gallery->is_active)
                            <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $gallery->id }},0)'>فعال</a>
                        @else
                            <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $gallery->id }},1)'>غیرفعال</a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm text-white btn-danger" wire:click='deleteGallery({{ $gallery->id }})'>حذف</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
