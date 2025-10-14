@section('page-title')
    {{ __('Edit Sub Category') }}
@endsection()
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form wire:submit.prevent="save">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fill in the details</h4>
                                    <x-alerts.response-alerts />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Category Name</label>
                                                <select wire:model="category_id" id="" class="form-control">
                                                    <option value="" selected>--Select Category--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sub Category Name</label>
                                                <input type="text" class="form-control" wire:model="name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" wire:model="status">
                                                    <option value="" selected>--Select Status--</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Description</label>

                                            <textarea class="form-control" id="" wire:model="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="save">Save</span>
                                        <span wire:loading wire:target="save">Saving...</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
