    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-heartbeat me-2"></i>{{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button">
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="aboutDropdown">

                            @foreach ($aboutSection as $section)
                                <a class="dropdown-item"
                                    href="{{ route('section-type.show', $section->section_type) }}">{{ ucfirst($section->section_type) }}</a>
                            @endforeach
                        </div>
                    </li>

                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dentalDropdown" role="button">
                                {{ $category->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dentalDropdown">
                                @foreach ($category->subCategory as $item)
                                    <a class="dropdown-item"
                                        href="{{ route('category.show', $item->id) }}">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact', 'contact') }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary ms-2" href="{{ route('login') }}">Partner Portal</a>
                        </li>
                    @endauth    </ul>
            </div>
        </div>
    </nav>
