<?php

namespace App\Http\Controllers;

use App\Models\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group Jenis Dokumen management
 *
 * APIs for managing document types
 */
class JenisDokumenController extends Controller
{
    public function index()
    {
        $jenisDokumen = JenisDokumen::all();
        return response()->json($jenisDokumen);
    }

    public function store(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required|string|max:255',
        ]);

        // If validation fails, return a 422 Unprocessable Entity response with validation errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create and return the new record
        $jenisDokumen = JenisDokumen::create($request->only(['nama_jenis']));
        return response()->json([
            'success' => true,
            'message' => 'Jenis dokumen berhasil dibuat!',
            'data' => $jenisDokumen,
        ], 201);
    }

    public function show($id)
    {
        try {
            $jenisDokumen = JenisDokumen::findOrFail($id); // Use findOrFail to handle not found
            return response()->json([
                'success' => true,
                'data' => $jenisDokumen
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis dokumen tidak ditemukan!'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required|string|max:50',

        ]);

        // If validation fails, return a 422 Unprocessable Entity response with validation errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $jenisDokumen = JenisDokumen::findOrFail($id); // Use findOrFail to handle not found
            $jenisDokumen->update($request->only(['nama_dokumen']));
            return response()->json([
                'success' => true,
                'message' => 'Jenis dokumen berhasil diperbarui!',
                'data' => $jenisDokumen,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis dokumen tidak ditemukan!'
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $jenisDokumen = JenisDokumen::findOrFail($id); // Use findOrFail to handle not found
            $jenisDokumen->delete();
            return response()->json([
                'success' => true,
                'message' => 'Jenis dokumen berhasil dihapus!'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis dokumen tidak ditemukan!'
            ], 404);
        }
    }
}
