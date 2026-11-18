<?php
namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index() {
        $dataServices = DataService::with('daftarService')->get();
        return view('data_service.index', compact('dataServices'));
    }
    public function create() {
        $daftarServices = DaftarService::all();
        return view('data_service.create', compact('daftarServices'));
    }
    public function store(Request $request) {
        $request->validate([
            'id_servis_pelanggan' => 'required',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);
        DataService::create($request->all());
        return redirect()->route('data-service.index')->with('success', 'Data service berhasil ditambahkan');
    }
    public function edit(DataService $dataService) {
        $daftarServices = DaftarService::all();
        return view('data_service.edit', compact('dataService', 'daftarServices'));
    }
    public function update(Request $request, DataService $dataService) {
        $dataService->update($request->all());
        return redirect()->route('data-service.index')->with('success', 'Data service berhasil diubah');
    }
    public function destroy(DataService $dataService) {
        $dataService->delete();
        return redirect()->route('data-service.index')->with('success', 'Data service berhasil dihapus');
    }
}