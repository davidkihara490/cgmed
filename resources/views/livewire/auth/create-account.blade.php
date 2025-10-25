<div>
    <div>
        @include('master.header')

        <!-- Account Creation Section -->
        <section class="account-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="account-card">
                            <div class="account-header">
                                <h2>Create Your Account</h2>
                                <p>Join CGSMed to access our premium medical products and services</p>
                            </div>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-success">
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

                            <!-- Progress Bar -->
                            <div class="progress-container">
                                <div class="progress-steps">
                                    <div class="progress-bar" id="progressBar"
                                        style="width: {{ (($currentStep - 1) / 3) * 100 }}%"></div>
                                    <div class="step {{ $currentStep >= 1 ? 'active' : '' }} {{ $currentStep > 1 ? 'completed' : '' }}"
                                        wire:click="goToStep(1)">
                                        <div class="step-icon">1</div>
                                        <div class="step-label">Company</div>
                                    </div>
                                    <div class="step {{ $currentStep >= 2 ? 'active' : '' }} {{ $currentStep > 2 ? 'completed' : '' }}"
                                        wire:click="goToStep(2)">
                                        <div class="step-icon">2</div>
                                        <div class="step-label">Personal</div>
                                    </div>
                                    <div class="step {{ $currentStep >= 3 ? 'active' : '' }} {{ $currentStep > 3 ? 'completed' : '' }}"
                                        wire:click="goToStep(3)">
                                        <div class="step-icon">3</div>
                                        <div class="step-label">Account Type</div>
                                    </div>
                                    <div class="step {{ $currentStep >= 4 ? 'active' : '' }}" wire:click="goToStep(4)">
                                        <div class="step-icon">4</div>
                                        <div class="step-label">Review</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Success Message -->
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="submit">
                                <!-- Step 1: Company Details -->
                                <div class="form-step {{ $currentStep == 1 ? 'active' : '' }}" id="step1-form">
                                    <h3 class="section-title">Company Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="companyName" class="form-label">Company Name *</label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="companyName" wire:model="company_name" required>
                                            @error('company_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="companyType" class="form-label">Company Type *</label>
                                            <select class="form-control @error('company_type') is-invalid @enderror"
                                                id="companyType" wire:model="company_type" required>
                                                <option value="">Select Company Type</option>
                                                <option value="hospital">Hospital</option>
                                                <option value="clinic">Clinic</option>
                                                <option value="pharmacy">Pharmacy</option>
                                                <option value="distributor">Distributor</option>
                                                <option value="manufacturer">Manufacturer</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('company_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="companyAddress" class="form-label">Company Address *</label>
                                        <input type="text"
                                            class="form-control @error('company_address') is-invalid @enderror"
                                            id="companyAddress" wire:model="company_address" required>
                                        @error('company_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="country" class="form-label">Country *</label>
                                            <select class="form-control @error('country') is-invalid @enderror"
                                                id="country" wire:model="country" required>
                                                <option value="">Select Country</option>
                                                <option value="us">United States</option>
                                                <option value="uk">United Kingdom</option>
                                                <option value="ca">Canada</option>
                                                <option value="au">Australia</option>
                                                <option value="de">Germany</option>
                                                <option value="fr">France</option>
                                            </select>
                                            @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="city" class="form-label">City *</label>
                                            <input type="text"
                                                class="form-control @error('city') is-invalid @enderror" id="city"
                                                wire:model="city" required>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="postalCode" class="form-label">Postal Code *</label>
                                            <input type="text"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                id="postalCode" wire:model="postal_code" required>
                                            @error('postal_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-navigation">
                                        <div></div> <!-- Empty div for spacing -->
                                        <button type="button" class="btn btn-primary"
                                            wire:click="nextStep">Next</button>
                                    </div>
                                </div>

                                <!-- Step 2: Personal Details -->
                                <div class="form-step {{ $currentStep == 2 ? 'active' : '' }}" id="step2-form">
                                    <h3 class="section-title">Your Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label">First Name *</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="firstName" wire:model="first_name" required>
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label">Last Name *</label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="lastName" wire:model="last_name" required>
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" wire:model="email" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number *</label>
                                            <input type="tel"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" wire:model="phone" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password *</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" wire:model="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="confirmPassword" class="form-label">Confirm Password *</label>
                                            <input type="password"
                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                id="confirmPassword" wire:model="confirm_password" required>
                                            @error('confirm_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobTitle"
                                            wire:model="job_title">
                                    </div>
                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-outline-primary"
                                            wire:click="prevStep">Previous</button>
                                        <button type="button" class="btn btn-primary"
                                            wire:click="nextStep">Next</button>
                                    </div>
                                </div>

                                <!-- Step 3: Account Type -->
                                <div class="form-step {{ $currentStep == 3 ? 'active' : '' }}" id="step3-form">
                                    <h3 class="section-title">Account Type</h3>
                                    <p>Please select whether you are a customer or supplier</p>
                                    <div class="user-type-selector">
                                        <div class="user-type-card {{ $user_type == 'customer' ? 'selected' : '' }}"
                                            wire:click="$set('user_type', 'customer')">
                                            <div class="user-type-icon">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                            <h4>Customer</h4>
                                            <p>I want to purchase medical products and equipment</p>
                                            <input type="radio" name="userType" value="customer"
                                                {{ $user_type == 'customer' ? 'checked' : '' }} hidden>
                                        </div>
                                        <div class="user-type-card {{ $user_type == 'supplier' ? 'selected' : '' }}"
                                            wire:click="$set('user_type', 'supplier')">
                                            <div class="user-type-icon">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <h4>Supplier</h4>
                                            <p>I want to supply products to CGSMed marketplace</p>
                                            <input type="radio" name="userType" value="supplier"
                                                {{ $user_type == 'supplier' ? 'checked' : '' }} hidden>
                                        </div>
                                    </div>
                                    @error('user_type')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-outline-primary"
                                            wire:click="prevStep">Previous</button>
                                        <button type="button" class="btn btn-primary"
                                            wire:click="nextStep">Next</button>
                                    </div>
                                </div>

                                <!-- Step 4: Review and Submit -->
                                <div class="form-step {{ $currentStep == 4 ? 'active' : '' }}" id="step4-form">
                                    <h3 class="section-title">Review Your Information</h3>
                                    <div class="review-section mb-4">
                                        <h5>Company Details</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Company Name:</strong> {{ $company_name }}</p>
                                                <p><strong>Company Type:</strong> {{ ucfirst($company_type) }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Address:</strong> {{ $company_address }}</p>
                                                <p><strong>Country:</strong> {{ $country }}</p>
                                                <p><strong>City/Postal Code:</strong> {{ $city }},
                                                    {{ $postal_code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-section mb-4">
                                        <h5>Personal Details</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> {{ $first_name }} {{ $last_name }}</p>
                                                <p><strong>Email:</strong> {{ $email }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Phone:</strong> {{ $phone }}</p>
                                                <p><strong>Job Title:</strong> {{ $job_title ?: 'Not provided' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-section mb-4">
                                        <h5>Account Type</h5>
                                        <p><strong>Selected Role:</strong> {{ ucfirst($user_type) ?: 'Not selected' }}
                                        </p>
                                    </div>

                                    <!-- Terms and Conditions -->
                                    <div class="form-check mb-4">
                                        <input class="form-check-input @error('terms_agreement') is-invalid @enderror"
                                            type="checkbox" id="termsAgreement" wire:model="terms_agreement"
                                            required>
                                        <label class="form-check-label" for="termsAgreement">
                                            I agree to the <a href="#">Terms and Conditions</a> and <a
                                                href="#">Privacy Policy</a>
                                        </label>
                                        @error('terms_agreement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-outline-primary"
                                            wire:click="prevStep">Previous</button>
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </div>
                                </div>
                            </form>

                            <div class="login-link">
                                Already have an account? <a href="{{ route('login') }}">Log in here</a>
                            </div>
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

    @push('scripts')
        <script>
            // Minimal JavaScript for enhanced user experience
            document.addEventListener('livewire:load', function() {
                // Auto-advance on Enter key in form fields (except textareas)
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                        e.preventDefault();
                        const activeStep = @this.currentStep;
                        if (activeStep < 4) {
                            @this.nextStep();
                        }
                    }
                });
            });
        </script>
    @endpush
</div>
