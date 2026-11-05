<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function mahasiswa(Request $request, $id): JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $prodi = \App\Models\ProgramStudi::findOrFail($id);
        $perHalaman = min($request->integer('per_halaman', 10), 100);
        $mahasiswas = $prodi->mahasiswas()->paginate($perHalaman);

        return \App\Http\Resources\MahasiswaResource::collection($mahasiswas);
    }
}
