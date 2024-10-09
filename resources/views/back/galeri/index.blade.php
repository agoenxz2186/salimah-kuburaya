@extends('back.layout.template')

@section('title', ' Galeri -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Galeri</h1>

        </div>

        <div class="mt-3">
            <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalCreate">Tambah</button>

            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            @if (session('success'))
                <div class="my-3">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Video</th>
                    <th>Created at</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galeris as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <iframe height="150" src="https://www.youtube.com/embed/{{ $item->youtube_code }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdate{{ $item->id }}">edit</button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete{{ $item->id }}">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <!-- Modal tambah -->
        @include('back.galeri.tambah-modal')
        <!-- Modal edit -->
        @include('back.galeri.edit-modal')
        <!-- Modal Hapus -->
        @include('back.galeri.hapus-modal')

    </main>
    {{-- footer --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const laporanSelect = document.querySelector('#laporan_id');
            const judulInput = document.querySelector('#judul');

            // Ketika dropdown laporan berubah
            laporanSelect.addEventListener('change', function() {
                if (this.value) {
                    judulInput.value = this.options[this.selectedIndex]
                        .text; // Isi input dengan teks yang dipilih
                    judulInput.disabled = true; // Nonaktifkan input teks
                } else {
                    judulInput.value = ''; // Kosongkan input teks jika tidak ada laporan yang dipilih
                    judulInput.disabled = false; // Aktifkan input teks
                }
            });

            // Pastikan input teks diaktifkan kembali saat form reset atau modal ditutup
            const modalCreate = document.querySelector('#ModalCreate');
            modalCreate.addEventListener('hidden.bs.modal', function() {
                judulInput.disabled = false; // Aktifkan kembali input teks
                laporanSelect.value = ''; // Reset pilihan dropdown
                judulInput.value = ''; // Kosongkan input teks
            });
        });
    </script>
@endsection
