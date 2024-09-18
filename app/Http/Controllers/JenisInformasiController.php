<?php

namespace App\Http\Controllers;

use App\Models\JenisInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Jenis Informasi management
 *
 * APIs for managing information types
 */
class JenisInformasiController extends Controller
{
    public function index()
    {
        $jenisInformasi = JenisInformasi::all();
        return response()->json($jenisInformasi);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required|string|max:25|unique:jenis_informasi'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jenisInformasi = JenisInformasi::create($request->all());
        return response()->json($jenisInformasi, 201);
    }

    public function show($id)
    {
        $jenisInformasi = JenisInformasi::find($id);

        if (!$jenisInformasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($jenisInformasi);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required|string|max:25|unique:jenis_informasi,nama_jenis,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jenisInformasi = JenisInformasi::find($id);

        if (!$jenisInformasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $jenisInformasi->update($request->all());
        return response()->json($jenisInformasi);
    }

    public function destroy($id)
    {
        $jenisInformasi = JenisInformasi::find($id);

        if (!$jenisInformasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $jenisInformasi->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
