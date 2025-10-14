<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGSMed - Medical Imaging Gallery</title>
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

        /* Featured Products */
        .product-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
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

        /* Partner Section */
        .partner-logos {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .partner-logo {
            height: 60px;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* Contact Form */
        .contact-form .form-control {
            border-radius: 0;
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .contact-form .form-control:focus {
            box-shadow: none;
            border-color: var(--primary);
        }

        /* Image Gallery Section */
        .image-gallery-section {
            padding: 80px 0;
            background-color: var(--secondary);
        }
        
        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .filter-controls {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 8px 20px;
            background: var(--white);
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            background: var(--white);
        }
        
        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        .gallery-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        
        .gallery-content {
            padding: 20px;
        }
        
        .gallery-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--text-dark);
        }
        
        .gallery-description {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .gallery-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: var(--text-light);
        }
        
        .gallery-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .action-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }
        
        .action-icon:hover {
            background: var(--primary);
            color: var(--white);
        }
        
        .featured-image {
            grid-column: span 2;
            display: flex;
            flex-direction: column;
        }
        
        .featured-image .gallery-image {
            height: 300px;
        }
        
        .image-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 4000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .image-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            max-width: 90%;
            max-height: 90%;
            position: relative;
        }
        
        .modal-image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 8px;
        }
        
        .modal-close {
            position: absolute;
            top: -40px;
            right: 0;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--white);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .modal-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .modal-prev {
            left: 20px;
        }
        
        .modal-next {
            right: 20px;
        }
        
        .modal-info {
            color: var(--white);
            text-align: center;
            margin-top: 20px;
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
            
            .gallery-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .featured-image {
                grid-column: span 1;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">CGSMed</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Medical Imaging
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">X-Ray</a></li>
                            <li><a class="dropdown-item" href="#">MRI</a></li>
                            <li><a class="dropdown-item" href="#">CT Scan</a></li>
                            <li><a class="dropdown-item" href="#">Ultrasound</a></li>
                            <li><a class="dropdown-item" href="#">Mammography</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Medical Imaging Gallery</h1>
            <p>Explore our collection of advanced diagnostic imaging with detailed analysis and insights</p>
            <a href="#" class="btn btn-primary">View All Cases</a>
        </div>
    </section>

    <!-- Image Gallery Section -->
    <section class="image-gallery-section">
        <div class="container">
            <div class="gallery-header">
                <h2 class="section-title">Diagnostic Imaging Cases</h2>
                <div class="filter-controls">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">MRI</button>
                    <button class="filter-btn">CT Scan</button>
                    <button class="filter-btn">X-Ray</button>
                    <button class="filter-btn">Ultrasound</button>
                </div>
            </div>
            
            <div class="gallery-grid">
                <!-- Featured Image -->
                <div class="gallery-item featured-image">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80" 
                         alt="Brain MRI Scan" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Brain MRI - Neurological Assessment</h3>
                        <p class="gallery-description">High-resolution magnetic resonance imaging showing detailed brain structures for comprehensive neurological assessment and diagnosis.</p>
                        <div class="gallery-meta">
                            <span>Modality: MRI</span>
                            <span>Date: Oct 15, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-share-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Item 1 -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Chest X-Ray" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Chest X-Ray - Pulmonary Evaluation</h3>
                        <p class="gallery-description">Standard chest radiograph for assessment of pulmonary and cardiac structures.</p>
                        <div class="gallery-meta">
                            <span>Modality: X-Ray</span>
                            <span>Date: Sep 28, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Item 2 -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1581595218477-7c5ad476ef54?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Abdominal CT" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Abdominal CT Scan</h3>
                        <p class="gallery-description">Computed tomography of the abdomen for detailed organ assessment.</p>
                        <div class="gallery-meta">
                            <span>Modality: CT Scan</span>
                            <span>Date: Oct 5, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Item 3 -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Cardiac MRI" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Cardiac MRI</h3>
                        <p class="gallery-description">Magnetic resonance imaging focused on cardiac structure and function.</p>
                        <div class="gallery-meta">
                            <span>Modality: MRI</span>
                            <span>Date: Oct 10, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Item 4 -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Musculoskeletal Ultrasound" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Musculoskeletal Ultrasound</h3>
                        <p class="gallery-description">Ultrasound imaging of musculoskeletal structures for soft tissue evaluation.</p>
                        <div class="gallery-meta">
                            <span>Modality: Ultrasound</span>
                            <span>Date: Oct 12, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Item 5 -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Mammography" class="gallery-image">
                    <div class="gallery-content">
                        <h3 class="gallery-title">Screening Mammography</h3>
                        <p class="gallery-description">Routine breast imaging for early detection of abnormalities.</p>
                        <div class="gallery-meta">
                            <span>Modality: Mammography</span>
                            <span>Date: Oct 18, 2023</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="#" class="action-icon">
                                <i class="fas fa-expand"></i>
                            </a>
                            <a href="#" class="action-icon">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div class="image-modal">
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <button class="modal-nav modal-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="modal-nav modal-next">
                <i class="fas fa-chevron-right"></i>
            </button>
            <img src="" alt="" class="modal-image">
            <div class="modal-info">
                <h3 class="modal-title"></h3>
                <p class="modal-description"></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>CGSMed</h5>
                    <p>Providing cutting-edge medical solutions with a focus on patient care and innovative technology.</p>
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
                        <li><a href="#">Doctors</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul>
                        <li><a href="#">Medical Imaging</a></li>
                        <li><a href="#">Laboratory Tests</a></li>
                        <li><a href="#">Surgical Procedures</a></li>
                        <li><a href="#">Emergency Care</a></li>
                        <li><a href="#">Health Checkups</a></li>
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
        // Simple modal functionality for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.querySelector('.image-modal');
            const modalImage = document.querySelector('.modal-image');
            const modalTitle = document.querySelector('.modal-title');
            const modalDescription = document.querySelector('.modal-description');
            const closeModal = document.querySelector('.modal-close');
            const expandButtons = document.querySelectorAll('.action-icon .fa-expand');
            
            // Open modal when expand button is clicked
            expandButtons.forEach(button => {
                button.closest('.action-icon').addEventListener('click', function(e) {
                    e.preventDefault();
                    const galleryItem = this.closest('.gallery-item');
                    const imageSrc = galleryItem.querySelector('.gallery-image').src;
                    const title = galleryItem.querySelector('.gallery-title').textContent;
                    const description = galleryItem.querySelector('.gallery-description').textContent;
                    
                    modalImage.src = imageSrc;
                    modalTitle.textContent = title;
                    modalDescription.textContent = description;
                    modal.classList.add('active');
                });
            });
            
            // Close modal
            closeModal.addEventListener('click', function() {
                modal.classList.remove('active');
            });
            
            // Close modal when clicking outside the image
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Filter functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // In a real implementation, you would filter the gallery items here
                    // For this demo, we'll just show an alert
                    alert(`Filtering by: ${this.textContent}`);
                });
            });
        });
    </script>
</body>

</html>