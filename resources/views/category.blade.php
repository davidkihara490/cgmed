@extends('master.layouts')

@section('content')
    <!-- Navigation -->

    @include('master.header')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>{{ $subCategory?->name }}</h1>
            <p>{{ $subCategory?->description }}</p>
            {{-- <a href="about.html" class="btn btn-light btn-lg">Learn More</a> --}}
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Products</h2>
            <div class="row">
                @foreach ($products as $product)
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
            </div>
        </div>
    </section>
@endsection
