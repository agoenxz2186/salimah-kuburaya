@extends('back.layout.template')


@section('title', 'Detail beranda -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Tampilan Beranda</h1>

        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered">

                <tr>
                    <th>Deskripsi</th>
                    <td>: {{ $beranda->deskripsi }}</td>
                </tr>

                <tr>
                    <th>Foto Ketua</th>
                    <td><a href="{{ asset('storage/back/' . $beranda->fotoketua) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('storage/back/' . $beranda->fotoketua) }}" alt="" width="30%"></a>
                    </td>
                </tr>

                <tr>
                    <th>Sambutan</th>
                    <td>
                        : {{ $beranda->sambutan }}
                    </td>
                </tr>

            </table>
            <div class="float-end">
                <a href="{{ url('berandaadmin') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('berandaadmin.edit', $beranda->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        </div>
    </main>
    {{-- footer --}}
@endsection
