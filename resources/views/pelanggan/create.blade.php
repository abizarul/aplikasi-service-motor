@extends('layouts.app')
@section('content')
<h3>Tambah Data Pelanggan</h3>
<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Id Pelanggan</label><input type="text" name="id_pelanggan" class="form-control" required></div>
    <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
    <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" class="form-control" required></div>
    <div class="mb-3"><label>Alamat Pelanggan</label><textarea name="alamat_pelanggan" class="form-control" required></textarea></div>
    <div class="mb-3"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" required></div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection