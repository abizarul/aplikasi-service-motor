@extends('layouts.app')
@section('content')
<h3>Edit Data Pelanggan</h3>
<form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>Id Pelanggan</label><input type="text" value="{{ $pelanggan->id_pelanggan }}" class="form-control" readonly></div>
    <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" value="{{ $pelanggan->nama_lengkap }}" class="form-control" required></div>
    <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" value="{{ $pelanggan->no_hp }}" class="form-control" required></div>
    <div class="mb-3"><label>Alamat Pelanggan</label><textarea name="alamat_pelanggan" class="form-control" required>{{ $pelanggan->alamat_pelanggan }}</textarea></div>
    <div class="mb-3"><label>Pekerjaan</label><input type="text" name="pekerjaan" value="{{ $pelanggan->pekerjaan }}" class="form-control" required></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection