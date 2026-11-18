@extends('layouts.app')
@section('content')
<h3>Tambah Daftar Service</h3>
<form action="{{ route('daftar-service.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Id Servis Pelanggan</label><input type="text" name="id_servis_pelanggan" class="form-control" required></div>
    
    <div class="mb-3">
        <label>No Plat Kendaraan</label>
        <select name="no_plat_kendaraan" class="form-select" required>
            <option value="">-- Pilih No Plat Kendaraan --</option>
            @foreach($kendaraans as $k)
                <option value="{{ $k->no_plat_kendaraan }}">{{ $k->no_plat_kendaraan }} - {{ $k->nama_pemilik }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Id Pelanggan</label>
        <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
            <option value="" data-nama="">-- Pilih Id Pelanggan --</option>
            @foreach($pelanggans as $p)
                <option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}">{{ $p->id_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" class="form-control bg-light" readonly placeholder="Otomatis muncul setelah Id Pelanggan dipilih">
    </div>

    <div class="mb-3"><label>Keluhan Kendaraan</label><textarea name="keluhan_kendaraan" class="form-control" required></textarea></div>
    <div class="mb-3"><label>Tanggal Servis</label><input type="date" name="tanggal_servis" class="form-control" required></div>
    
    <button type="submit" class="btn btn-success">Simpan</button>
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