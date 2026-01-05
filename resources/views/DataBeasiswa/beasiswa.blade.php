@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Beasiswa </strong> Dashboard</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Beasiswa</h5>
                            <a href="{{ route('beasiswa.create') }}" class="btn btn-primary">Tambah Beasiswa</a>
                        </div>
                        <!-- Desktop Table View -->
                        <div class="d-none d-lg-block">
                            <div class="table-responsive">
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Nama Beasiswa</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Tanggal Mulai</th>
                                            <th class="text-center">Tanggal Selesai</th>
                                            <th class="text-center">Jumlah Penerima</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($beasiswa as $b)
                                            <tr style="height: 45px;">
                                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                                <td class="align-middle text-center">{{ $b->nama_beasiswa }}</td>
                                                <td class="align-middle text-center">{{ Str::limit($b->deskripsi, 50) }}
                                                </td>
                                                <td class="align-middle text-center">{{ $b->tanggal_mulai }}</td>
                                                <td class="align-middle text-center">{{ $b->tanggal_selesai }}</td>
                                                <td class="align-middle text-center">{{ $b->jumlah_penerima }}</td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="badge bg-{{ $b->status == 'aktif' ? 'success' : 'secondary' }}">
                                                        {{ ucfirst($b->status) }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <a href="{{ route('beasiswa.edit', $b->id) }}"
                                                        class="btn btn-sm btn-warning me-1">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('beasiswa.destroy', $b->id) }}" method="POST"
                                                        class="delete-form d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="align-middle"></i> Hapus
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Belum ada data beasiswa</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="d-lg-none">
                            @foreach ($beasiswa as $b)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="card-title text-center mb-3">
                                                    <strong>{{ $loop->iteration }}. {{ $b->nama_beasiswa }}</strong>
                                                </h6>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">Tanggal Mulai:</small><br>
                                                        <span class="text-center d-block">{{ $b->tanggal_mulai }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">Tanggal Selesai:</small><br>
                                                        <span class="text-center d-block">{{ $b->tanggal_selesai }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <small class="text-muted">Jumlah Penerima:</small><br>
                                                        <span class="text-center d-block">{{ $b->jumlah_penerima }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">Status:</small><br>
                                                        <span
                                                            class="badge bg-{{ $b->status == 'active' ? 'success' : 'secondary' }} d-block text-center">
                                                            {{ ucfirst($b->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <small class="text-muted">Deskripsi:</small><br>
                                                        <span
                                                            class="text-center d-block">{{ Str::limit($b->deskripsi, 100) }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
                                                        <a href="{{ route('beasiswa.edit', $b->id) }}"
                                                            class="btn btn-sm btn-warning me-2">
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('beasiswa.destroy', $b->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Yakin hapus beasiswa ini?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
