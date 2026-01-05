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
                            <form action="{{ route('proses.update', $proses->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="pendaftar_id" class="form-label">Nama Pendaftar</label>
                                    <select name="pendaftar_id" id="pendaftar_id" class="form-select" required>
                                        @foreach ($pendaftar as $p)
                                            <option value="{{ $p->id }}"
                                                {{ $proses->pendaftar_id == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_lengkap }} - {{ $p->universitas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="beasiswa_id" class="form-label">Beasiswa</label>
                                    <select name="beasiswa_id" id="beasiswa_id" class="form-select" required>
                                        @foreach ($beasiswa as $b)
                                            <option value="{{ $b->id }}"
                                                {{ $proses->beasiswa_id == $b->id ? 'selected' : '' }}>
                                                {{ $b->nama_beasiswa }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="pending" {{ $proses->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="diterima" {{ $proses->status == 'diterima' ? 'selected' : '' }}>
                                            Diterima</option>
                                        <option value="ditolak" {{ $proses->status == 'ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('proses.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
