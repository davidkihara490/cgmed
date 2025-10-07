<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg rounded overflow-hidden">
            <div class="p-5">
                <h1 class="mb-2 text-center">Welcome</h1>
                <form wire:submit.prevent="submit">
                    <div class="form-group mb-3">
                        <label class="form-label" for="emailaddress">Email address</label>
                        <input class="form-control" type="email" id="emailaddress" required=""
                            placeholder="Enter your email" wire:model="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" required="" id="password"
                            placeholder="Enter your password" wire:model="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary w-100" type="submit"> Log In </button>
                    </div>
                </form>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-muted mb-2">
                            <a class="text-muted font-weight-medium ms-1" href="pages-recoverpw.html">Forgot your
                                password?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
