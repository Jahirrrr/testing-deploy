<?php

namespace App\Http\Controllers;

use App\Models\JmlKapitaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Jumlah Kapita Sekolah management
 *
 * APIs for managing school capita numbers
 */
class JmlKapitaSekolahController extends Controller
{
    /**
     * Menampilkan semua data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = JmlKapitaSekolah::all();
        return response()->json($data);
    }

    /**
     * Menyimpan data baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jml_guru' => 'required|integer',
            'jml_guru_pendidikan_khusus' => 'required|integer',
            'jml_peserta_didik' => 'required|integer',
            'jml_peserta_didik_disabilitas' => 'required|integer',
            'jml_netra' => 'required|integer',
            'jml_rungu' => 'required|integer',
            'jml_wicara' => 'required|integer',
            'jml_daska' => 'required|integer',
            'jml_lumpuh_layu' => 'required|integer',
            'jml_paraplegi' => 'required|integer',
            'jml_celebral_palsy' => 'required|integer',
            'jml_kesulitan_belajar' => 'required|integer',
            'jml_autis' => 'required|integer',
            'jml_hiperaktif' => 'required|integer',
            'jml_rungu_wicara' => 'required|integer',
            'jml_netra_rungu' => 'required|integer',
            'jml_lainnya' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kapitaSekolah = JmlKapitaSekolah::create($request->all());
        return response()->json($kapitaSekolah, 201);
    }

    /**
     * Menampilkan detail data berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $kapitaSekolah = JmlKapitaSekolah::find($id);

        if (!$kapitaSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($kapitaSekolah);
    }

    /**
     * Mengupdate data berdasarkan ID.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jml_guru' => 'required|integer',
            'jml_guru_pendidikan_khusus' => 'required|integer',
            'jml_peserta_didik' => 'required|integer',
            'jml_peserta_didik_disabilitas' => 'required|integer',
            'jml_netra' => 'required|integer',
            'jml_rungu' => 'required|integer',
            'jml_wicara' => 'required|integer',
            'jml_daska' => 'required|integer',
            'jml_lumpuh_layu' => 'required|integer',
            'jml_paraplegi' => 'required|integer',
            'jml_celebral_palsy' => 'required|integer',
            'jml_kesulitan_belajar' => 'required|integer',
            'jml_autis' => 'required|integer',
            'jml_hiperaktif' => 'required|integer',
            'jml_rungu_wicara' => 'required|integer',
            'jml_netra_rungu' => 'required|integer',
            'jml_lainnya' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kapitaSekolah = JmlKapitaSekolah::find($id);

        if (!$kapitaSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $kapitaSekolah->update($request->all());
        return response()->json($kapitaSekolah);
    }

    /**
     * Menghapus data berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $kapitaSekolah = JmlKapitaSekolah::find($id);

        if (!$kapitaSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $kapitaSekolah->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
