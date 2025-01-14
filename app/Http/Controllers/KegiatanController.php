<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image',
            'lokasi' => 'required',
        ]);

        $path = $request->file('foto')->store('kegiatan', 'public');

        $kegiatan = new Kegiatan($request->all());
        $kegiatan->foto = $path;
        $kegiatan->user_id = auth()->id();
        $kegiatan->save();

        return redirect()->route('admins.index')->with('success', 'Kegiatan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'sometimes|image',
            'lokasi' => 'required',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update(array_merge(
            $request->all(),
            ['user_id' => auth()->id()]
        ));

        return redirect()->route('admins.index')->with('success', 'Kegiatan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('admins.index')->with('success', 'Kegiatan deleted successfully.');
    }
}
