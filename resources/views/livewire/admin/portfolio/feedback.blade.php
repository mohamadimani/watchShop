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
        <h5 class="card-title col-ms-12 mt-4">
            <span class=" col-md-8"><span>{{ __('portfolio.feedback_list_of_project') }}</span> :
                <span class="text-info">{{ $portfolio->{'title_' . lang()} }}</span>
            </span>
            <a href="{{ route('admin.portfolio') }}" class="btn btn-info btn-sm float-end">{{ __('portfolio.back') }}</a>
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover  text-center">
                <thead>
                    <tr>
                        <th>{{ __('portfolio.row_number') }}</th>
                        <th>{{ __('portfolio.project_name') }}</th>
                        <th>{{ __('portfolio.customer_name') }}</th>
                        <th>{{ __('portfolio.feedback') }}</th>
                        <th>{{ __('portfolio.status') }}</th>
                        <th>{{ __('portfolio.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($feedbacks as $key => $feedback)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td> {{ $feedback->portfolio->title_en }} </td>
                            <td> {{ $feedback->customer_name }} </td>
                            <td> {{ $feedback->feedback }} </td>
                            <td>
                                @if ($feedback->is_active)
                                    <a class="btn text-white btn-sm btn-success" wire:click='updateStatus({{ $feedback->id }},0)'>{{ __('menu.status_active') }}</a>
                                @else
                                    <a class="btn text-white btn-sm btn-danger" wire:click='updateStatus({{ $feedback->id }},1)'>{{ __('menu.status_inactive') }}</a>
                                @endif
                            </td>
                            <td>
                                <div class=" ">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" wire:click='deleteConfirm({{ $feedback->id }})'><i class="bx bx-trash me-1"></i> {{ __('menu.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($feedbacks) === 0)
                <div class="text-center py-5">
                    {{ __('contact.no_contact') }}
                </div>
            @endif
        </div>
    </div>
</div>
