@extends('layouts.app')
@section('content')
<h3>Tambah Data Service</h3>
<form action="{{ route('data-service.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Id Servis Pelanggan</label>
        <select name="id_servis_pelanggan" id="id_servis_pelanggan" class="form-select" required>
            <option value="" data-keluhan="">-- Pilih Id Servis Pelanggan --</option>
            @foreach($daftarServices as $ds)
                <option value="{{ $ds->id_servis_pelanggan }}" data-keluhan="{{ $ds->keluhan_kendaraan }}">{{ $ds->id_servis_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Keluhan Kendaraan</label>
        <textarea id="keluhan_kendaraan" class="form-control bg-light" readonly placeholder="Otomatis muncul setelah Id Servis Pelanggan dipilih"></textarea>
    </div>

    <div class="mb-3"><label>Estimasi Service</label><input type="text" name="estimasi_service" class="form-control" required></div>
    <div class="mb-3"><label>Nama Mekanik</label><input type="text" name="nama_mekanik" class="form-control" required></div>
    <div class="mb-3"><label>Sparepart Pengganti</label><input type="text" name="sparepart_pengganti" class="form-control" required></div>
    
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('data-service.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@push('scripts')
<script>
    document.getElementById('id_servis_pelanggan').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('keluhan_kendaraan').value = selectedOption.getAttribute('data-keluhan') || '';
    });
</script>
@endpush
@endsection