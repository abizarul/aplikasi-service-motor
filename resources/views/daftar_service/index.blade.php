@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Service</h3>
    <a href="{{ route('daftar-service.create') }}" class="btn btn-primary">+ Tambah Daftar Service</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Servis</th>
            <th>No Plat</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Keluhan</th>
            <th>Tanggal Servis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($daftarServices as $ds)
        <tr>
            <td>{{ $ds->id_servis_pelanggan }}</td>
            <td>{{ $ds->no_plat_kendaraan }}</td>
            <td>{{ $ds->id_pelanggan }}</td>
            <td>{{ $ds->pelanggan->nama_lengkap ?? '-' }}</td>
            <td>{{ $ds->keluhan_kendaraan }}</td>
            <td>{{ $ds->tanggal_servis }}</td>
            <td>
                <a href="{{ route('daftar-service.edit', $ds->id_servis_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('daftar-service.destroy', $ds->id_servis_pelanggan) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection