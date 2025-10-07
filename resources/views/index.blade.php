<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGSMed - Medical Excellence</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- <style>
        :root {
            --primary: #1a76d2;
            --primary-dark: #1565c0;
            --secondary: #f8f9fa;
            --accent: #ff6b6b;
            --text-dark: #333;
            --text-light: #6c757d;
            --white: #ffffff;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }
        
        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
            transition: all 0.3s ease;
            width: 100%;
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
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

/* Full-Width Dropdown */
.nav-item.dropdown {
    position: static !important;
}

.navbar .dropdown-menu {
    position: absolute;
    left: 0;
    top: 100%;
    width: 100vw; /* Full viewport width */
    margin: 0;
    padding: 25px 0;
    border: none;
    border-radius: 0;
    background-color: var(--white);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: none;
    justify-content: center; /* Center all items */
    flex-wrap: wrap;
    z-index: 9999;
    transition: all 0.3s ease;
}

.nav-item.dropdown:hover .dropdown-menu,
.navbar .dropdown-menu:hover {
    display: flex;
    animation: fadeInDown 0.3s ease;
}

.navbar .dropdown-menu .dropdown-item {
    display: inline-block;
    color: var(--text-dark);
    font-weight: 500;
    margin: 10px 20px;
    transition: color 0.3s ease;
    white-space: nowrap;
}

.navbar .dropdown-menu .dropdown-item:hover {
    color: var(--primary);
    background: transparent;
}

/* Keep consistent look on smaller screens */
@media (max-width: 768px) {
    .navbar .dropdown-menu {
        position: static;
        display: none;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        box-shadow: none;
        padding: 10px 0;
    }
    .navbar .dropdown-menu.show {
        display: block;
    }
    .navbar .dropdown-menu .dropdown-item {
        display: block;
        margin: 5px 15px;
    }
}


        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar .dropdown-menu .dropdown-item {
            display: inline-block;
            margin: 0 15px;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
            white-space: nowrap;
        }

        .navbar .dropdown-menu .dropdown-item:hover {
            color: var(--primary);
            background: transparent;
        }

        /* Create a gap between nav item and dropdown */
        .nav-item.dropdown::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: transparent;
        }
        
        /* Hero Section */
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
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
            background-color: rgba(255,255,255,0.1);
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
            border-top: 1px solid rgba(255,255,255,0.1);
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
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .navbar .dropdown-menu {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                padding: 10px 0;
            }
            
            .navbar .dropdown-menu.show {
                display: block;
            }
            
            .navbar .dropdown-menu .dropdown-item {
                display: block;
                margin: 5px 0;
                padding: 8px 15px;
            }
        }
    </style> --}}

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
        }
    </style>

</head>

<body>