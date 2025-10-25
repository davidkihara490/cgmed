<div>
    <div>
        @include('master.header')

        <!-- Login Section -->
        <section class="login-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="login-card">
                            <div class="login-header">
                                <h2>Welcome Back</h2>
                                <p>Sign in to your CGSMed account to continue</p>
                            </div>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
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
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" wire:model="email" placeholder="Enter your email address"
                                        required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" wire:model="password" placeholder="Enter your password" required>
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
                                        <a href="#" class="forgot-password-link">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>

                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Sign In</span>
                                        <span wire:loading>
                                            <span class="spinner-border spinner-border-sm" role="status"></span>
                                            Signing In...
                                        </span>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="mb-0">
                                        Don't have an account?
                                        <a href="{{ route('create-account') }}" class="register-link">Create one here</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5>CGSMed</h5>
                        <p>Providing excellence in medical equipment and supplies to healthcare professionals worldwide.
                        </p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5>Products</h5>
                        <ul>
                            <li><a href="#">Medical Equipment</a></li>
                            <li><a href="#">Dental Supplies</a></li>
                            <li><a href="#">Surgical Instruments</a></li>
                            <li><a href="#">Aesthetic Products</a></li>
                            <li><a href="#">Diagnostic Tools</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5>Contact Us</h5>
                        <ul>
                            <li><i class="fas fa-map-marker-alt me-2"></i> 123 Medical Ave, Health City</li>
                            <li><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</li>
                            <li><i class="fas fa-envelope me-2"></i> info@cgsmed.com</li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    &copy; 2023 CGSMed. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    @push('styles')
        <style>
            .login-section {
                padding: 80px 0;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
            }

            .login-card {
                background: white;
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .login-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .login-header h2 {
                color: #2c3e50;
                font-weight: 700;
                margin-bottom: 10px;
            }

            .login-header p {
                color: #7f8c8d;
                font-size: 1.1rem;
            }

            .form-label {
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 8px;
            }

            .form-control {
                border: 2px solid #ecf0f1;
                border-radius: 12px;
                padding: 12px 16px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: #3498db;
                box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
            }

            .form-check-input:checked {
                background-color: #3498db;
                border-color: #3498db;
            }

            .forgot-password-link {
                color: #3498db;
                text-decoration: none;
                font-weight: 500;
            }

            .forgot-password-link:hover {
                color: #2980b9;
                text-decoration: underline;
            }

            .btn-primary {
                background: linear-gradient(135deg, #3498db, #2980b9);
                border: none;
                border-radius: 12px;
                padding: 14px 28px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(52, 152, 219, 0.3);
            }

            .btn-primary:disabled {
                opacity: 0.7;
                transform: none;
            }

            .register-link {
                color: #3498db;
                font-weight: 600;
                text-decoration: none;
            }

            .register-link:hover {
                color: #2980b9;
                text-decoration: underline;
            }

            .login-divider {
                position: relative;
                text-align: center;
                margin: 30px 0;
                color: #7f8c8d;
            }

            .login-divider::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 1px;
                background: #ecf0f1;
            }

            .login-divider span {
                background: white;
                padding: 0 20px;
                position: relative;
            }

            .social-login .btn {
                border-radius: 12px;
                padding: 12px;
                font-weight: 500;
                border: 2px solid #ecf0f1;
            }

            .social-login .btn:hover {
                border-color: #bdc3c7;
                background-color: #f8f9fa;
            }

            .alert {
                border-radius: 12px;
                border: none;
                padding: 16px 20px;
            }

            .alert-success {
                background-color: #d4edda;
                color: #155724;
            }

            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
            }

            .spinner-border-sm {
                width: 1rem;
                height: 1rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                // Auto-focus on email field
                const emailField = document.getElementById('email');
                if (emailField) {
                    emailField.focus();
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
</div>
