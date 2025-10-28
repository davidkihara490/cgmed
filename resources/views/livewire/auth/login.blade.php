<div>
    @include('master.header')

    <!-- Login Section -->
    <section class="account-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-header">
                            <h2>Welcome Back</h2>
                            <p>Login to access your account</p>
                        </div>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Error Message -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form wire:submit.prevent="login">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" wire:model="email" placeholder="Enter your email address"
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" wire:model="password" placeholder="Enter your password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember"
                                            wire:model="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('password.request') }}" class="forgot-password">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                    <span wire:loading.remove>
                                        <i class="fas fa-sign-in-alt me-2"></i>Login
                                    </span>
                                    <span wire:loading>
                                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        Logging in...
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="login-link text-center">
                            Don't have an account? <a href="{{ route('create-account') }}">Create one here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('master.footer')
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            // Auto-focus on email field
            const emailField = document.getElementById('email');
            if (emailField) {
                setTimeout(() => {
                    emailField.focus();
                }, 300);
            }

            // Enter key submission
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    @this.login();
                }
            });
        });
    </script>
@endpush
