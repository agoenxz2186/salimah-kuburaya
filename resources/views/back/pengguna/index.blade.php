@extends('back.layout.template')

@section('title', 'List Pengguna -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List Admin</h1>

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
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Cabang</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penggunas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nohp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->role === 'admin_Pusat')
                                Admin Pusat
                            @elseif ($item->role === 'admin_cabang')
                                Admin Cabang
                            @else
                                {{ $item->role }}
                            @endif
                        </td>
                        <td>{{ $item->cabang ? $item->cabang->nama : '-' }}</td>
                        <td>
                            <div class="text-center">

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
        @include('back.pengguna.tambah-modal')
        <!-- Modal edit -->

        <!-- Modal Hapus -->
        @include('back.pengguna.hapus-modal')

    </main>
    {{-- footer --}}
@endsection
