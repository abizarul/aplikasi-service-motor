<?php
namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index() {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }
    public function create() {
        return view('kendaraan.create');
    }
    public function store(Request $request) {
        $request->validate([
            'no_plat_kendaraan' => 'required|unique:kendaraans',
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_pemilik' => 'required',
            'warna_kendaraan' => 'required',
        ]);
        Kendaraan::create($request->all());
        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan');
    }
    public function edit(Kendaraan $kendaraan) {
        return view('kendaraan.edit', compact('kendaraan'));
    }
    public function update(Request $request, Kendaraan $kendaraan) {
        $kendaraan->update($request->except('no_plat_kendaraan'));
        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diubah');
    }
    public function destroy(Kendaraan $kendaraan) {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus');
    }
}