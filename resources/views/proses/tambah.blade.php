@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Tambah</strong> Pendaftar</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Tambah Proses</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('proses.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="pendaftar_id" class="form-label">Nama Pendaftar</label>
                                    <select name="pendaftar_id" id="pendaftar_id"
                                        class="form-select @error('pendaftar_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Pendaftar --</option>
                                        @foreach ($pendaftar as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('pendaftar_id') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_lengkap }} - {{ $p->universitas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pendaftar_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="beasiswa_id" class="form-label">Beasiswa</label>
                                    <select name="beasiswa_id" id="beasiswa_id"
                                        class="form-select @error('beasiswa_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Beasiswa --</option>
                                        @foreach ($beasiswa as $b)
                                            <option value="{{ $b->id }}"
                                                {{ old('beasiswa_id') == $b->id ? 'selected' : '' }}>
                                                {{ $b->nama_beasiswa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('beasiswa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>
                                            Diterima</option>
                                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('proses.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
