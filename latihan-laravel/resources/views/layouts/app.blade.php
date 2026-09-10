<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Praktikum Pemweb II')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Pemweb II</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                <a class="nav-link" href="/matakuliah-praktikum">Matakuliah</a>
            </div>
        </div>
    </nav>
    <main class="container py-2">
        @yield('konten')
    </main>
</body>
</html>