<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    public function index() {
        return response()->json(['status' => 'success', 'data' => DataService::with('daftarService')->get()]);
    }
    public function store(Request $request) {
        $data = DataService::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data disimpan', 'data' => $data], 201);
    }
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => DataService::with('daftarService')->findOrFail($id)]);
    }
    public function update(Request $request, $id) {
        $data = DataService::findOrFail($id);
        $data->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data diupdate', 'data' => $data]);
    }
    public function destroy($id) {
        DataService::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data dihapus']);
    }
}