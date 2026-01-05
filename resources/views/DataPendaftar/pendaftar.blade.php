@extends('index')
@section('main')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Pendaftar</strong> Dashboard</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Pendaftar</h5>
                            <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">Tambah Pendaftar</a>
                        </div>

                        <!-- Desktop Table View -->
                        <div class="d-none d-lg-block">
                            <div class="table-responsive">
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">NIM</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Prodi</th>
                                            <th class="text-center">Universitas</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No Hp</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftar as $p)
                                            <tr>
                                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                                <td class="align-middle text-center">{{ $p->nama_lengkap ?? '-' }}</td>
                                                <td class="align-middle text-center">{{ $p->nim ?? '-' }}</td>
                                                <td class="align-middle text-center">{{ $p->user->email ?? '-' }}</td>
                                                <td class="align-middle text-center">{{ $p->program_studi ?? '-' }}</td>
                                                <td class="align-middle text-center">{{ $p->universitas ?? '-' }}</td>
                                                <td class="align-middle text-center">
                                                    {{ $p->tanggal_lahir ? \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') : '-' }}
                                                </td>
                                                <td class="align-middle text-center">{{ $p->alamat ?? '-' }}</td>
                                                <td class="align-middle text-center">{{ $p->no_hp ?? '-' }}</td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('pendaftar.edit', $p->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('pendaftar.destroy', $p->id) }}" method="POST"
                                                        class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="align-middle"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="d-lg-none">
                            @foreach ($pendaftar as $p)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title text-center mb-3">
                                            <strong>{{ $loop->iteration }}. {{ $p->nama_lengkap }}</strong>
                                        </h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <small class="text-muted">NIM:</small><br>
                                                <span class="text-center d-block">{{ $p->nim ?? '-' }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">Email:</small><br>
                                                <span class="text-center d-block">{{ $p->user->email ?? '-' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <small class="text-muted">Prodi:</small><br>
                                                <span class="text-center d-block">{{ $p->program_studi ?? '-' }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">Universitas:</small><br>
                                                <span class="text-center d-block">{{ $p->universitas ?? '-' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <small class="text-muted">Tanggal Lahir:</small><br>
                                                <span class="text-center d-block">
                                                    {{ $p->tanggal_lahir ? \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') : '-' }}
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted">No HP:</small><br>
                                                <span class="text-center d-block">{{ $p->no_hp ?? '-' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <small class="text-muted">Alamat:</small><br>
                                                <span class="text-center d-block">{{ $p->alamat ?? '-' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <a href="{{ route('pendaftar.edit', $p->id) }}"
                                                    class="btn btn-sm btn-warning me-2">Edit</a>
                                                <form action="{{ route('pendaftar.destroy', $p->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin hapus data ini?')">
                                                        Delete
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
