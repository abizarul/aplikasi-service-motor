<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceApiController extends Controller
{
    public function index() {
        return response()->json(['status' => 'success', 'data' => PembayaranService::with('daftarService')->get()]);
    }
    public function store(Request $request) {
        $data = PembayaranService::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data disimpan', 'data' => $data], 201);
    }
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => PembayaranService::with('daftarService')->findOrFail($id)]);
    }
    public function update(Request $request, $id) {
        $data = PembayaranService::findOrFail($id);
        $data->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data diupdate', 'data' => $data]);
    }
    public function destroy($id) {
        PembayaranService::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data dihapus']);
    }
}