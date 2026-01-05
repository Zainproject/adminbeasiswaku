@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Tambah</strong> Pendaftar</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Tambah Pendaftar</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penyediabeasiswa.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                                    <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia"
                                        value="{{ old('nama_penyedia') }}" required>
                                    @error('nama_penyedia')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Kontak</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak"
                                        value="{{ old('kontak') }}">
                                    @error('kontak')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('penyediabeasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
