@extends('back.layout.template')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@section('title', 'List Laporan - Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan</h1>
        </div>

        <div class="mt-3">
            <a href="{{ url('laporan/create') }}" class="btn btn-success mb-2">Tambah</a>
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="swal" data-swal="{{ session('success') }}"></div>
        </div>
        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Cabang</th>
                    <th>Status</th>
                    <th>Visibility</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->cabang->nama }}</td>
                        <td class="text-center">
                            @php
                                $badgeClass = '';
                                switch ($item->status) {
                                    case 'menunggu':
                                        $badgeClass = 'bg-warning custom-badge';
                                        break;
                                    case 'ditolak':
                                        $badgeClass = 'bg-danger custom-badge';
                                        break;
                                    case 'menunggu_verifikasi':
                                        $badgeClass = 'bg-secondary custom-badge';
                                        break;
                                    case 'diproses':
                                        $badgeClass = 'bg-primary custom-badge';
                                        break;
                                    case 'selesai':
                                        $badgeClass = 'bg-success custom-badge';
                                        break;
                                }
                            @endphp
                            <span
                                class="badge {{ $badgeClass }} px-2 py-1 rounded-full text-white">{{ $item->status }}</span>
                        </td>
                        <td class="text-center">
                            @php
                                $badgeClass = '';
                                switch ($item->visibility) {
                                    case 'private':
                                        $badgeClass = 'bg-danger custom-badge';
                                        break;
                                    case 'publish':
                                        $badgeClass = 'bg-success custom-badge';
                                        break;
                                }
                            @endphp
                            <span
                                class="badge {{ $badgeClass }} px-2 py-1 rounded-full text-white">{{ $item->visibility }}</span>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</td>

                        <td class="text-center">
                            <a href="{{ url('laporan/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ url('laporan/' . $item->id . '/edit') }}" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="deleteLaporan(this)" data-id="{{ $item->id }}"
                                class="btn btn-danger">Hapus</a>
                            @if ($item->status == 'selesai')
                                <a href="{{ url('laporan/cetak/' . $item->id) }}" target="_blank"
                                    class="btn btn-info">Cetak</a>
                            @else
                                <button class="btn btn-info" disabled>Cetak</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>
    {{-- footer --}}
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            const swalText = $('.swal').data('swal');

            if (swalText) {
                Swal.fire({
                    title: 'Success',
                    text: swalText,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });

        function deleteLaporan(e) {
            let id = e.getAttribute('data-id');
            console.log('ID Laporan yang akan dihapus:', id);

            swal.fire({
                title: 'Delete',
                text: 'Kamu yakin ingin menghapus Laporan ini..?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/laporan/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        success: function(response) {
                            swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/laporan';
                                }
                            });
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire({
                                title: 'Error',
                                text: 'Failed to delete laporan. Please try again later.',
                                icon: 'error',
                            });
                            console.error(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }
            });
        }
    </script>
@endpush
