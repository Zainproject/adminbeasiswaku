<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proses;
use App\Models\Pendaftar;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\Auth;

class ProsesController extends Controller
{
    public function index()
    {
        $proses = Proses::with(['pendaftar', 'beasiswa'])->get();
        return view('Proses.proses', compact('proses'));
    }

    public function create()
    {
        $beasiswa = Beasiswa::all();

        if (Auth::check() && Auth::user()->role === 'pendaftar') {
            $pendaftar = Pendaftar::where('user_id', Auth::id())->get();
        } else {
            $pendaftar = Pendaftar::all();
        }

        return view('Proses.tambah', compact('pendaftar', 'beasiswa'));
    }

    public function store(Request $request)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['pendaftar', 'penyedia'])) {
            if (Auth::user()->role === 'pendaftar') {
                $pendaftar = Pendaftar::where('user_id', Auth::id())->first();
            } elseif (Auth::user()->role === 'penyedia') {
                $pendaftar = Pendaftar::where('user_id', Auth::id())->first();
            }

            if (!$pendaftar) {
                return back()->withErrors([
                    'pendaftar_id' => 'Profil pendaftar tidak ditemukan. Silakan lengkapi profil terlebih dahulu.'
                ]);
            }

            $request->validate([
                'beasiswa_id'  => 'required|exists:beasiswa,id',
                'status'       => 'required|string',
            ]);

            Proses::create([
                'pendaftar_id' => $pendaftar->id,
                'beasiswa_id'  => $request->beasiswa_id,
                'status'       => $request->status,
            ]);
        } else {
            $request->validate([
                'pendaftar_id' => 'required|exists:pendaftar,id',
                'beasiswa_id'  => 'required|exists:beasiswa,id',
                'status'       => 'required|string',
            ]);

            Proses::create($request->all());
        }

        return redirect()->route('proses.index')
            ->with('success', 'Proses pendaftaran berhasil.');
    }

    public function show(string $id)
    {
        $proses = Proses::with(['pendaftar', 'beasiswa'])->findOrFail($id);
        return view('Proses.show', compact('proses'));
    }

    public function edit(string $id)
    {
        $proses = Proses::findOrFail($id);
        $pendaftar = Pendaftar::all();
        $beasiswa = Beasiswa::all();
        return view('Proses.edit', compact('proses', 'pendaftar', 'beasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'beasiswa_id'  => 'required|exists:beasiswa,id',
            'status'       => 'required|string',
        ]);

        $proses = Proses::findOrFail($id);
        $proses->update($request->all());

        return redirect()->route('proses.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $proses = Proses::findOrFail($id);
        $proses->delete();

        return redirect()->route('proses.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
