@extends('back.layout.template')


@section('title', 'Detail Artikel -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Artikel</h1>

        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <th width= "250px">Judul</th>
                    <td>: {{ $artikel->judul }}</td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td>: {{ $artikel->Kategori->nama }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{!! $artikel->deskripsi !!}</td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        <a href="{{ asset('storage/back/' . $artikel->img) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('storage/back/' . $artikel->img) }}" alt="" width="30%"></a>
                    </td>
                </tr>

                <tr>
                    <th>Views</th>
                    <td>: {{ $artikel->view }}x</td>
                </tr>

                <tr>
                    <th>Status</th>
                    @if ($artikel->status == 1)
                        <td>: <span class="badge bg-success">Published</span></td>
                    @else
                        <td>: <span class="badge bg-danger">Private</span></td>
                    @endif
                </tr>

                <tr>
                    <th>Tanggal Publish</th>
                    <td>{{ \Carbon\Carbon::parse($artikel->tanggal_publish)->format('d F Y') }}</td>

                </tr>
            </table>
            <div class="float-end">
                <a href="{{ url('artikeladmin') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        </div>
    </main>
    {{-- footer --}}
@endsection
