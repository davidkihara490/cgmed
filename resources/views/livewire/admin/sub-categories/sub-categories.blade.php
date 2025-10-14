@section('page-title')
    {{ __('Sub Categories') }}
@endsection()

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="float-end btn btn-success btn-sm" href="{{ route('sub-categories.create') }}">New</a>
            </div>
            <div class="card-body">
                <x-alerts.response-alerts />
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $subCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subCategory->name }} </td>
                                <td>{{ $subCategory->category->name }} </td>
                                <td>
                                    @if ($subCategory->status)
                                        <span class="badge bg-success">active</span>
                                    @else
                                        <span class="badge bg-danger">disabled</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('sub-categories.edit', $subCategory->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    {{-- <a href="{{ route('sub-categories.view', $subCategory->id) }}"
                                        class="btn btn-success btn-sm">View</a> --}}
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="confirm({{ $subCategory->id }})">
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
                                            <h5 class="modal-title">Delete Sub Category</h5>
                                            <button type="button" class="btn-close"
                                                wire:click="$set('showDeleteModal', false)"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this sub category? This operation is not
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
