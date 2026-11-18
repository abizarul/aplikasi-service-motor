<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanApiController extends Controller
{
    public function index() {
        return response()->json(['status' => 'success', 'data' => Kendaraan::all()]);
    }
    public function store(Request $request) {
        $data = Kendaraan::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data disimpan', 'data' => $data], 201);
    }
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => Kendaraan::findOrFail($id)]);
    }
    public function update(Request $request, $id) {
        $data = Kendaraan::findOrFail($id);
        $data->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data diupdate', 'data' => $data]);
    }
    public function destroy($id) {
        Kendaraan::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data dihapus']);
    }
}