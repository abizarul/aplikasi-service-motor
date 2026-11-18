<?php
namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index() {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])->get();
        return view('daftar_service.index', compact('daftarServices'));
    }
    public function create() {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();
        return view('daftar_service.create', compact('pelanggans', 'kendaraans'));
    }
    public function store(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required|unique:daftar_services',
            'no_plat_kendaraan' => 'required',
            'id_pelanggan' => 'required',
            'keluhan_kendaraan' => 'required',
            'tanggal_servis' => 'required|date',
        ]);
        DaftarService::create($request->all());
        return redirect()->route('daftar-service.index')->with('success', 'Daftar service berhasil ditambahkan');
    }
    public function edit(DaftarService $daftarService) {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();
        return view('daftar_service.edit', compact('daftarService', 'pelanggans', 'kendaraans'));
    }
    public function update(Request $request, DaftarService $daftarService) {
        $daftarService->update($request->except('id_servis_pelanggan'));
        return redirect()->route('daftar-service.index')->with('success', 'Daftar service berhasil diubah');
    }
    public function destroy(DaftarService $daftarService) {
        $daftarService->delete();
        return redirect()->route('daftar-service.index')->with('success', 'Daftar service berhasil dihapus');
    }
}