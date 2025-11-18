<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    // GET /api/catatan?user_id=123
    public function index(Request $request)
    {
        $query = Catatan::query()->with('user');

        // filter by user_id if provided
        if ($request->has('user_id')) {
            $query->where('user_id', $request->query('user_id'));
        }

        $catatan = $query->latest()->paginate(15);
        return response()->json($catatan);
    }

    // POST /api/catatan
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
        ]);

        $catatan = Catatan::create($data);
        return response()->json($catatan, 201);
    }

    // GET /api/catatan/{id}
    public function show($id)
    {
        $catatan = Catatan::with('user')->findOrFail($id);
        return response()->json($catatan);
    }

    // PUT /api/catatan/{id}
    public function update(Request $request, $id)
    {
        $catatan = Catatan::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'judul' => 'sometimes|required|string|max:255',
            'isi' => 'nullable|string',
        ]);

        $catatan->update($data);
        return response()->json($catatan);
    }

    // DELETE /api/catatan/{id}
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();
        return response()->json(['message' => 'Catatan deleted']);
    }
}
