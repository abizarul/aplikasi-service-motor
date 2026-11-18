<?php
namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    public function index() {
        $pembayarans = PembayaranService::with('daftarService')->get();
        return view('pembayaran_service.index', compact('pembayarans'));
    }
    public function create() {
        $daftarServices = DaftarService::all();
        return view('pembayaran_service.create', compact('daftarServices'));
    }
    public function store(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required',
            'jumlah_biaya_servis' => 'required|numeric',
            'jenis_pembayaran' => 'required',
        ]);
        PembayaranService::create($request->all());
        return redirect()->route('pembayaran-service.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }
    public function edit(PembayaranService $pembayaranService) {
        $daftarServices = DaftarService::all();
        return view('pembayaran_service.edit', compact('pembayaranService', 'daftarServices'));
    }
    public function update(Request $request, PembayaranService $pembayaranService) {
        $pembayaranService->update($request->all());
        return redirect()->route('pembayaran-service.index')->with('success', 'Pembayaran berhasil diubah');
    }
    public function destroy(PembayaranService $pembayaranService) {
        $pembayaranService->delete();
        return redirect()->route('pembayaran-service.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}