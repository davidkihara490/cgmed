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

                @foreach ($featuredProducts as $product)
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                class="card-img-top product-img" alt="Dental Implant">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}
                                </p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-4">
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
                </div> --}}
            </div>
        </div>
    </section>
@endsection
