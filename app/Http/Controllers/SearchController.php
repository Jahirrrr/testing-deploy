<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\JenisInformasi;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @group Search management
 *
 * APIs for managing search
 */
class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     // Ambil query pencarian dari parameter request
    //     $query = $request->input('query');

    //     // Jika query tidak ada, kembalikan error
    //     if (!$query) {
    //         return response()->json(['message' => 'Query pencarian tidak boleh kosong.'], 400);
    //     }

    //     // Pagination parameter
    //     $limit = $request->input('limit', 5); // Default 5 items per page

    //     // Pencarian di tabel Informasi berdasarkan judul atau body, dan include relasi jenis informasi
    //     $informasiResults = Informasi::select('id', 'judul')
    //         ->where('judul', 'like', '%' . $query . '%')
    //         ->with('jenisInformasi:id,nama_jenis')
    //         ->orWhere('body', 'like', '%' . $query . '%')
    //         // ->limit($limit)
    //         ->get();

    //     // Pencarian di tabel JenisInformasi berdasarkan nama_jenis, dan include relasi informasi
    //     // $jenisInformasiResults = JenisInformasi::select('id', 'nama_jenis')
    //     //     ->with([
    //     //         'informasi' => function ($query) {
    //     //             $query->select('id', 'judul', 'jenis_id');
    //     //         }
    //     //     ])
    //     //     ->where('nama_jenis', 'like', '%' . $query . '%')
    //     //     ->limit($limit)
    //     //     ->get();

    //     // Pencarian di tabel ProfilSekolah berdasarkan nama_sekolah atau kecamatan, dan include relasi kapita, fasilitas, jenjang
    //     $profilSekolahResults = ProfilSekolah::select('slug', 'nama_sekolah')
    //         ->where('nama_sekolah', 'like', '%' . $query . '%')
    //         ->orWhere('kecamatan', 'like', '%' . $query . '%')
    //         ->orWhere('nama_kontak_person', 'like', '%' . $query . '%')
    //         // ->with([
    //         //     'kapita:id,jml_guru,jml_guru_pendidikan_khusus,jml_peserta_didik,jml_peserta_didik_disabilitas,jml_netra,jml_rungu,jml_wicara,jml_daska,jml_lumpuh_layu,jml_paraplegi,jml_celebral_palsy,jml_kesulitan_belajar,jml_autis,jml_hiperaktif,jml_rungu_wicara,jml_netra_rungu,jml_lainnya',
    //         //     'fasilitas:id,fasilitas_pendukung,dukungan_untuk_siswa,kegiatan_lainnya,dokumentasi,dokumentasi_fasilitas',
    //         //     'jenjang:id,nama_jenjang'
    //         // ])
    //         // ->limit($limit)
    //         ->get();

    //     $result = $profilSekolahResults->merge($informasiResults);

    //     // Gabungkan semua hasil pencarian dengan struktur data yang jelas
    //     return response()->json([
    //         'result' => $result
    //     ]);
    // }


    public function search(Request $request)
    {
        try {
            $query = request()->input('query');

            Log::info($query);
            if (strlen($query) === 0) {
                return response()->json(['message' => 'Query pencarian tidak boleh kosong.'], 400);
            }

            $informasiResults = Informasi::select('id', 'judul')
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', '%' . $query . '%')
                        ->orWhere('body', 'like', '%' . $query . '%');
                })
                ->limit(10)
                ->get();

            $profilSekolahResults = ProfilSekolah::select('slug', 'nama_sekolah')
                ->where(function ($q) use ($query) {
                    $q->where('nama_sekolah', 'like', '%' . $query . '%')
                        ->orWhere('kecamatan', 'like', '%' . $query . '%')
                        ->orWhere('nama_kontak_person', 'like', '%' . $query . '%');
                })
                ->limit(10)
                ->get();

        // Pencarian di tabel JenisInformasi berdasarkan nama_jenis, dan include relasi informasi
            // $jenisInformasiResults = JenisInformasi::select('id', 'nama_jenis')
            //     ->with(['informasi' => function($query) {
            //         $query->select('id', 'judul', 'jenis_id');
            //     }])
            //     ->where('nama_jenis', 'like', '%' . $query . '%')
            //     ->paginate($limit);

            $result = $profilSekolahResults->union($informasiResults);

            return response()->json($result);
        } catch (\Throwable $e) {
            return response()->json($e->getMessage());
        }

    }

}

