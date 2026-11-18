@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Pembayaran Service</h3>
    <a href="{{ route('pembayaran-service.create') }}" class="btn btn-primary">+ Tambah Pembayaran</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Servis Pelanggan</th>
            <th>Jumlah Biaya Servis</th>
            <th>Jenis Pembayaran</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayarans as $pb)
        <tr>
            <td>{{ $pb->id_servis_pelanggan }}</td>
            <td>Rp {{ number_format($pb->jumlah_biaya_servis, 0, ',', '.') }}</td>
            <td>{{ $pb->jenis_pembayaran }}</td>
            <td>{{ $pb->keterangan }}</td>
            <td>
                <a href="{{ route('pembayaran-service.edit', $pb->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pembayaran-service.destroy', $pb->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection