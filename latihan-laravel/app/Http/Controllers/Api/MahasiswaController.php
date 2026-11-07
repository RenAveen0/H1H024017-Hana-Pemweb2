<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\JsonResponse;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $kueri = Mahasiswa::query()->with('programStudi');
        if ($request->filled('cari')) {
            $kataKunci = $request->query('cari');
            $kueri->where(function ($sub) use ($kataKunci) {
                $sub->where('nama', 'like', '%' . $kataKunci . '%')
                ->orWhere('nim', 'like', '%' . $kataKunci . '%');
            });
        }
        if ($request->filled('angkatan')) {
            $kueri->where('angkatan', $request->integer('angkatan'));
        }
        if ($request->filled('program_studi_id')) {
            $kueri->where('program_studi_id', $request->integer('program_studi_id'));
        }
        $urutan = $request->query('urut', 'nama');
        $arah = $request->query('arah', 'asc');
        $kolomDiizinkan = ['nama', 'nim', 'angkatan', 'ipk'];
        if (in_array($urutan, $kolomDiizinkan, true)) {
            $kueri->orderBy($urutan, $arah === 'desc' ? 'desc' : 'asc');
        }
        $perHalaman = min($request->integer('per_halaman', 10), 100);
        return MahasiswaResource::collection($kueri->paginate($perHalaman));
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'program_studi_id' => ['required', 'exists:program_studis,id'],
            'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas,nim'],
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:mahasiswas,email'],
            'angkatan' => ['required', 'integer'],
            'ipk' => ['required', 'numeric', 'min:0', 'max:4'],
        ]);

        $mahasiswa = Mahasiswa::create($validatedData);

        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $mahasiswa
        ], 201);
    }
    public function show(Mahasiswa $mahasiswa): JsonResponse
    {
        $mahasiswa->load('programStudi');
        return response()->json([
            'sukses' => true,
            'data' => new MahasiswaResource($mahasiswa),
        ]);
    }
    
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa): JsonResponse
    {
        $mahasiswa->update($request->validated());
        $mahasiswa->load('programStudi');
        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mahasiswa berhasil diperbarui',
            'data' => new MahasiswaResource($mahasiswa),
        ]);
    }

    public function destroy(Mahasiswa $mahasiswa): JsonResponse
    {
        $mahasiswa->delete();
        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mahasiswa berhasil dihapus',
        ]);
    }
}