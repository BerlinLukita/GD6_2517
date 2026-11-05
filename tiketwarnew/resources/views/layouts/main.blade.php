<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">TiketWar</a>

        <ul class="navbar-nav">
            {{-- Menu Beranda --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                   href="{{ route('home') }}">
                    Beranda
                </a>
            </li>

            {{-- Menu Konser --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('konser.*') ? 'active' : '' }}"
                   href="{{ route('konser.index') }}">
                    Konser
                </a>
            </li>

            {{-- Menu Tentang --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                   href="{{ route('tentang') }}">
                    Tentang
                </a>
            </li>
        </ul>
    </div>
</nav>
