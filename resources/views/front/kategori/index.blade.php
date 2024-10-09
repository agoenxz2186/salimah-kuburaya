@extends('front.layout.template')

@section('header')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang Di Artikel Salimah</h1>
                <p class="lead mb-0">Artikel Salimah Cabang Kubu Raya</p>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container">
        <div class="mb-3">
            <form action="{{ url('artikelkegiatan/search/') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari Artikel..." />
                    <button class="btn btn-primary" id="button-search" type="submit">submit</button>
                </div>
            </form>
        </div>

        <p>Menampilkan Artikel Dengan Kategori: <b>{{ $kategori }}</b></p>

        <div class="row">
            @forelse ($artikels as $item)
                <div class="col-4">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                {{ $item->created_at->format('d M Y') }}
                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="{{ url('kategori/' . $item->kategori->slug) }}">{{ $item->kategori->nama }}</a>
                            </div>
                            <h2 class="card-title h4">{{ $item->judul }}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags(htmlspecialchars_decode($item->deskripsi)), 250, '...') }}
                            </p>
                            <a class="btn btn-primary" href="{{ url('p/' . $item->slug) }}">Baca Selengkapnya →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h3>Not Found</h3>
                </div>
            @endforelse
        </div>
        {{ $artikels->links() }}
    </div>
@endsection
