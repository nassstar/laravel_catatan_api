<?php

use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/catatan', function (Request $request) {
    $data = Catatan::get();

    return response()->json($data);
});

Route::post('/catatan', function (Request $request) {
    $catatan = new Catatan();
    $catatan->judul = $request->input('judul');
    $catatan->isi = $request->input('isi');
    $catatan->save();

    return response()->json($catatan);
});

Route::get('/catatan/{id}', function ($id) {
    $catatan = Catatan::find($id);

    return response()->json($catatan);
});

Route::put('/catatan/{id}', function (Request $request, $id) {
    $catatan = Catatan::find($id);

    if ($catatan) {
        $catatan->judul = $request->input('judul');
        $catatan->isi = $request->input('isi');
        $catatan->save();
    } else {
        return response()->json([
            'message' => 'Catatan yang ingin di update tidak ada'
        ], 404);
    }

    return response()->json($catatan);
});

Route::delete('/catatan/{id}', function ($id) {
    $catatan = Catatan::find($id);

    if ($catatan) {
        $catatan->delete();
    } else {
        return response()->json([
            'message' => 'Catatan yang ingin dihapus tidak ada'
        ], 404);
    }

    return response()->json([
        'message' => 'Catatan berhasil dihapus'
    ]);
});

// bikin api untuk user
// crud user, kemudian maping catatan ke user tertentu
// modifikasi crud catatan dengan menambahkan user sebagai pemilik catatan
