<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\InformasiResource;
use App\Http\Resources\InformasiCollection;

/**
 * @group Informasi management
 *
 * APIs for managing information
 */
class InformasiController extends Controller
{
    // Tampilkan daftar informasi dengan caching dan pagination
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of items per page
        $dataInformasi = Informasi::with('jenisInformasi')->paginate($perPage);

        return $dataInformasi;
    }

    // Tambahkan informasi baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_id' => 'required|exists:jenis_informasi,id',
            'gambar' => 'nullable|string|max:255',
            'judul' => 'required|string|max:50',
            'body' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $informasi = Informasi::create($request->all());

        // Hapus cache untuk semua halaman
        Cache::forget('informasi_list_page_1_per_page_15'); // Adjust as needed
        Cache::forget('informasi_list_page_2_per_page_15'); // Adjust as needed
        // Add more cache key patterns if you use different per_page values

        return new InformasiResource($informasi);
    }

    // Tampilkan informasi berdasarkan ID
    public function show($id)
    {
        $informasi = Informasi::with('jenisInformasi')->find($id);

        if (!$informasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return new InformasiResource($informasi);
    }

    // Update informasi
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_id' => 'required|exists:jenis_informasi,id',
            'gambar' => 'nullable|string|max:255',
            'judul' => 'required|string|max:50',
            'body' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $informasi = Informasi::find($id);

        if (!$informasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $informasi->update($request->all());

        // Hapus cache untuk semua halaman
        Cache::forget('informasi_list_page_1_per_page_15'); // Adjust as needed
        Cache::forget('informasi_list_page_2_per_page_15'); // Adjust as needed

        return new InformasiResource($informasi);
    }

    // Hapus informasi
    public function destroy($id)
    {
        $informasi = Informasi::find($id);

        if (!$informasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $informasi->delete();

        // Hapus cache untuk semua halaman
        Cache::forget('informasi_list_page_1_per_page_15'); // Adjust as needed
        Cache::forget('informasi_list_page_2_per_page_15'); // Adjust as needed

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
