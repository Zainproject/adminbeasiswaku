<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pendaftar;

class SesiController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'      => 'required|string|unique:pendaftar,nim',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        Pendaftar::create([
            'user_id'       => $user->id,
            'nim'           => $request->nim,
            'nama_lengkap'  => $request->name,
            'universitas'   => 'Belum diisi',
            'program_studi' => 'Belum diisi',
            'tanggal_lahir' => null,
            'alamat'        => 'Belum diisi',
            'no_hp'         => 'Belum diisi',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function show(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect('/index')->with('success', 'Login berhasil sebagai Admin!');
            } elseif ($role === 'admin1') {
                return redirect('/index')->with('success', 'Login berhasil sebagai Admin1!');
            } elseif ($role === 'user') {
                return redirect('/index')->with('success', 'Login berhasil sebagai User!');
            } else {
                return redirect('/index')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
