<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index(Request $request)
    {
        // Filter by user_id
        if ($request->has('user_id')) {
            return response()->json(
                Catatan::where('user_id', $request->user_id)->get()
            );
        }

        return response()->json(Catatan::all());
    }

    public function show($id)
    {
        return response()->json(Catatan::find($id));
    }

    public function store(Request $request)
    {
        $catatan = Catatan::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'user_id' => $request->user_id,
        ]);

        return response()->json($catatan);
    }

    public function update(Request $request, $id)
    {
        $catatan = Catatan::find($id);

        if (!$catatan) {
            return response()->json(['message' => 'Catatan tidak ditemukan'], 404);
        }

        $catatan->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'user_id' => $request->user_id ?? $catatan->user_id,
        ]);

        return response()->json($catatan);
    }

    public function destroy($id)
    {
        $catatan = Catatan::find($id);

        if (!$catatan) {
            return response()->json(['message' => 'Catatan tidak ditemukan'], 404);
        }

        $catatan->delete();

        return response()->json(['message' => 'Catatan berhasil dihapus']);
    }
}
