<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - {{ config('app.name') }}</title>
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

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background-color: #f8f9fa;
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

        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        .nav-link:hover,
        .nav-link.active {
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
            width: 100vw;
            margin: 0;
            padding: 25px 0;
            border: none;
            border-radius: 0;
            background-color: var(--white);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
            justify-content: center;
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

        /* Account Creation Section */
        .account-section {
            padding: 80px 0;
        }

        .account-card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
            margin-bottom: 30px;
        }

        .account-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .account-header h2 {
            color: var(--primary);
            margin-bottom: 15px;
        }

        .account-header p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Progress Bar */
        .progress-container {
            margin-bottom: 40px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 30px;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #e0e0e0;
            z-index: 1;
        }

        .progress-bar {
            position: absolute;
            top: 15px;
            left: 0;
            height: 4px;
            background-color: var(--primary);
            z-index: 2;
            transition: width 0.3s ease;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 3;
        }

        .step-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            color: var(--text-light);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .step.active .step-icon {
            background-color: var(--primary);
            color: white;
        }

        .step.completed .step-icon {
            background-color: var(--primary);
            color: white;
        }

        .step.completed .step-icon::after {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }

        .step-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-light);
            text-align: center;
        }

        .step.active .step-label {
            color: var(--primary);
        }

        /* Form Steps */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-section {
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eaeaea;
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .section-title {
            font-size: 1.4rem;
            margin-bottom: 25px;
            color: var(--primary);
            position: relative;
            padding-bottom: 10px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            bottom: 0;
            left: 0;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(26, 118, 210, 0.1);
            border-color: var(--primary);
        }

        .user-type-selector {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .user-type-card {
            flex: 1;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-type-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .user-type-card.selected {
            border-color: var(--primary);
            background-color: rgba(26, 118, 210, 0.05);
        }

        .user-type-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .user-type-card h4 {
            margin-bottom: 10px;
        }

        .user-type-card p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Form Navigation */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
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

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 30px;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
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

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .account-card {
                padding: 25px;
            }

            .user-type-selector {
                flex-direction: column;
            }

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

            .step-label {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <livewire:auth.create-account />
</body>

</html>
