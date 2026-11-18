<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceApiController extends Controller
{
    public function index() {
        return response()->json(['status' => 'success', 'data' => DaftarService::with(['pelanggan', 'kendaraan'])->get()]);
    }
    public function store(Request $request) {
        $data = DaftarService::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data disimpan', 'data' => $data], 201);
    }
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => DaftarService::with(['pelanggan', 'kendaraan'])->findOrFail($id)]);
    }
    public function update(Request $request, $id) {
        $data = DaftarService::findOrFail($id);
        $data->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data diupdate', 'data' => $data]);
    }
    public function destroy($id) {
        DaftarService::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data dihapus']);
    }
}