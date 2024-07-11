<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kode_jurusan = Jurusan::createCode();
        return view('pages.jurusan.index', compact('kode_jurusan'));
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
            'kode_jurusan' => $request->input('kode_jurusan'),
            'jurusan' => $request->input('jurusan')
        ];

        Jurusan::create($data);
        return redirect()->route('jurusan.index');
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
        $data = [
            'kode_jurusan' => $request->input('kode_jurusan'),
            'jurusan' => $request->input('jurusan'),
        ];

        $jurusan = jurusan::findOrFail($id);

        $jurusan->update($data);

        return redirect()
            ->route('jurusan.index')
            ->with('message', 'Data Jurusan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return back()->with('message_delete', 'Data Jurusan Sudah dihapus');
    }
}
