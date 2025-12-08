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
        img.hovering-zoom {
            width: 100px;
        }

        img.hovering-zoom:hover {
            transform: scale(1.5);
        }
    </style>
    <div class="card p-3">
        @include('admin.layouts.alerts')
        <div class="card-header border-bottom">
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('portfolio.add_new') }}</span></h5>
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title_en" class="mb-3 col-md-2 font-13">{{ __('portfolio.title_en') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title_en" id="title_en" class="form-control" placeholder="{{ __('portfolio.title_en') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description_en" class="mb-3 col-md-2 font-13">{{ __('portfolio.description_en') }}: </label>
                    <div class="col-md-10">
                        <textarea wire:model="description_en" id="description_en" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title_fa" class="mb-3 col-md-2 font-13">{{ __('portfolio.title_fa') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title_fa" id="title_fa" class="form-control" placeholder="{{ __('portfolio.title_fa') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description_fa" class="mb-3 col-md-2 font-13">{{ __('portfolio.description_fa') }}:</label>
                    <div class="col-md-10">
                        <textarea wire:model="description_fa" id="description_fa" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="link" class="mb-3 col-md-2 font-13">{{ __('portfolio.link') }}:</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="link" id="link" class="form-control" placeholder="{{ __('portfolio.link') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="done_date" class="mb-3 col-md-2 font-13">{{ __('portfolio.done_date') }}:</label>
                    <div class="col-md-10">
                        <input type="text" data-jdp wire:model="done_date" id="done_date" class="form-control" placeholder="{{ __('portfolio.done_date') }}">
                        @include('admin.layouts.jdp')
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="icon" class="mb-3 col-md-2 font-13">{{ __('portfolio.used_skills') }} <span class="text-danger">*</span>:</label>
                    <div class="col-md-10">
                        <div class="" wire:ignore>
                            <select name="skills" id="used_skills" class="form-control select2" multiple onchange="setUsedSkills()">
                                @foreach ($skillsList as $skill)
                                    <option value="{{ $skill }}">{{ $skill }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($editRowId)
                            @foreach ($skills as $usedSkill)
                                <span class="badge bg-label-info me-2 " style="line-height: 25px">{{ $usedSkill }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="done_date" class="mb-3 col-md-2 font-13">{{ __('portfolio.image') }}:</label>
                    <div class="col-md-10">
                        <input type="file" wire:model="image" id="done_date" class="form-control" placeholder="{{ __('portfolio.image') }}">
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3">
                    @if ($editRowId)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <span wire:click='update()' class="btn btn-info w-100 ">{{ __('portfolio.edit') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span wire:click='editCancel()' class="btn btn-danger w-100 ">{{ __('portfolio.cancel') }}</span>
                            </div>
                        </div>
                    @else
                        <span wire:click='store()' class="btn btn-success w-100 ">{{ __('portfolio.save') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('portfolio.portfolio_list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{ __('portfolio.row_number') }}</th>
                        <th>{{ __('portfolio.image') }}</th>
                        <th>{{ __('portfolio.title_en') }}</th>
                        <th>{{ __('portfolio.title_fa') }}</th>
                        <th>{{ __('portfolio.description_en') }}</th>
                        <th>{{ __('portfolio.description_fa') }}</th>
                        <th>{{ __('portfolio.link') }}</th>
                        <th>{{ __('portfolio.done_date') }}</th>
                        <th>{{ __('portfolio.used_skills') }}</th>
                        <th>{{ __('portfolio.status') }}</th>
                        {{-- <th>{{ __('portfolio.created_at') }}</th> --}}
                        <th>{{ __('portfolio.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($portfolio as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="p-1"><img src="{{ getImage('portfolio/' . $item->id . '/' . $item->image) }}" alt="" class="w hovering-zoom"></td>
                            <td> {{ $item->title_en }} </td>
                            <td> {{ $item->title_fa }} </td>
                            <td> {{ $item->description_en }} </td>
                            <td> {{ $item->description_fa }} </td>
                            <td> {{ $item->link }} </td>
                            <td> {{ $item->done_date }} </td>
                            <td> {{ $item->skills }} </td>
                            <td>
                                @if ($item->is_active)
                                    <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $item->id }},0)'>{{ __('portfolio.status_active') }}</a>
                                @else
                                    <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $item->id }},1)'>{{ __('portfolio.status_inactive') }}</a>
                                @endif
                            </td>
                            {{-- <td> {{ $item->created_at }} </td> --}}
                            <td>
                                <div class="">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#customerFeedbackModal_{{ $item->id }}"><i class="bx bx-message me-1"></i>
                                            {{ __('portfolio.add_customer_feedback') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.portfolio.feedback',[$item->id]) }}"><i class="bx bxs-chat me-1"></i>{{ __('sidebar.portfolio_feedback') }}</a>
                                        <a class="dropdown-item" wire:click='edit({{ $item->id }})'><i class="bx bx-edit-alt me-1"></i>{{ __('skill.edit') }}</a>
                                        <a class="dropdown-item" wire:click='deleteConfirm({{ $item->id }})'><i class="bx bx-trash me-1"></i> {{ __('skill.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal " id="customerFeedbackModal_{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> {{ __('portfolio.add_customer_feedback') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="customer_name_{{ $item->id }}" class="form-label">{{ __('portfolio.customer_name') }}</label>
                                            <input type="text" class="form-control" id="customer_name_{{ $item->id }}" wire:model="customer_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="feedback_{{ $item->id }}" class="form-label">{{ __('portfolio.feedback') }}</label>
                                            <textarea class="form-control" id="feedback_{{ $item->id }}" wire:model="feedback" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('portfolio.cancel') }}</button>
                                        <button aria-label="Close" data-bs-dismiss="modal" wire:click="saveFeedback({{ $item->id }})"
                                            class="btn btn-primary">{{ __('portfolio.save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            @if (count($portfolio) === 0)
                <div class="text-center py-5">
                    {{ __('portfolio.not_found') }}
                </div>
            @endif
        </div>
    </div>
    <script>
        function setUsedSkills() {
            const value = $('select#used_skills').val();
            @this.setUsedSkills(value)
        }
        setUsedSkills()
    </script>
</div>
