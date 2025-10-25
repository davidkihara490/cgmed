@section('page-title')
    {{ __('Edit Product') }}
@endsection
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
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Product Name</label>
                                                <input class="form-control" type="text" wire:model="name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sub Category</label>
                                                <select class="form-control" wire:model="sub_category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}">
                                                            {{ $subCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" wire:model="status">
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
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" wire:model="description"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <label class="form-label">Uploaded image</label>
                                                @if ($product->image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('sto rage/' . $product->image) }}"
                                                            alt="Preview" class="img-thumbnail"
                                                            style="max-height: 200px;">
                                                    </div>
                                                @endif
                                            </div>
                                            <br><br>
                                            <div class="mb-3">
                                                <label class="form-label">Image</label>
                                                <input class="form-control" type="file" wire:model="image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                @if ($image)
                                                    <div class="mt-2">
                                                        <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                                                            class="img-thumbnail" style="max-height: 200px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
