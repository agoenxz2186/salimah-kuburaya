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
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow">
                    <a href="{{ url('p/' . $latest_post->slug) }}"><img class="card-img-top featured-img"
                            src="{{ asset('storage/back/' . $latest_post->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $latest_post->created_at->format('d F Y') }}
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a
                                href="{{ url('kategori/' . $latest_post->kategori->slug) }}">{{ $latest_post->kategori->nama }}</a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <span class="ml-2">{{ $latest_post->view }}x Dilihat</span>
                        </div>
                        <h2 class="card-title">{{ $latest_post->judul }}</h2>
                        <p class="card-text">
                            {{ Str::limit(strip_tags(htmlspecialchars_decode($latest_post->deskripsi)), 100, '...') }}</p>
                        <a class="btn btn-primary btn-baca" href="{{ url('p/' . $latest_post->slug) }}">Baca Selengkapnya
                            →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @forelse ($artikels as $item)
                        <div class="col-lg-6">

                            <!-- Blog post-->
                            <div class="card mb-4 shadow-sm">
                                <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                        src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                                <div class="card-body card-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a
                                            href="{{ url('kategori/' . $item->kategori->slug) }}">{{ $item->kategori->nama }}</a>
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <span class="ml-2">{{ $item->view }}x Dilihat</span>
                                    </div>
                                    <h2 class="card-title h4">{{ $item->judul }}</h2>
                                    <p class="card-text">
                                        {{ Str::limit(strip_tags(htmlspecialchars_decode($item->deskripsi)), 200, '...') }}
                                    </p>
                                    <a class="btn btn-primary btn-baca" href="{{ url('p/' . $item->slug) }}">Baca
                                        Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <h3>Artikel yang kamu cari tidak ditemukan...</h3>
                        </div>
                    @endforelse


                </div>
                <!-- Pagination-->
                <div>
                    {{ $artikels->links() }}
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.artikel.side-widget')
        </div>
    </div>
@endsection
