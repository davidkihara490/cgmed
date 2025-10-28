@section('page-title')
    {{ __('Partners') }}
@endsection()

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="float-end btn btn-success btn-sm disabled" 
   href="{{ route('partners.create') }}" 
   style="pointer-events: none; opacity: 0.6;">New</a>
            </div>
            <div class="card-body">
                <x-alerts.response-alerts />
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>City</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $partner->company_name }} </td>
                                <td>{{ $partner->city }} </td>
                                <td>{{ $partner->name }} </td>
                                <td>{{ $partner->email }} </td>
                                <td>{{ $partner->phone }} </td>
                                <td>{{ $partner->user_type }} </td>
                                <td class="text-end">
                                    {{-- <a href="{{ route('partners.edit', $partner->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a> --}}
                                    {{-- <a href="{{ route('partners.view', $partner->id) }}"
                                        class="btn btn-success btn-sm">View</a> --}}
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="confirm({{ $partner->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @if ($showDeleteModal)
                            <div wire:ignore.self class="modal fade show d-block" tabindex="-1" role="dialog"
                                style="background-color: rgba(0,0,0,0.5);">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Partner</h5>
                                            <button type="button" class="btn-close"
                                                wire:click="$set('showDeleteModal', false)"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this partner? This operation is not
                                                reversible.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                wire:click="$set('showDeleteModal', false)">Cancel</button>
                                            <button type="button" class="btn btn-danger"
                                                wire:click="delete">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
