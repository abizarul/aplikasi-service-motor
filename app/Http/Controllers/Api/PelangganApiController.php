<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganApiController extends Controller
{
    public function index() {
        return response()->json(['status' => 'success', 'data' => Pelanggan::all()]);
    }
    public function store(Request $request) {
        $data = Pelanggan::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data disimpan', 'data' => $data], 201);
    }
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => Pelanggan::findOrFail($id)]);
    }
    public function update(Request $request, $id) {
        $data = Pelanggan::findOrFail($id);
        $data->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data diupdate', 'data' => $data]);
    }
    public function destroy($id) {
        Pelanggan::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data dihapus']);
    }
}