@extends('index')
@section('main')
    <main class="content">

        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Ajukan </strong> Beasiswa</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Ajukan Beasiswa</h5>
                            <a href="{{ route('proses.create') }}" class="btn btn-primary">Ajukan</a>
                        </div>
                        <!-- Desktop Table View -->
                        <div class="d-none d-lg-block">
                            <div class="table-responsive">
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">Universitas</th>
                                            <th class="text-center">Beasiswa</th>
                                            <th class="text-center">Deadline</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($proses as $p)
                                            <tr style="height: 45px;">
                                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                                <td class="align-middle text-center">{{ $p->pendaftar->nama_lengkap }}</td>
                                                <td class="align-middle text-center">{{ $p->pendaftar->universitas }}</td>
                                                <td class="align-middle text-center">{{ $p->beasiswa->nama_beasiswa }}</td>
                                                <td class="align-middle text-center">{{ $p->beasiswa->tanggal_selesai }}
                                                </td>
                                                <td class="align-middle text-center">{{ $p->status }}</td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('proses.edit', $p->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('proses.destroy', $p->id) }}" method="POST"
                                                        class="delete-form d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada data proses pendaftaran
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="d-lg-none">
                            @foreach ($proses as $p)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title text-center mb-3">
                                            <strong>{{ $loop->iteration }}. {{ $p->pendaftar->nama_lengkap }}</strong>
                                        </h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <small class="text-muted">Universitas:</small><br>
                                                <span class="d-block text-center">{{ $p->pendaftar->universitas }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">Beasiswa:</small><br>
                                                <span class="d-block text-center">{{ $p->beasiswa->nama_beasiswa }}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <small class="text-muted">Deadline:</small><br>
                                                <span
                                                    class="d-block text-center">{{ $p->beasiswa->tanggal_selesai }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">Status:</small><br>
                                                <span class="d-block text-center">{{ $p->status }}</span>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <a href="{{ route('proses.edit', $p->id) }}"
                                                    class="btn btn-sm btn-warning me-2">Edit</a>
                                                <form action="{{ route('proses.destroy', $p->id) }}" method="POST"
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="align-middle" data-feather="trash-2"></i> Hapus
                                                    </button>
                                                </form>
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
