<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Dokumentasi Sekolah management
 *
 * APIs for managing school documentation
 */
class DokumentasiSekolahController extends Controller
{
    // Tampilkan daftar dokumentasi sekolah
    public function index()
    {
        $dokumentasi = DokumentasiSekolah::all();
        return response()->json($dokumentasi, 200);
    }

    // Tambahkan dokumentasi sekolah baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'path_dokumentasi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dokumentasi = DokumentasiSekolah::create($validator->validated());

        return response()->json($dokumentasi, 201);
    }

    // Tampilkan dokumentasi sekolah berdasarkan ID
    public function show($id)
    {
        $dokumentasi = DokumentasiSekolah::find($id);

        if (!$dokumentasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($dokumentasi, 200);
    }

    // Update dokumentasi sekolah
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'path_dokumentasi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dokumentasi = DokumentasiSekolah::find($id);

        if (!$dokumentasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $dokumentasi->update($validator->validated());

        return response()->json($dokumentasi, 200);
    }

    // Hapus dokumentasi sekolah
    public function destroy($id)
    {
        $dokumentasi = DokumentasiSekolah::find($id);

        if (!$dokumentasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $dokumentasi->delete();

        return response()->json(['message' => 'Dokumentasi berhasil dihapus'], 200);
    }
}
