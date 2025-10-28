<div class="main-menu">
    <div class="logo-box">
        <a class='logo-light' href="{{ route('dashboard') }}">
            @auth
                {{ config('app.name') }}
            @endauth
        </a>

        <a class='logo-dark' href="{{ route('dashboard') }}">
            @auth
                {{ config('app.name') }}
            @endauth
        </a>
    </div>

    <div data-simplebar>
        <ul class="app-menu">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('dashboard') }}">
                    <span class="menu-icon"><i data-lucide="layout-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('partners.index') }}">
                    <span class="menu-icon"><i data-lucide="users"></i></span>
                    <span class="menu-text"> Partners </span>
                </a>
            </li>

            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('categories.index') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> Categories </span>
                </a>
            </li>
            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('sub-categories.index') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text">Sub Categories </span>
                </a>
            </li>
            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('products.index') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> Products </span>
                </a>
            </li>
            {{-- <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('sections.index') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> Sections </span>
                </a>
            </li>
            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('sub-sections.index') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> Sub Sections </span>
                </a>
            </li> --}}
            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('about') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> About Section </span>
                </a>
            </li>

            <li class="menu-item">
                <a class='menu-link waves-effect' href="{{ route('settings') }}">
                    <span class="menu-icon"><i data-lucide="folder-tree"></i></span>
                    <span class="menu-text"> Settings </span>
                </a>
            </li>

        </ul>
    </div>
</div>
