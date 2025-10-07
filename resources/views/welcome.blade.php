@extends('master.layouts')

@section('content')
    <!-- Navigation -->

    @include('master.header')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>{{ $settings?->hero_title }}</h1>
            <p>{{ $settings?->hero_sub_title }}</p>
            <a href="about.html" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top product-img" alt="Dental Implant">
                        <div class="card-body">
                            <h5 class="card-title">Advanced Dental Implants</h5>
                            <p class="card-text">Our premium dental implants feature innovative surface technology for
                                optimal osseointegration and long-term stability.</p>
                            <a href="dental.html#implants" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top product-img" alt="Surgical Instrument">
                        <div class="card-body">
                            <h5 class="card-title">Precision Surgical Instruments</h5>
                            <p class="card-text">Engineered for accuracy and durability, our surgical instruments meet
                                the highest standards for medical professionals.</p>
                            <a href="surgical.html#instruments" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top product-img" alt="Aesthetic Device">
                        <div class="card-body">
                            <h5 class="card-title">Aesthetic Medical Devices</h5>
                            <p class="card-text">Revolutionary aesthetic technology designed to deliver exceptional
                                results with minimal downtime for patients.</p>
                            <a href="cosmetic.html#equipment" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section-title text-start">About CGSMed</h2>
                    <p>For over three decades, CGSMed has been at the forefront of medical innovation, providing
                        healthcare professionals with cutting-edge solutions that improve patient outcomes.</p>
                    <p>Our commitment to research and development has resulted in numerous patented technologies that
                        have revolutionized dental, surgical, and cosmetic medical practices worldwide.</p>
                    <p>With a global network of partners and distributors, we ensure that our products reach medical
                        professionals in over 60 countries, supported by comprehensive training and technical
                        assistance.</p>
                    <a href="about.html" class="btn btn-primary mt-3">Our Story</a>
                </div>
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        class="img-fluid rounded" alt="Medical Laboratory">
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Our Partners</h2>
            <p class="text-center mb-5">We collaborate with leading medical institutions and distributors worldwide to
                bring innovative solutions to healthcare professionals.</p>
            <div class="partner-logos">
                <img src="https://via.placeholder.com/150x60/1a76d2/ffffff?text=MedTech+Global" class="partner-logo"
                    alt="Partner 1">
                <img src="https://via.placeholder.com/150x60/1a76d2/ffffff?text=Dental+Innovations" class="partner-logo"
                    alt="Partner 2">
                <img src="https://via.placeholder.com/150x60/1a76d2/ffffff?text=Surgical+Solutions" class="partner-logo"
                    alt="Partner 3">
                <img src="https://via.placeholder.com/150x60/1a76d2/ffffff?text=Aesthetic+Partners" class="partner-logo"
                    alt="Partner 4">
                <img src="https://via.placeholder.com/150x60/1a76d2/ffffff?text=Global+Health" class="partner-logo"
                    alt="Partner 5">
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('master.footer')
@endsection
