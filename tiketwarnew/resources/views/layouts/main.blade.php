<!DOCTYPE html>
<html lang="id">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'TiketWar') - TiketWar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">TiketWar</a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link"
href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link"
href="{{ route('konser.index') }}">Konser</a></li>
                    <li class="nav-item"><a class="nav-link"
href="{{ route('tentang') }}">Tentang</a></li>
            </ul>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>