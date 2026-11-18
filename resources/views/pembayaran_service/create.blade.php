@extends('layouts.app')
@section('content')
<h3>Tambah Pembayaran Service</h3>
<form action="{{ route('pembayaran-service.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Id Servis Pelanggan</label>
        <select name="id_servis_pelanggan" class="form-select" required>
            <option value="">-- Pilih Id Servis Pelanggan --</option>
            @foreach($daftarServices as $ds)
                <option value="{{ $ds->id_servis_pelanggan }}">{{ $ds->id_servis_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3"><label>Jumlah Biaya Servis</label><input type="number" name="jumlah_biaya_servis" class="form-control" required></div>

    <div class="mb-3">
        <label class="d-block">Jenis Pembayaran</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Cash / Tunai" required>
            <label class="form-check-label">Cash / Tunai</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Non Tunai" required>
            <label class="form-check-label">Non Tunai</label>
        </div>
    </div>

    <div class="mb-3"><label>Keterangan</label><textarea name="keterangan" class="form-control"></textarea></div>
    
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pembayaran-service.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection