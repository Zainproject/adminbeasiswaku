<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyediaBeasiswa;
use Illuminate\Support\Facades\Auth; // tambahkan ini

class PenyediaBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyedia = PenyediaBeasiswa::all();
        return view('PenyediaBeasiswa.penyedia', compact('penyedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PenyediaBeasiswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'alamat'        => 'nullable|string|max:255',
            'kontak'        => 'nullable|string|max:100',
        ]);

        PenyediaBeasiswa::create($request->all());

        return redirect()->route('penyediabeasiswa.index')
            ->with('success', 'Data penyedia beasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penyediabeasiswa = PenyediaBeasiswa::findOrFail($id);
        return view('PenyediaBeasiswa.show', compact('penyediabeasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyediabeasiswa = PenyediaBeasiswa::findOrFail($id);
        return view('PenyediaBeasiswa.edit', compact('penyediabeasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'alamat'        => 'nullable|string|max:255',
            'kontak'        => 'nullable|string|max:100',
        ]);

        $penyediabeasiswa = PenyediaBeasiswa::findOrFail($id);
        $penyediabeasiswa->update($request->all());

        return redirect()->route('penyediabeasiswa.index')
            ->with('success', 'Data penyedia beasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyediabeasiswa = PenyediaBeasiswa::findOrFail($id);
        $penyediabeasiswa->delete();

        return redirect()->route('penyediabeasiswa.index')
            ->with('success', 'Data penyedia beasiswa berhasil dihapus.');
    }

    /**
     * User dashboard for penyedia role.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $penyedia = PenyediaBeasiswa::where('user_id', $user->id)->first();
        return view('layout.main', compact('penyedia'));
    }

    /**
     * Show profile for the authenticated penyedia.
     */
    public function profil()
    {
        $user = Auth::user();
        $penyedia = PenyediaBeasiswa::with('user')->where('user_id', $user->id)->first();
        return view('PenyediaBeasiswa.show', compact('penyedia')); // konsisten huruf besar
    }
}
