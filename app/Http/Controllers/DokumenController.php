<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokumen;

/**
 * @group Dokumen management
 *
 * APIs for managing documents
 */
class DokumenController extends Controller
{
    /**
     * Get all documents
     * @queryParam jenis_dokumen_id integer Filter by jenis dokumen id.
     */
    public function index(Request $request)
    {
        // This is added due to pagination needs
        $jenisDokumenId = $request->query('jenis_dokumen_id');

        if ($jenisDokumenId) {
            $dokumen = Dokumen::where('jenis_dokumen_id', $jenisDokumenId)->paginate(10);
        } else {
            $dokumen = Dokumen::paginate(10);
        }

        return response()->json($dokumen);
    }

    /**
     * Create a new document
     *
     * @bodyParam nama_panduan string required Document name.
     * @bodyParam deskripsi string Document description.
     * @bodyParam jenis_dokumen_id integer required Document type id.
     * @bodyParam image_path string Document image path.
     * @bodyParam dokumen_link string Document link.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_panduan' => 'required|string|max:255',
            'deskripsi' => 'string|nullable',
            'jenis_dokumen_id' => 'required|exists:jenis_dokumen,id',
            'image_path' => 'string|nullable',
            'dokumen_link' => 'string|nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dokumen = Dokumen::create($request->all());
        return response()->json($dokumen, 201);
    }

    public function show($id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        return response()->json($dokumen);
    }

    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_panduan' => 'required|string|max:255',
            'deskripsi' => 'string|nullable',
            'jenis_dokumen_id' => 'required|exists:jenis_dokumen,id',
            'image_path' => 'string|nullable',
            'dokumen_link' => 'string|nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dokumen->update($request->all());

        return response()->json($dokumen, 200);
    }

    public function destroy($id)
    {
        Dokumen::destroy($id);
        return response()->json(null, 204);
    }
}
