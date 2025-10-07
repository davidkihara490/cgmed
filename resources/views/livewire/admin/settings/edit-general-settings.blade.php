<div>
    @section('page-title')
        {{ __('Profile') }}
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
                                        <x-alerts.response-alerts />
                                        <h4 class="header-title">Fill in the profile details</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Name</label>
                                                    <input class="form-control" type="text"
                                                        wire:model="company_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Logo</label>
                                                    <input class="form-control" type="file" wire:model="logo">
                                                    @error('logo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    {{-- ✅ Show existing logo from DB --}}
                                                    @if ($existing_logo)
                                                        <div class="mt-2">
                                                            <p class="text-muted mb-1">Current Logo:</p>
                                                            <img src="{{ asset('storage/' . $existing_logo) }}"
                                                                alt="Current Logo" class="img-thumbnail shadow-sm"
                                                                style="max-height: 120px;">
                                                        </div>
                                                    @endif

                                                    {{-- ✅ Show new logo preview if uploading --}}
                                                    @if ($logo && !is_string($logo))
                                                        <div class="mt-2">
                                                            <p class="text-muted mb-1">New Upload Preview:</p>
                                                            <img src="{{ $logo->temporaryUrl() }}"
                                                                alt="New Logo Preview"
                                                                class="img-thumbnail border border-success shadow-sm"
                                                                style="max-height: 120px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Hero Image</label>
                                                    <input class="form-control" type="file" wire:model="hero_image">
                                                    @error('hero_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    {{-- ✅ Show existing hero image --}}
                                                    @if ($existing_hero_image)
                                                        <div class="mt-2">
                                                            <p class="text-muted mb-1">Current Hero Image:</p>
                                                            <img src="{{ asset('storage/' . $existing_hero_image) }}"
                                                                alt="Current Hero Image" class="img-thumbnail shadow-sm"
                                                                style="max-height: 200px; object-fit: cover;">
                                                        </div>
                                                    @endif

                                                    {{-- ✅ Show new upload preview --}}
                                                    @if ($hero_image && !is_string($hero_image))
                                                        <div class="mt-2">
                                                            <p class="text-muted mb-1">New Upload Preview:</p>
                                                            <img src="{{ $hero_image->temporaryUrl() }}"
                                                                alt="New Hero Preview"
                                                                class="img-thumbnail border border-success shadow-sm"
                                                                style="max-height: 200px; object-fit: cover;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Hero Title</label>
                                                    <input class="form-control" type="text" wire:model="hero_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Hero Sub Title</label>
                                                    <textarea class="form-control" wire:model="hero_sub_title"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">About</label>
                                                    <textarea class="form-control" wire:model="about"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input class="form-control" type="text" wire:model="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control" type="email" wire:model="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input class="form-control" type="text" wire:model="address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Facebook</label>
                                                    <input class="form-control" type="url" wire:model="facebook">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Twitter</label>
                                                    <input class="form-control" type="url" wire:model="twitter">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Instagram</label>
                                                    <input class="form-control" type="url"
                                                        wire:model="instagram">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">LinkedIn</label>
                                                    <input class="form-control" type="url" wire:model="linkedin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">YouTube</label>
                                                    <input class="form-control" type="url" wire:model="youtube">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Pinterest</label>
                                                    <input class="form-control" type="url"
                                                        wire:model="pinterest">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">TikTok</label>
                                                    <input class="form-control" type="url" wire:model="tiktok">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Copyright</label>
                                                    <input class="form-control" type="text"
                                                        wire:model="copyright">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
