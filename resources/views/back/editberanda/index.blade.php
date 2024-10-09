@extends('back.layout.template')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('title', 'Tampilan Beranda -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tampilan Beranda</h1>
        </div>

        <div class="mt-3">
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
                    <th>Deskripsi</th>
                    <th>Sambutan</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berandas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->sambutan, 100) }}</td>

                        <td class="text-center">
                            <a href="{{ url('berandaadmin/' . $item->id) }}" class="btn btn-secondary">Detail</a>
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
    </script>
@endpush
