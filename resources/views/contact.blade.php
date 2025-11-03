<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGSMed - Contact Us</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script> --}}

    {{-- 🧩 Load Google Maps JS API --}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>



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

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background-color: var(--secondary);
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-info {
            padding: 30px;
        }

        .contact-form-container {
            background: var(--white);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .contact-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .contact-description {
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 118, 210, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .form-icon {
            position: absolute;
            right: 16px;
            top: 42px;
            color: var(--text-light);
        }

        .submit-btn {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 30px;
            padding: 14px 30px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            justify-content: center;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 118, 210, 0.3);
        }

        .contact-method {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(26, 118, 210, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .contact-details h4 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .contact-details p {
            color: var(--text-light);
            margin-bottom: 0;
        }

        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-top: 40px;
        }

        .map-placeholder {
            height: 200px;
            background: linear-gradient(45deg, #e0e0e0, #f5f5f5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }

        .form-success {
            display: none;
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }

        .form-success.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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

            .contact-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .contact-info {
                order: 2;
            }

            .contact-form-container {
                order: 1;
            }
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    @include('master.header')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Get in touch with our medical experts for consultations, appointments, or any inquiries</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>

            <div class="contact-container">
                <div class="contact-info">
                    <h3 class="contact-title">We're Here to Help</h3>
                    <p class="contact-description">
                        Our team of medical professionals is ready to assist you with any questions
                        about our services, appointments, or medical inquiries. Reach out to us through
                        any of the following methods.
                    </p>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Visit Our Clinic</h4>
                            <p>{{ $settings->address }}</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Call Us</h4>
                            <p>{{ $settings->phone }}</p>
                            <p>{{ $settings->phone }} (Emergency)</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email Us</h4>
                            <p>{{ $settings->email }}</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Opening Hours</h4>
                            <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                            <p>Saturday: 9:00 AM - 2:00 PM</p>
                            <p>Emergency Services: 24/7</p>
                        </div>
                    </div>

                    <div class="map-container">
                        <div class="map-placeholder">
                            <i class="fas fa-map-marked-alt fa-2x"></i>
                            <span style="margin-left: 10px;">Interactive Map Location</span>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <h3>My Location on Google Maps</h3>
                        <div id="map" style="width: 100%; height: 500px;"></div>
                    </div>




                    <div class="container mt-5">
                        <h3>CGSMed Headquarters</h3>
                        <div id="map" style="width: 100%; height: 500px;"></div>
                    </div>










                </div>

                <div class="contact-form-container">
                    <h3 class="contact-title">Send Us a Message</h3>
                    <p class="contact-description">
                        Fill out the form below and our team will get back to you as soon as possible.
                    </p>

                    <form id="contactForm">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name"
                                required>
                            <i class="fas fa-user form-icon"></i>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                required>
                            <i class="fas fa-envelope form-icon"></i>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone"
                                placeholder="Enter your phone number">
                            <i class="fas fa-phone form-icon"></i>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-control" id="subject" required>
                                <option value="" disabled selected>Select a subject</option>
                                <option value="appointment">Appointment Request</option>
                                <option value="consultation">Medical Consultation</option>
                                <option value="billing">Billing Inquiry</option>
                                <option value="general">General Information</option>
                                <option value="other">Other</option>
                            </select>
                            <i class="fas fa-chevron-down form-icon"></i>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" placeholder="Please describe your inquiry in detail" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>

                        <div class="form-success" id="formSuccess">
                            <i class="fas fa-check-circle"></i>
                            Thank you! Your message has been sent successfully. We'll get back to you soon.
                        </div>
                    </form>
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
        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const formSuccess = document.getElementById('formSuccess');

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // In a real application, you would send the form data to a server here
                // For this demo, we'll just show the success message

                // Show success message
                formSuccess.classList.add('show');

                // Reset form after 3 seconds
                setTimeout(function() {
                    contactForm.reset();
                    formSuccess.classList.remove('show');
                }, 5000);
            });
        });
    </script>

    <script>
        function initMap() {
            // 📍 Your fixed company coordinates (Example: Nairobi)
            const companyLocation = {
                lat: -6.8278,
                lng: 37.6591 
            };

            // 🗺️ Create the map centered on your company
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: companyLocation,
            });

            // 📌 Add a marker for the company
            const marker = new google.maps.Marker({
                position: companyLocation,
                map: map,
                title: "CGSMed Headquarters",
            });

            // 🏢 Info window on click
            const infoWindow = new google.maps.InfoWindow({
                content: `
                <div style="font-size:14px">
                    <h6><strong>CGSMed</strong></h6>
                    <p>Medical Excellence Center</p>
                    <p><b>Address:</b> Nairobi, Kenya</p>
                </div>
            `,
            });

            marker.addListener("click", () => {
                infoWindow.open(map, marker);
            });
        }
    </script>


</body>

</html>
