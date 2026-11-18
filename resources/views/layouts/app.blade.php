<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Service Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Service Motor</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
            <a class="nav-link" href="{{ route('kendaraan.index') }}">Data Kendaraan</a>
            <a class="nav-link" href="{{ route('daftar-service.index') }}">Daftar Service</a>
            <a class="nav-link" href="{{ route('data-service.index') }}">Data Service</a>
            <a class="nav-link" href="{{ route('pembayaran-service.index') }}">Pembayaran Service</a>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>