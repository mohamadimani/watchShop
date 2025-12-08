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
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('menu.new_menu') }}</span></h5>
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title" class="mb-3 col-md-2 font-13">{{ __('menu.title') }}<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title" id="title" class="form-control" placeholder="{{ __('menu.title') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="link" class="mb-3 col-md-2 font-13">{{ __('menu.link') }}<span class="text-danger">*</span></label>
                    <input type="text" wire:model="link" id="link" class="form-control" placeholder="{{ __('menu.link') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <span wire:click='menuStore()' class="btn btn-success w-100 ">{{ __('menu.save') }}</span>
                </div>
            </div>
        </div>
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('menu.menu_list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{ __('menu.row') }}</th>
                        <th>{{ __('menu.title') }}</th>
                        <th>{{ __('menu.link') }}</th>
                        <th>{{ __('menu.status') }}</th>
                        <th>{{ __('menu.created_at') }}</th>
                        <th>{{ __('menu.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($menus as $key => $menu)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        @if ($editRowId and $menu->id == $editRowId)
                        <td> <input type="text" wire:model='title_edit'> </td>
                        <td> <input type="text" wire:model='link_edit'>
                            <a wire:click='updateMenu' class="btn text-white btn-sm btn-success">{{ __('menu.save') }}</a>
                        </td>
                        @else
                        <td> {{ $menu->title }} </td>
                        <td> {{ $menu->link }} </td>
                        @endif
                        <td>
                            @if ($menu->is_active)
                            <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $menu->id }},0)'>{{ __('menu.status_active') }}</a>
                            @else
                            <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $menu->id }},1)'>{{ __('menu.status_inactive') }}</a>
                            @endif
                        </td>
                        <td> {{ $menu->created_at }} </td>
                        <td>
                            <div class=" ">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" wire:click='editMenu({{ $menu->id }})'><i class="bx bx-edit-alt me-1"></i> {{ __('menu.edit') }}</a>
                                    <a class="dropdown-item" wire:click='deleteConfirm({{ $menu->id }})'><i class="bx bx-trash me-1"></i> {{ __('menu.delete') }}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($menus) === 0)
            <div class="text-center py-5">
                {{ __('menu.no_menu') }}
            </div>
            @endif
        </div>
    </div>
</div>