<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">TiketWar</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link"
href="{{ route('konser.index') }}">Konser</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
        </ul>
    </div>
</nav>