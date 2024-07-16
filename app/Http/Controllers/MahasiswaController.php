<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.mahasiswa.index');
        

        // $nim = Mahasiswa::createCode();
        // $kode_kelas = Kelas::all();
        // return view('pages.mahasiswa.index', compact('nim'))->with([
        //     'kelas' => $kelas
        // ]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nim' => $request->input('nim'),
            'nik' => $request->input('nik'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jk' => $request->input('jk'),
            'dusun' => $request->input('dusun'),
            'rtrw' => $request->input('rtrw'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'nik' => $request->input('nik'),
            'nik' => $request->input('nik'),
            'nik' => $request->input('nik'),
        ];

        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
