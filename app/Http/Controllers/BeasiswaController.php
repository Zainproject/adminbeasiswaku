<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\PenyediaBeasiswa;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswa = Beasiswa::all();
        return view('DataBeasiswa.beasiswa', compact('beasiswa'));
    }

    public function create()
    {
        $penyedia = PenyediaBeasiswa::all();
        return view('DataBeasiswa.tambah', compact('penyedia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa'       => 'required|string|max:255',
            'deskripsi'           => 'nullable|string',
            'tanggal_mulai'       => 'required|date',
            'tanggal_selesai'     => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah_penerima'     => 'required|integer|min:1',
            'status'              => 'required|string',
            'penyediabeasiswa_id' => 'required|exists:penyediabeasiswa,id',
        ]);

        Beasiswa::create($request->all());

        return redirect()->route('beasiswa.index')
            ->with('success', 'Data beasiswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('DataBeasiswa.show', compact('beasiswa'));
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $penyediaList = Penyediabeasiswa::all();

        return view('DataBeasiswa.edit', compact('beasiswa', 'penyediaList'));
    }

    public function update(Request $request, $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->all());

        return redirect()->route('beasiswa.index')
            ->with('success', 'Data beasiswa berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('beasiswa.index')
            ->with('success', 'Data beasiswa berhasil dihapus.');
    }
}
