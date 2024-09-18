<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProfilSekolahResource;
use App\Http\Resources\ProfilSekolahCollection;
use Illuminate\Support\Str;

/**
 * @group Profil Sekolah management
 *
 * APIs for managing school profiles
 */
class ProfilSekolahController extends Controller
{
    protected $validationRules = [
        'kapita_id' => 'required|exists:jml_kapita_sekolah,id',
        'fasilitas_id' => 'required|exists:fasilitas_sekolah,id',
        'nama_sekolah' => 'required|string|max:100|unique:profil_sekolah',
        'NPSN' => 'required|string|size:8|unique:profil_sekolah',
        'alamat' => 'required|string',
        'kecamatan' => 'required|string|max:25',
        'jenjang_id' => 'required|exists:jenjang_sekolah,id',
        'no_telepon' => 'required|string|max:15|unique:profil_sekolah',
        'email' => 'nullable|string|email|max:50|unique:profil_sekolah',
        'link_website' => 'nullable|string|max:255',
        'nama_kontak_person' => 'required|string|max:30',
        'jabatan' => 'required|string|max:25',
    ];

    // Tampilkan daftar profil sekolah dengan pagination dan caching
    // public function index(Request $request)
    // {
    //     $page = $request->input('page', 1); // Mendapatkan nomor halaman dari query string, default 1
    //     $perPage = $request->input('per_page', 10); // Jumlah item per halaman, default 10

    //     $cacheKey = "profilSekolah_page_{$page}_perPage_{$perPage}";

    //     $profilSekolah = Cache::remember($cacheKey, 60 * 60, function () use ($page, $perPage) {
    //         return ProfilSekolah::with(['kapita', 'fasilitas', 'jenjang'])
    //             ->paginate($perPage, ['*'], 'page', $page);
    //     });

    //     return new ProfilSekolahCollection($profilSekolah);
    // }

    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page');

            if ($perPage) {
                return ProfilSekolah::with(['kapita', 'fasilitas', 'jenjang', 'dokumentasi'])->paginate($perPage);
            }

            return ProfilSekolah::with(['kapita', 'fasilitas', 'jenjang', 'dokumentasi'])->get();
        } catch (\Throwable $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Generate slug secara otomatis dengan UUID atau string acak lainnya
        $profilSekolahData = $validator->validated();
        $profilSekolahData['slug'] = Str::uuid(); // Menggunakan UUID sebagai slug

        $profilSekolah = ProfilSekolah::create($profilSekolahData);

        Cache::forget('profilSekolah');

        return new ProfilSekolahResource($profilSekolah);
    }

    public function show($slug)
    {
        $profilSekolah = ProfilSekolah::with(['kapita', 'fasilitas', 'jenjang', 'dokumentasi'])
            ->where('slug', $slug)
            ->first();

        if (!$profilSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return new ProfilSekolahResource($profilSekolah);
    }

    public function update(Request $request, $slug)
    {
        $profilSekolah = ProfilSekolah::where('slug', $slug)->first();

        if (!$profilSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), array_merge(
            $this->validationRules,
            [
                'nama_sekolah' => 'sometimes|string|max:100|unique:profil_sekolah,nama_sekolah,' . $profilSekolah->id,
                'NPSN' => 'sometimes|string|size:8|unique:profil_sekolah,NPSN,' . $profilSekolah->id,
                'no_telepon' => 'sometimes|string|max:15|unique:profil_sekolah,no_telepon,' . $profilSekolah->id,
                'email' => 'sometimes|string|email|max:50|unique:profil_sekolah,email,' . $profilSekolah->id,
            ]
        ));

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $profilSekolahData = $validator->validated();
        // Update slug dengan nilai baru yang acak (opsional)
        $profilSekolahData['slug'] = Str::uuid();

        $profilSekolah->update($profilSekolahData);

        Cache::forget('profilSekolah');

        return new ProfilSekolahResource($profilSekolah);
    }

    public function destroy($slug)
    {
        $profilSekolah = ProfilSekolah::where('slug', $slug)->first();

        if (!$profilSekolah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $profilSekolah->delete();

        Cache::forget('profilSekolah');

        return response()->json(['message' => 'Profil sekolah berhasil dihapus'], 200);
    }
}
