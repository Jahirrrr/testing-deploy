<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * @group Fasilitas Sekolah management
 *
 * APIs for managing school facilities
 */
class FasilitasSekolahController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasSekolah::all();
        return response()->json($fasilitas);
    }

    public function store(Request $request)
    {
        // Debugging: Log data request untuk memverifikasi
        Log::info($request->all());

        $validator = Validator::make($request->all(), [
            'fasilitas_pendukung' => 'required|string|max:255',
            'dukungan_untuk_siswa' => 'required|string|max:255',
            'kegiatan_lainnya' => 'required|string|max:255',
            'dokumentasi' => 'required|string|max:255',
            'kualifikasi_yang_dimiliki' => 'required|string',
            'dokumentasi_fasilitas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fasilitas = FasilitasSekolah::create($validator->validated());

        return response()->json($fasilitas, 201);
    }



    public function update(Request $request, $id)
    {
        // Perbaiki typo pada 'somemtimes' menjadi 'sometimes'
        $validator = Validator::make($request->all(), [
            'fasilitas_pendukung' => 'sometimes|string|max:255',
            'dukungan_untuk_siswa' => 'sometimes|string|max:255',
            'kegiatan_lainnya' => 'sometimes|string|max:255',
            'dokumentasi' => 'sometimes|string|max:255',
            'kualifikasi_yang_dimiliki' => 'sometimes|string',
            'dokumentasi_fasilitas' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Temukan data FasilitasSekolah berdasarkan id
        $fasilitas = FasilitasSekolah::findOrFail($id);

        // Update hanya data yang divalidasi dan dikirim dalam request
        $fasilitas->update($validator->validated());

        return response()->json($fasilitas);
    }


    public function destroy($id)
    {
        $fasilitas = FasilitasSekolah::findOrFail($id);
        $fasilitas->delete();

        return response()->json(null, 204);
    }
}
