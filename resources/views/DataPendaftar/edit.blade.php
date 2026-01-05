@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit</strong> Pendaftar</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Edit Pendaftar</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ $pendaftar->nama_lengkap }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        value="{{ $pendaftar->nim }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $pendaftar->user->email ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                </div>
                                <div class="mb-3">
                                    <label for="program_studi" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="program_studi" name="program_studi"
                                        value="{{ $pendaftar->program_studi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="universitas" class="form-label">Universitas</label>
                                    <input type="text" class="form-control" id="universitas" name="universitas"
                                        value="{{ $pendaftar->universitas ?? 'UTA' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ $pendaftar->tanggal_lahir }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pendaftar->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $pendaftar->no_hp }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
