@extends('layouts.app')
@section('content')
<h3>Edit Daftar Service</h3>
<form action="{{ route('daftar-service.update', $daftarService->id_servis_pelanggan) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label>Id Servis Pelanggan</label><input type="text" value="{{ $daftarService->id_servis_pelanggan }}" class="form-control" readonly></div>
    
    <div class="mb-3">
        <label>No Plat Kendaraan</label>
        <select name="no_plat_kendaraan" class="form-select" required>
            @foreach($kendaraans as $k)
                <option value="{{ $k->no_plat_kendaraan }}" {{ $daftarService->no_plat_kendaraan == $k->no_plat_kendaraan ? 'selected' : '' }}>{{ $k->no_plat_kendaraan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Id Pelanggan</label>
        <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
            @foreach($pelanggans as $p)
                <option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}" {{ $daftarService->id_pelanggan == $p->id_pelanggan ? 'selected' : '' }}>{{ $p->id_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" value="{{ $daftarService->pelanggan->nama_lengkap ?? '' }}" class="form-control bg-light" readonly>
    </div>

    <div class="mb-3"><label>Keluhan Kendaraan</label><textarea name="keluhan_kendaraan" class="form-control" required>{{ $daftarService->keluhan_kendaraan }}</textarea></div>
    <div class="mb-3"><label>Tanggal Servis</label><input type="date" name="tanggal_servis" value="{{ $daftarService->tanggal_servis }}" class="form-control" required></div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('daftar-service.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@push('scripts')
<script>
    document.getElementById('id_pelanggan').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('nama_pelanggan').value = selectedOption.getAttribute('data-nama') || '';
    });
</script>
@endpush
@endsection