@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Service</h3>
    <a href="{{ route('data-service.create') }}" class="btn btn-primary">+ Tambah Data Service</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Servis Pelanggan</th>
            <th>Keluhan Kendaraan</th>
            <th>Estimasi Service</th>
            <th>Nama Mekanik</th>
            <th>Sparepart Pengganti</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataServices as $dt)
        <tr>
            <td>{{ $dt->id_servis_pelanggan }}</td>
            <td>{{ $dt->daftarService->keluhan_kendaraan ?? '-' }}</td>
            <td>{{ $dt->estimasi_service }}</td>
            <td>{{ $dt->nama_mekanik }}</td>
            <td>{{ $dt->sparepart_pengganti }}</td>
            <td>
                <a href="{{ route('data-service.edit', $dt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('data-service.destroy', $dt->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection