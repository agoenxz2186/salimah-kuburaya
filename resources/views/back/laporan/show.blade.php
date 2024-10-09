@extends('back.layout.template')

@section('title', 'Detail Laporan -Admin')

@section('content')
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Laporan</h1>
        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="250px">Judul</th>
                    <td>: {{ $laporan->judul }}</td>
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td>: {{ $laporan->Cabang->nama }}</td>
                </tr>
                <tr>
                    <th>Donasi Dibutuhkan</th>
                    <td>: Rp {{ number_format($laporan->donasi, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{!! $laporan->deskripsi !!}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @php
                            $badgeClass = '';
                            switch ($laporan->status) {
                                case 'menunggu':
                                    $badgeClass = 'bg-warning';
                                    break;
                                case 'ditolak':
                                    $badgeClass = 'bg-danger';
                                    break;
                                case 'diproses':
                                    $badgeClass = 'bg-primary';
                                    break;
                                case 'selesai':
                                    $badgeClass = 'bg-success';
                                    break;
                                default:
                                    $badgeClass = 'bg-secondary';
                            }
                        @endphp
                        <span
                            class="badge {{ $badgeClass }} px-2 py-1 rounded-full text-white">{{ $laporan->status }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Kegiatan</th>
                    <td>{{ \Carbon\Carbon::parse($laporan->tanggal_kegiatan)->format('d F Y') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <h3>Tambah Laporan Keuangan</h3>
                <form action="{{ route('laporan.keuangan.store', $laporan->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis[]" id="jenis" class="form-select form-control" required>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal[]" class="form-control nominal" required>
                        </div>
                        <div class="col-md-4">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="img" class="form-label">Image (max 3MB)</label>
                            <input type="file" name="img" id="img" class="form-control">
                            <div class="mt-1">
                                <img src="" alt="" class="img-thumbnail img-preview" width="180px">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>

            <div class="row mt-5">
                <div class="col-6">
                    <h3>Laporan Keuangan Masuk</h3>
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalMasuk = 0;
                            @endphp
                            @foreach ($laporan->laporanKeuangans->where('jenis', 'masuk') as $laporanKeuangan)
                                <tr>
                                    <td>Rp {{ number_format($laporanKeuangan->nominal, 0, ',', '.') }}</td>
                                    <td>{{ $laporanKeuangan->keterangan }}</td>
                                    <td class="text-center">
                                        @if ($laporanKeuangan->img)
                                            <button type="button" class="btn btn-outline-primary btn-sm preview-btn"
                                                data-bs-toggle="modal" data-bs-target="#previewModal"
                                                data-img="{{ asset('storage/back/' . $laporanKeuangan->img) }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $laporanKeuangan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $laporanKeuangan->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $totalMasuk += $laporanKeuangan->nominal; @endphp

                                <!-- Preview Modal -->
                                @include('back.laporankeuangan.preview-modal')

                                <!-- Edit Modal -->
                                @include('back.laporankeuangan.modal-edit')



                                <!-- Delete Modal -->
                                @include('back.laporankeuangan.modal-hapus')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total Masuk</th>
                                <td colspan="2"><strong>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="col-6">
                    <h3>Laporan Keuangan Keluar</h3>
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalKeluar = 0;
                            @endphp
                            @foreach ($laporan->laporanKeuangans->where('jenis', 'keluar') as $laporanKeuangan)
                                <tr>
                                    <td>Rp {{ number_format($laporanKeuangan->nominal, 0, ',', '.') }}</td>
                                    <td>{{ $laporanKeuangan->keterangan }}</td>
                                    <td class="text-center">
                                        @if ($laporanKeuangan->img)
                                            <button type="button" class="btn btn-outline-primary btn-sm preview-btn"
                                                data-bs-toggle="modal" data-bs-target="#previewModal"
                                                data-img="{{ asset('storage/back/' . $laporanKeuangan->img) }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $laporanKeuangan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $laporanKeuangan->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $totalKeluar += $laporanKeuangan->nominal; @endphp

                                @foreach ($laporan->laporanKeuangans as $laporanKeuangan)
                                    <!-- Form untuk edit laporan keuangan -->


                                    <!-- Preview Modal -->
                                    @include('back.laporankeuangan.preview-modal')

                                    <!-- Modal Edit -->
                                    @include('back.laporankeuangan.modal-edit')
                </div>
                @endforeach



                <!-- Delete Modal -->
                @include('back.laporankeuangan.modal-hapus')
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total Keluar</th>
                        <td colspan="2"><strong>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Sisa Uang</th>
                    <td><strong>Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</strong></td>
                </tr>
            </table>
        </div>
        </div>
        <div class="float-end">
            <a href="{{ url('laporan') }}" class="btn btn-secondary">Back</a>

            @if ($laporan->laporanKeuangans->isNotEmpty())
                <!-- Form untuk mengubah status laporan menjadi menunggu_verifikasi -->
                <form action="{{ route('laporan.selesai', $laporan->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">Laporan Selesai</button>
                </form>
            @endif

        </div>
    </main>
@endsection
