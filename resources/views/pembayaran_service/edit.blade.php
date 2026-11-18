@extends('layouts.app')
@section('content')
<h3>Edit Pembayaran Service</h3>
<form action="{{ route('pembayaran-service.update', $pembayaranService->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Id Servis Pelanggan</label>
        <select name="id_servis_pelanggan" class="form-select" required>
            @foreach($daftarServices as $ds)
                <option value="{{ $ds->id_servis_pelanggan }}" {{ $pembayaranService->id_servis_pelanggan == $ds->id_servis_pelanggan ? 'selected' : '' }}>{{ $ds->id_servis_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3"><label>Jumlah Biaya Servis</label><input type="number" name="jumlah_biaya_servis" value="{{ $pembayaranService->jumlah_biaya_servis }}" class="form-control" required></div>

    <div class="mb-3">
        <label class="d-block">Jenis Pembayaran</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Cash / Tunai" {{ $pembayaranService->jenis_pembayaran == 'Cash / Tunai' ? 'checked' : '' }}>
            <label class="form-check-label">Cash / Tunai</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Non Tunai" {{ $pembayaranService->jenis_pembayaran == 'Non Tunai' ? 'checked' : '' }}>
            <label class="form-check-label">Non Tunai</label>
        </div>
    </div>

    <div class="mb-3"><label>Keterangan</label><textarea name="keterangan" class="form-control">{{ $pembayaranService->keterangan }}</textarea></div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pembayaran-service.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection