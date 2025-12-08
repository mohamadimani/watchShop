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
    <style>
        .font-12 {
            font-size: 12px !important;
        }
    </style>
    <div class="card p-3">
        <div class="card-header border-bottom">
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('social.new_social') }}</span></h5>
            @include('admin.layouts.alerts')
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title" class="mb-3 col-md-2 font-13">{{ __('social.title') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title" id="title" class="form-control" placeholder="{{ __('social.title') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="link" class="mb-3 col-md-2 font-13">{{ __('social.link') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="link" id="link" class="form-control" placeholder="{{ __('social.link') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="icon" class="mb-3 col-md-2 font-13">{{ __('social.icon') }} <span class="text-danger">*</span>:</label>
                    <div class="col-md-10">
                        <select wire:model="icon" id="icon" class="form-control select2" onchange='setIconId()'>
                            <option value="">{{ __('social.select_item') }}</option>
                            @foreach ($icons as $icon)
                                <option value="{{ $icon }}">{{ $icon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <span wire:click='store()' class="btn btn-success w-100 ">{{ __('social.save') }}</span>
                </div>
            </div>
        </div>
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('social.list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('social.row_number') }}</th>
                        <th>{{ __('social.title') }}</th>
                        <th>{{ __('social.link') }}</th>
                        <th>{{ __('social.icon') }}</th>
                        <th>{{ __('social.status') }}</th>
                        <th>{{ __('social.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($socials as $key => $social)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            @if ($editRowId and $editRowId == $social->id)
                                <td>
                                    <input type="text" wire:model="title_edit" id="title" class="form-control" placeholder="{{ __('social.title') }}">
                                    @error('title_edit')
                                        <span class="text-danger font-12">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" wire:model="link_edit" id="link" class="form-control" placeholder="{{ __('social.link') }}">
                                    @error('link_edit')
                                        <span class="text-danger font-12">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <select wire:ignore wire:model="icon_edit" id="iconEdit" class="form-control" onchange='setIconEditId()'>
                                        <option value="">{{ __('social.select_item') }}</option>
                                        @foreach ($icons as $icon)
                                            <option value="{{ $icon }}">{{ $icon }}</option>
                                        @endforeach
                                    </select>
                                    @error('icon_edit')
                                        <span class="text-danger font-12">{{ $message }}</span>
                                    @enderror
                                </td>
                            @else
                                <td>{{ $social->title }}</td>
                                <td>{{ $social->link }}</td>
                                <td><img src="{{ GetImage('social/' . $social->icon . '.png') }}" style="width:40px;"></td>
                            @endif
                            <td>
                                @if ($social->is_active)
                                    <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $social->id }},0)'>{{ __('social.status_active') }}</a>
                                @else
                                    <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $social->id }},1)'>{{ __('social.status_inactive') }}</a>
                                @endif
                            </td>
                            <td>
                                @if ($editRowId and $editRowId == $social->id)
                                    <a class="btn btn-success text-white" wire:click='update({{ $social->id }})'><i class="bx bx-check-circle me-1"></i> {{ __('social.save') }}</a>
                                @else
                                    <div class="">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSocialModal" wire:click='edit({{ $social->id }})'>
                                                <i class="bx bx-edit-alt me-1"></i> {{ __('social.edit') }}
                                            </a>
                                            <a class="dropdown-item" wire:click='deleteConfirm({{ $social->id }})'><i class="bx bx-trash me-1"></i> {{ __('social.delete') }}</a>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($socials) === 0)
                <div class="text-center py-5">
                    {{ __('social.no_social') }}
                </div>
            @endif
        </div>
    </div>


    <script>
        function setIconId() {
            const value = $('select#icon').val();
            @this.setIconId(value)
        }

        function setIconEditId() {
            const value = $('select#iconEdit').val();
            @this.setIconEditId(value)
        }
    </script>
</div>
