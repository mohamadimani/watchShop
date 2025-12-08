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
        <h5 class="card-title col-ms-12 mt-4"><span class=" col-md-8"><span>{{ __('contact.contact_list') }}</span></span></h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped table-hover  text-center">
                <thead>
                    <tr>
                        <th>{{ __('contact.row') }}</th>
                        <th>{{ __('contact.name') }}</th>
                        <th>{{ __('contact.mobile') }}</th>
                        <th>{{ __('contact.message') }}</th>
                        <th>{{ __('contact.is_read') }}</th>
                        <th>{{ __('contact.read_by') }}</th>
                        <th>{{ __('contact.created_at') }}</th>
                        <th>{{ __('contact.action') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($contacts as $key => $contact)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td> {{ $contact->name }} </td>
                            <td> {{ $contact->mobile }} </td>
                            <td> {{ $contact->message }} </td>
                            <td> {!! $contact->is_read !!} </td>
                            <td> {{ $contact->readBy()?->name ?? ' --- ' }} </td>
                            <td> {{ $contact->created_at }} </td>
                            <td>
                                <div class=" ">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        @if (!$contact->read_by)
                                            <a class="dropdown-item" wire:click='readContact({{ $contact->id }})'><i class="bx bx-show-alt me-1 text-info"></i> {{ __('contact.seen') }}</a>
                                        @endif
                                        <a class="dropdown-item" wire:click='deleteConfirm({{ $contact->id }})'><i class="bx bx-trash me-1 text-danger"></i> {{ __('contact.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($contacts) === 0)
                <div class="text-center py-5">
                    {{ __('contact.no_contact') }}
                </div>
            @endif
            <span class="mt-3 d-block">{{ $contacts->links() }}</span>
        </div>
    </div>
</div>
