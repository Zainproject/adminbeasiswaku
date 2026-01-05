@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Penyedia </strong> Beasiswa</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Penyedia Beasiswa</h5>
                            <a href="{{ route('penyediabeasiswa.create') }}" class="btn btn-primary">Tambah Penyedia</a>
                        </div>

                        <!-- Desktop Table View -->
                        <div class="d-none d-lg-block">
                            <div class="table-responsive">
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Nama Penyedia</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Kontak</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penyedia as $p)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $p->nama_penyedia }}</td>
                                                <td class="text-center">{{ $p->alamat }}</td>
                                                <td class="text-center">{{ $p->kontak }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('penyediabeasiswa.edit', $p->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('penyediabeasiswa.destroy', $p->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="align-middle"></i> Hapus
                                                        </button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada data penyedia beasiswa</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="d-lg-none">
                            @forelse ($penyedia as $p)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title text-center mb-3">
                                            <strong>{{ $loop->iteration }}. {{ $p->nama_penyedia }}</strong>
                                        </h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <small class="text-muted">Alamat:</small><br>
                                                <span class="text-center d-block">{{ $p->alamat }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">Kontak:</small><br>
                                                <span class="text-center d-block">{{ $p->kontak }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">

                                                <a href="{{ route('penyediabeasiswa.edit', $p->id) }}"
                                                    class="btn btn-sm btn-warning me-2">
                                                    Edit
                                                </a>


                                                <form action="{{ route('penyediabeasiswa.destroy', $p->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin hapus data penyedia ini?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        Belum ada data penyedia beasiswa
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
