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
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('skill.new_skill') }}</span></h5>
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title_en" class="mb-3 col-md-2 font-13">{{ __('skill.title_en') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title_en" id="title_en" class="form-control" placeholder="{{ __('skill.title_en') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description_en" class="mb-3 col-md-2 font-13">{{ __('skill.description_en') }}: </label>
                    <div class="col-md-10">
                        <textarea wire:model="description_en" id="description_en" class="form-control" placeholder="255 کاراکتر"></textarea>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title_fa" class="mb-3 col-md-2 font-13">{{ __('skill.title_fa') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title_fa" id="title_fa" class="form-control" placeholder="{{ __('skill.title_fa') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description_fa" class="mb-3 col-md-2 font-13">{{ __('skill.description_fa') }}:</label>
                    <div class="col-md-10">
                        <textarea wire:model="description_fa" id="description_fa" class="form-control" placeholder="255 کاراکتر"></textarea>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="percentage" class="mb-3 col-md-2 font-13">{{ __('skill.percentage') }}<span class="text-danger">*</span> :(<span class="text-danger">0 - 100</span>)</label>
                    <div class="col-md-10">
                        <input type="number" wire:model="percentage" id="percentage" class="form-control" placeholder="{{ __('skill.percentage_placeholder') }}" min="0" max="100">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="icon" class="mb-3 col-md-2 font-13">{{ __('skill.icon') }} <span class="text-danger">*</span>:</label>
                    <div class="col-md-10" wire:ignore>
                        <select wire:model="icon" id="icon" class="form-control select2" onchange='setIconId()'>
                            <option value="">{{ __('skill.select_item') }}</option>
                            @foreach ($icons as $icon)
                                <option value="{{ $icon }}">{{ $icon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    @if ($editRowId)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <span wire:click='skillَUpdate()' class="btn btn-info w-100 ">{{ __('skill.edit') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span wire:click='skillَUpdateCancel()' class="btn btn-danger w-100 ">{{ __('skill.cancel') }}</span>
                            </div>
                        </div>
                    @else
                        <span wire:click='skillStore()' class="btn btn-success w-100 ">{{ __('skill.save') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('skill.skill_list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{ __('skill.row_number') }}</th>
                        <th>{{ __('skill.title_en') }}</th>
                        <th>{{ __('skill.title_fa') }}</th>
                        <th>{{ __('skill.description_en') }}</th>
                        <th>{{ __('skill.description_fa') }}</th>
                        <th>{{ __('skill.percentage') }}</th>
                        <th>{{ __('skill.icon') }}</th>
                        <th>{{ __('skill.status') }}</th>
                        <th>{{ __('skill.created_at') }}</th>
                        <th>{{ __('skill.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($skills as $key => $skill)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td> {{ $skill->title_en }} </td>
                            <td> {{ $skill->title_fa }} </td>
                            <td> {{ $skill->description_en }} </td>
                            <td> {{ $skill->description_fa }} </td>
                            <td> {{ $skill->percentage }} </td>
                            <td> <img src="{{ asset('devicon/icons/' . $skill->icon . '/' . $skill->icon . '-original.svg') }}" style="width:40px;"> </td>
                            <td>
                                @if ($skill->is_active)
                                    <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $skill->id }},0)'>{{ __('skill.status_active') }}</a>
                                @else
                                    <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $skill->id }},1)'>{{ __('skill.status_inactive') }}</a>
                                @endif
                            </td>
                            <td> {{ $skill->created_at }} </td>
                            <td>
                                <div class=" ">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSkillModal" wire:click='editSkill({{ $skill->id }})'>
                                            <i class="bx bx-edit-alt me-1"></i> {{ __('skill.edit') }}
                                        </a>
                                        <a class="dropdown-item" wire:click='deleteConfirm({{ $skill->id }})'><i class="bx bx-trash me-1"></i> {{ __('skill.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($skills) === 0)
                <div class="text-center py-5">
                    {{ __('skill.no_skill') }}
                </div>
            @endif
        </div>
    </div>


    <script>
        function setIconId() {
            const value = $('select#icon').val();
            @this.setIconId(value)
        }
        setIconId()
    </script>
</div>
