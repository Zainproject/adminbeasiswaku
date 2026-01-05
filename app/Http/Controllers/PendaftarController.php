<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::with('user')->get();
        return view('DataPendaftar.pendaftar', compact('pendaftar'));
    }

    public function create()
    {
        return view('DataPendaftar.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'nim'            => 'required|string|max:50|unique:pendaftar,nim',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6|confirmed',
            'program_studi'  => 'required|string|max:100',
            'universitas'    => 'required|string|max:150',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'no_hp'          => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name'     => $request->nama_lengkap,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Pendaftar::create([
            'user_id'       => $user->id,
            'nim'           => $request->nim,
            'nama_lengkap'  => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'universitas'   => $request->universitas,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
        ]);

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pendaftar = Pendaftar::with('user')->findOrFail($id);
        return view('DataPendaftar.edit', compact('pendaftar'));
    }

    public function edit(string $id)
    {
        $pendaftar = Pendaftar::with('user')->findOrFail($id);
        return view('DataPendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, string $id)
    {
        $pendaftar = Pendaftar::with('user')->findOrFail($id);

        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'nim'            => 'required|string|max:50|unique:pendaftar,nim,' . $pendaftar->id,
            'program_studi'  => 'required|string|max:100',
            'universitas'    => 'required|string|max:150',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'no_hp'          => 'nullable|string|max:20',
            'email'          => 'required|email|unique:users,email,' . ($pendaftar->user->id ?? 'NULL'),
            'password'       => 'nullable|min:6',
        ]);

        $pendaftar->update($request->only([
            'nim',
            'nama_lengkap',
            'program_studi',
            'universitas',
            'tanggal_lahir',
            'alamat',
            'no_hp'
        ]));

        if ($pendaftar->user) {
            $pendaftar->user->name  = $request->nama_lengkap;
            $pendaftar->user->email = $request->email;

            if ($request->filled('password')) {
                $pendaftar->user->password = Hash::make($request->password);
            }

            $pendaftar->user->save();
        }

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $pendaftar = Pendaftar::with('user')->findOrFail($id);

        if ($pendaftar->user) {
            $pendaftar->user->delete();
        }

        $pendaftar->delete();

        return redirect()->route('pendaftar.index')
            ->with('success', 'Data pendaftar beserta akun user berhasil dihapus.');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();
        return view('layout.main', compact('pendaftar'));
    }

    public function profil()
    {
        $user = Auth::user();
        $pendaftar = Pendaftar::with('user')->where('user_id', $user->id)->first();
        return view('DataPendaftar.show', compact('pendaftar'));
    }
}
