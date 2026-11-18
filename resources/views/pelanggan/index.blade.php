@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Pelanggan</h3>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">+ Tambah Pelanggan</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Lengkap</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pelanggans as $p)
        <tr>
            <td>{{ $p->id_pelanggan }}</td>
            <td>{{ $p->nama_lengkap }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>{{ $p->alamat_pelanggan }}</td>
            <td>{{ $p->pekerjaan }}</td>
            <td>
                <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection