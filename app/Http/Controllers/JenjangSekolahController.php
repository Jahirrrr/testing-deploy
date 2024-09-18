<?php

namespace App\Http\Controllers;

use App\Models\JenjangSekolah;
use Illuminate\Http\Request;

/**
 * @group Jenjang Sekolah management
 *
 * APIs for managing school levels
 */
class JenjangSekolahController extends Controller
{
    public function index()
    {
        $jenjangSekolah = JenjangSekolah::withCount('profilSekolah')->get();
        return response()->json($jenjangSekolah);
    }

    public function showByName($name)
    {
        try {
            $per_page = request()->query('per_page', 10);
            $jenjangSekolah = JenjangSekolah::where('nama_jenjang', $name)->firstOrFail();
            $profilSekolah = $jenjangSekolah->profilSekolah()->paginate($per_page);

            return response()->json([$jenjangSekolah ,$profilSekolah]);
        } catch (\Throwable $e) {
            return response($e->getMessage(), 500);
        }
    }
}
