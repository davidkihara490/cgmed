<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGSMed - Medical Imaging System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <style>
        :root {
            --primary: #1a76d2;
            --primary-dark: #1565c0;
            --secondary: #f8f9fa;
            --accent: #ff6b6b;
            --text-dark: #333;
            --text-light: #6c757d;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        /* NAVBAR (keeps a stacking context for absolute child) */
        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            /* anchor for top location calculations */
            z-index: 2000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 500;
            padding: 8px 15px !important;
            color: var(--text-dark) !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
        }

        .dropdown-toggle::after {
            display: none !important;
            /* hide caret */
        }

        /*
      FULL-WIDTH HORIZONTAL DROPDOWN (desktop)
      Technique: position the dropdown centered relative to the navbar and
      set width:100vw so it spans the full viewport. left:50% + translateX(-50%)
      centers the full-viewport bar correctly regardless of container width.
    */
        .nav-item.dropdown {
            position: static;
            /* keep normal flow for hover */
        }

        .navbar .dropdown-menu {
            --pad: 18px;
            position: absolute;
            top: 100%;
            /* directly below the navbar */
            left: 50%;
            /* center anchor */
            transform: translateX(-50%);
            width: 100vw;
            /* span full viewport */
            max-width: 100vw;
            margin: 0;
            padding: var(--pad) 12px;
            border: none;
            border-radius: 0;
            background-color: var(--white);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
            display: none;
            /* show via hover/focus/show class */
            justify-content: center;
            /* center horizontally */
            align-items: center;
            gap: 18px;
            /* spacing between items */
            z-index: 3000;
            overflow-x: auto;
            /* allow horizontal scroll if items overflow */
            -webkit-overflow-scrolling: touch;
            white-space: nowrap;
            /* keep items on one line */
        }

        /* keep menu visible when hovering or when focus is inside (accessibility) */
        .nav-item.dropdown:hover>.dropdown-menu,
        .nav-item.dropdown:focus-within>.dropdown-menu,
        .navbar .dropdown-menu:hover {
            display: flex;
        }

        /* also support bootstrap's .show class (e.g. when toggled) */
        .navbar .dropdown-menu.show {
            display: flex;
        }

        /* dropdown items layout horizontally */
        .navbar .dropdown-menu .dropdown-item {
            display: inline-block;
            /* make them sit side-by-side */
            margin: 0 12px;
            padding: 8px 12px;
            color: var(--text-dark);
            font-weight: 500;
            background: none;
            border-radius: 4px;
            white-space: nowrap;
            transition: color 0.15s ease, background 0.15s ease;
        }

        .navbar .dropdown-menu .dropdown-item:hover {
            color: var(--primary);
            background: rgba(26, 118, 210, 0.04);
        }

        /* subtle fade-in */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* HERO SECTION */
        .hero-section {
            background: linear-gradient(rgba(26, 118, 210, 0.8), rgba(26, 118, 210, 0.8)), url('https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
            background-size: cover;
            color: var(--white);
            padding: 120px 0 100px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Section Styling */
        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--primary);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Product Section */
        .product-section {
            padding: 80px 0;
            background-color: var(--secondary);
        }

        .product-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-bottom: 60px;
        }

        .product-gallery {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .main-image {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-gallery {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 10px 0;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .thumbnail.active,
        .thumbnail:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 20px 0;
        }

        .product-title {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--text-dark);
        }

        .product-subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 25px;
        }

        .product-description {
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .product-features {
            margin-bottom: 30px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
        }

        .feature-list li i {
            color: var(--primary);
            margin-right: 10px;
            margin-top: 4px;
        }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            width: fit-content;
        }

        .quantity-btn {
            background: none;
            border: none;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: #f5f5f5;
        }

        .quantity-input {
            width: 50px;
            height: 40px;
            border: none;
            text-align: center;
            font-weight: 500;
        }

        .btn-add-to-cart {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-add-to-cart:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-wishlist {
            background: none;
            border: 1px solid #e0e0e0;
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .btn-wishlist:hover {
            color: var(--accent);
            border-color: var(--accent);
        }

        .product-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eaeaea;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--primary);
        }

        /* Specifications Section */
        .specs-section {
            padding: 60px 0;
        }

        .specs-table {
            width: 100%;
            border-collapse: collapse;
        }

        .specs-table tr {
            border-bottom: 1px solid #eaeaea;
        }

        .specs-table td {
            padding: 15px 10px;
        }

        .specs-table td:first-child {
            font-weight: 500;
            width: 30%;
        }

        /* Related Products */
        .related-products {
            padding: 60px 0;
            background-color: var(--secondary);
        }

        .product-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
            background: white;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .product-card-body {
            padding: 20px;
        }

        .product-card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .product-card-price {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: var(--white);
            padding: 60px 0 20px;
        }

        footer h5 {
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        footer h5:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            background-color: var(--primary);
            bottom: 0;
            left: 0;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer ul li a:hover {
            color: var(--white);
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 0.9rem;
            color: #bdc3c7;
        }

        /* RESPONSIVE: on smaller screens show vertical stacked dropdown (click-to-open) */
        @media (max-width: 992px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .navbar .dropdown-menu {
                position: static;
                /* flow within page */
                transform: none;
                width: 100%;
                padding: 10px 0;
                display: none;
                /* shown when .show is added by Bootstrap */
                flex-direction: column;
                align-items: stretch;
                box-shadow: none;
                white-space: normal;
                overflow: visible;
            }

            /* when bootstrap toggles .show on mobile, we let it display in a stacked layout */
            .navbar .dropdown-menu.show {
                display: flex;
                flex-direction: column;
            }

            .navbar .dropdown-menu .dropdown-item {
                display: block;
                margin: 6px 16px;
                padding: 10px 12px;
                width: calc(100% - 32px);
            }

            .product-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-actions {
                flex-wrap: wrap;
            }
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    @include('master.header')
    <!-- Product Section -->
    <section class="product-section">
        <div class="container">
            <div class="product-container">
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            id="main-product-image">
                    </div>
                </div>

                <div class="product-info">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <p class="product-description">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Specifications Section -->
    {{-- <section class="specs-section">
        <div class="container">
            <h2 class="section-title">Technical Specifications</h2>

            <table class="specs-table">
                <tr>
                    <td>Field Strength</td>
                    <td>3.0 Tesla</td>
                </tr>
                <tr>
                    <td>Gradient Strength</td>
                    <td>45 mT/m</td>
                </tr>
                <tr>
                    <td>Slew Rate</td>
                    <td>200 T/m/s</td>
                </tr>
                <tr>
                    <td>Bore Diameter</td>
                    <td>70 cm</td>
                </tr>
                <tr>
                    <td>Magnet Length</td>
                    <td>1.6 m</td>
                </tr>
                <tr>
                    <td>Patient Weight Capacity</td>
                    <td>205 kg (450 lbs)</td>
                </tr>
                <tr>
                    <td>Cooling System</td>
                    <td>Zero-boiloff with cryogen-free operation</td>
                </tr>
                <tr>
                    <td>Power Requirements</td>
                    <td>480V, 3-phase, 150A</td>
                </tr>
                <tr>
                    <td>Dimensions (W x D x H)</td>
                    <td>2.2 m x 3.8 m x 2.1 m</td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td>7,500 kg</td>
                </tr>
                <tr>
                    <td>Software Platform</td>
                    <td>IntelliSuite 5.0 with AI integration</td>
                </tr>
                <tr>
                    <td>Applications</td>
                    <td>Neuro, Body, Cardiac, MSK, Oncology, Pediatrics</td>
                </tr>
            </table>
        </div>
    </section> --}}

    <!-- Related Products -->
    <section class="related-products">
        <div class="container">
            <h2 class="section-title">Related Products</h2>

            <div class="row">

                @foreach ($similarProducts as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="CT Scanner" class="product-img">
                            <div class="product-card-body">
                                <h5 class="product-card-title">{{ $product->name }}</h5>
                                <p class="product-description">{{ $product->description }}
                                </p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>CGSMed</h5>
                    <p>Providing cutting-edge medical solutions with a focus on patient care and innovative technology.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Products</h5>
                    <ul>
                        <li><a href="#">Medical Imaging</a></li>
                        <li><a href="#">Surgical Equipment</a></li>
                        <li><a href="#">Diagnostic Tools</a></li>
                        <li><a href="#">Laboratory Equipment</a></li>
                        <li><a href="#">Patient Monitoring</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact Us</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Medical Drive, Health City</li>
                        <li><i class="fas fa-phone me-2"></i> (555) 123-4567</li>
                        <li><i class="fas fa-envelope me-2"></i> info@cgsmed.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 CGSMed. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Thumbnail gallery functionality
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('main-product-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(thumb => thumb.classList.remove('active'));

                    // Add active class to clicked thumbnail
                    this.classList.add('active');

                    // Update main image
                    const newImageSrc = this.getAttribute('data-image');
                    mainImage.src = newImageSrc;
                });
            });

            // Quantity selector functionality
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const quantityInput = document.getElementById('product-qty');

            decreaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            increaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            // Add to cart functionality
            const addToCartBtn = document.querySelector('.btn-add-to-cart');
            addToCartBtn.addEventListener('click', function() {
                const quantity = parseInt(quantityInput.value);
                alert(`Added ${quantity} Advanced MRI System(s) to your cart!`);
            });

            // Wishlist functionality
            const wishlistBtn = document.querySelector('.btn-wishlist');
            wishlistBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.style.color = 'var(--accent)';
                    alert('Added to your wishlist!');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.style.color = 'var(--text-light)';
                    alert('Removed from your wishlist!');
                }
            });
        });
    </script>
</body>

</html>
