<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index() {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }
    public function create() {
        return view('pelanggan.create');
    }
    public function store(Request $request) {
        $request->validate([
            'id_pelanggan' => 'required|unique:pelanggans',
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat_pelanggan' => 'required',
            'pekerjaan' => 'required',
        ]);
        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan');
    }
    public function edit(Pelanggan $pelanggan) {
        return view('pelanggan.edit', compact('pelanggan'));
    }
    public function update(Request $request, Pelanggan $pelanggan) {
        $pelanggan->update($request->except('id_pelanggan'));
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
    }
    public function destroy(Pelanggan $pelanggan) {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }
}