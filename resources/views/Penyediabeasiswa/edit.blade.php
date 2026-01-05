@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit</strong> Penyedia Beasiswa</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Edit Penyedia Beasiswa</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penyediabeasiswa.update', $penyediabeasiswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                                    <input type="text" class="form-control @error('nama_penyedia') is-invalid @enderror"
                                        id="nama_penyedia" name="nama_penyedia"
                                        value="{{ old('nama_penyedia', $penyediabeasiswa->nama_penyedia) }}" required>
                                    @error('nama_penyedia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $penyediabeasiswa->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Kontak</label>
                                    <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                                        id="kontak" name="kontak"
                                        value="{{ old('kontak', $penyediabeasiswa->kontak) }}">
                                    @error('kontak')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('penyediabeasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
