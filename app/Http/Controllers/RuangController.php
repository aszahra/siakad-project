<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kode_ruang = Ruang::createCode();
        return view('pages.ruang.index', compact('kode_ruang'));
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
            'kode_ruang' => $request->input('kode_ruang'),
            'ruang' => $request->input('ruang')
        ];

        Ruang::create($data);
        return redirect()->route('ruang.index');
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
            'kode_ruang' => $request->input('kode_ruang'),
            'ruang' => $request->input('ruang'),
        ];

        $ruang = Ruang::findOrFail($id);

        $ruang->update($data);

        return redirect()
            ->route('ruang.index')
            ->with('message', 'Data Ruang Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();
        return back()->with('message_delete', 'Data Ruang Sudah dihapus');
    }
}
