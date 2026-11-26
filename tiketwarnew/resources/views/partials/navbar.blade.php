
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            TiketWar
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Menu Navigasi --}}
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

                {{-- Menu Pesanan --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}"
                       href="{{ route('pesanan.index') }}">
                        Pesanan
                    </a>
                </li>

                {{-- Menu Laporan --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}"
                       href="{{ route('laporan.index') }}">
                        Laporan
                    </a>
                </li>

                {{-- Menu Promotor --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('promotor.*') ? 'active' : '' }}"
                       href="{{ route('promotor.index') }}">
                        Promotor
                    </a>
                </li>

                {{-- Menu Tentang --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                       href="{{ route('tentang') }}">
                        Tentang
                    </a>
                </li>

                {{-- Menu Kontak --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                       href="{{ route('kontak') }}">
                        Kontak
                    </a>
                </li>

            </ul>

            {{-- Menu Login dan Logout Admin --}}
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item d-flex align-items-center me-2">
                        <span class="navbar-text">
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="btn btn-sm btn-outline-light">
                                Keluar
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login Admin
                        </a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>
