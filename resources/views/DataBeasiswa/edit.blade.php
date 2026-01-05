@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit</strong> Beasiswa</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Edit Beasiswa</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama_beasiswa" class="form-label">Nama Beasiswa</label>
                                    <input type="text" class="form-control @error('nama_beasiswa') is-invalid @enderror"
                                        id="nama_beasiswa" name="nama_beasiswa"
                                        value="{{ old('nama_beasiswa', $beasiswa->nama_beasiswa) }}" required>
                                    @error('nama_beasiswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                        required>{{ old('deskripsi', $beasiswa->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                id="tanggal_mulai" name="tanggal_mulai"
                                                value="{{ old('tanggal_mulai', $beasiswa->tanggal_mulai) }}" required>
                                            @error('tanggal_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                id="tanggal_selesai" name="tanggal_selesai"
                                                value="{{ old('tanggal_selesai', $beasiswa->tanggal_selesai) }}" required>
                                            @error('tanggal_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah_penerima" class="form-label">Jumlah Penerima</label>
                                    <input type="number"
                                        class="form-control @error('jumlah_penerima') is-invalid @enderror"
                                        id="jumlah_penerima" name="jumlah_penerima"
                                        value="{{ old('jumlah_penerima', $beasiswa->jumlah_penerima) }}" min="1"
                                        required>
                                    @error('jumlah_penerima')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="aktif"
                                            {{ old('status', $beasiswa->status) == 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="nonaktif"
                                            {{ old('status', $beasiswa->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                        </option>
                                        <option value="draft"
                                            {{ old('status', $beasiswa->status) == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="penyediabeasiswa_id" class="form-label">Penyedia Beasiswa</label>
                                    <select class="form-control @error('penyediabeasiswa_id') is-invalid @enderror"
                                        id="penyediabeasiswa_id" name="penyediabeasiswa_id" required>
                                        <option value="">Pilih Penyedia</option>
                                        @foreach ($penyediaList as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('penyediabeasiswa_id', $beasiswa->penyediabeasiswa_id) == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_penyedia }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('penyediabeasiswa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('beasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
