@extends('layouts.app')
@section('content')
<h3>Tambah Data Kendaraan</h3>
<form action="{{ route('kendaraan.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>No Plat Kendaraan</label><input type="text" name="no_plat_kendaraan" class="form-control" required></div>
    <div class="mb-3">
        <label class="d-block">Jenis Kendaraan</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kendaraan" value="Matic" required>
            <label class="form-check-label">Matic</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kendaraan" value="Manual Transmisi" required>
            <label class="form-check-label">Manual Transmisi</label>
        </div>
    </div>
    <div class="mb-3"><label>No STNK</label><input type="text" name="no_stnk" class="form-control" required></div>
    <div class="mb-3"><label>Tahun Pembuatan Kendaraan</label><input type="number" name="tahun_pembuatan" class="form-control" required></div>
    <div class="mb-3"><label>Nama Pemilik</label><input type="text" name="nama_pemilik" class="form-control" required></div>
    <div class="mb-3"><label>Warna Kendaraan</label><input type="text" name="warna_kendaraan" class="form-control" required></div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection