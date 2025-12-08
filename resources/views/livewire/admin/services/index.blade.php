<div class="container-fluid menu-lang-style flex-grow-1 container-p-y">
    @if (lang() == 'en')
        <style>
            .menu-lang-style,
            .menu-lang-style * {
                direction: ltr !important;
                text-align: left !important;
            }
        </style>
    @endif
    <div class="card p-3">
        @include('admin.layouts.alerts')
        <div class="card-header border-bottom">
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('service.new_service') }}</span></h5>
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title" class="mb-3 col-md-2 font-13">عنوان :</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title" id="title" class="form-control" placeholder="عنوان">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description" class="mb-3 col-md-2 font-13">توضیحات :</label>
                    <div class="col-md-10">
                        <textarea wire:model="description" id="description" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3">
                    @if ($editRowId)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <span wire:click='updateService()' class="btn btn-info w-100 ">{{ __('service.edit') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span wire:click='updateServiceCancel()' class="btn btn-danger w-100 ">{{ __('service.cancel') }}</span>
                            </div>
                        </div>
                    @else
                        <span wire:click='storeService()' class="btn btn-success w-100 ">{{ __('service.save') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('service.service_list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{ __('service.row_number') }}</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>{{ __('service.status') }}</th>
                        <th>{{ __('service.created_at') }}</th>
                        <th>{{ __('service.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td> {{ $service->title }} </td>
                            <td> {{ $service->description }} </td>
                            <td>
                                @if ($service->is_active)
                                    <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $service->id }},0)'>{{ __('skill.status_active') }}</a>
                                @else
                                    <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $service->id }},1)'>{{ __('skill.status_inactive') }}</a>
                                @endif
                            </td>
                            <td> {{ $service->created_at }} </td>
                            <td>
                                <div class=" ">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" wire:click='editService({{ $service->id }})'>
                                            <i class="bx bx-edit-alt me-1"></i> {{ __('skill.edit') }}
                                        </a>
                                        <a class="dropdown-item" wire:click='deleteConfirm({{ $service->id }})'><i class="bx bx-trash me-1"></i> {{ __('skill.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($services) === 0)
                <div class="text-center py-5">
                    {{ __('service.no_service') }}
                </div>
            @endif
        </div>
    </div>
</div>
