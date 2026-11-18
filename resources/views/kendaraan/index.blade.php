@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Kendaraan</h3>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">+ Tambah Kendaraan</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No Plat</th>
            <th>Jenis Kendaraan</th>
            <th>No STNK</th>
            <th>Tahun</th>
            <th>Nama Pemilik</th>
            <th>Warna</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kendaraans as $k)
        <tr>
            <td>{{ $k->no_plat_kendaraan }}</td>
            <td>{{ $k->jenis_kendaraan }}</td>
            <td>{{ $k->no_stnk }}</td>
            <td>{{ $k->tahun_pembuatan }}</td>
            <td>{{ $k->nama_pemilik }}</td>
            <td>{{ $k->warna_kendaraan }}</td>
            <td>
                <a href="{{ route('kendaraan.edit', $k->no_plat_kendaraan) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kendaraan.destroy', $k->no_plat_kendaraan) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection