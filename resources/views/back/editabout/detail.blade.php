@extends('back.layout.template')


@section('title', 'Detail About -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Tampilan About</h1>

        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered">


                <tr>
                    <th>Foto :</th>
                    <td><a href="{{ asset('storage/back/about/' . $abouts->img) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('storage/back/about/' . $abouts->img) }}" alt="" width="30%"></a>
                    </td>
                </tr>

                <tr>
                    <th>Judul :</th>
                    <td>
                        {{ $abouts->judul }}
                    </td>
                </tr>

                <tr>
                    <th>Deskripsi </th>
                    <td> {{ $abouts->deskripsi }}</td>
                </tr>
                <tr>
                    <th>Visi :</th>
                    <td> {{ $abouts->visi }}</td>
                </tr>
                <tr>
                    <th>Misi :</th>
                    <td> {!! nl2br(e($abouts->misi)) !!}</td>
                </tr>
                <tr>
                    <th>Judul Map :</th>
                    <td> {{ $abouts->judulmap }}</td>
                </tr>
                <tr>
                    <th>Map :</th>
                    <td> {{ $abouts->map }}</td>
                </tr>
            </table>
            <div class="float-end">
                <a href="{{ url('editabout') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('editabout.edit', $abouts->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        </div>
    </main>
    {{-- footer --}}
@endsection
