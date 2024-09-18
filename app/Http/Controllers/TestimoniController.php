<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Testimoni management
 *
 * APIs for managing testimonials
 */
class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();
        return response()->json($testimoni);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_testimoni' => 'required|string|max:50',
            'body' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $testimoni = Testimoni::create($request->all());
        return response()->json($testimoni, 201);
    }

    public function show($id)
    {
        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($testimoni);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_testimoni' => 'required|string|max:50',
            'body' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $testimoni->update($request->all());
        return response()->json($testimoni);
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $testimoni->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
