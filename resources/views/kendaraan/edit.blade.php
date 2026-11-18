@extends('layouts.app')
@section('content')
<h3>Edit Data Kendaraan</h3>
<form action="{{ route('kendaraan.update', $kendaraan->no_plat_kendaraan) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>No Plat Kendaraan</label><input type="text" value="{{ $kendaraan->no_plat_kendaraan }}" class="form-control" readonly></div>
    <div class="mb-3">
        <label class="d-block">Jenis Kendaraan</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kendaraan" value="Matic" {{ $kendaraan->jenis_kendaraan == 'Matic' ? 'checked' : '' }}>
            <label class="form-check-label">Matic</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kendaraan" value="Manual Transmisi" {{ $kendaraan->jenis_kendaraan == 'Manual Transmisi' ? 'checked' : '' }}>
            <label class="form-check-label">Manual Transmisi</label>
        </div>
    </div>
    <div class="mb-3"><label>No STNK</label><input type="text" name="no_stnk" value="{{ $kendaraan->no_stnk }}" class="form-control" required></div>
    <div class="mb-3"><label>Tahun Pembuatan Kendaraan</label><input type="number" name="tahun_pembuatan" value="{{ $kendaraan->tahun_pembuatan }}" class="form-control" required></div>
    <div class="mb-3"><label>Nama Pemilik</label><input type="text" name="nama_pemilik" value="{{ $kendaraan->nama_pemilik }}" class="form-control" required></div>
    <div class="mb-3"><label>Warna Kendaraan</label><input type="text" name="warna_kendaraan" value="{{ $kendaraan->warna_kendaraan }}" class="form-control" required></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection