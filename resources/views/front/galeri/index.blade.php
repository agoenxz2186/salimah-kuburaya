@extends('front.layout.template')

@section('header')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang Di Galeri Salimah</h1>
                <p class="lead mb-0">Galeri Salimah Cabang Kuburaya</p>
            </div>
        </div>

        {{-- search --}}
        <div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ url('galeri/search/') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" name="keyword" placeholder="Cari Video..." />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header>
@endsection

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Featured blog post-->

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @forelse ($galeris as $item)
                        <div class="col-lg-4">

                            <!-- Blog post-->
                            <div class="card mb-4 shadow-sm">
                                <iframe height="300" src="https://www.youtube.com/embed/{{ $item->youtube_code }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <div class="card-body video-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                        &nbsp;&nbsp;|&nbsp;&nbsp;

                                    </div>
                                    <h3 class="card-title h4">{{ $item->judul }}</h3>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <h3>Video yang kamu cari tidak ditemukan...</h3>
                        </div>
                    @endforelse


                </div>
                <!-- Pagination-->
                <div>
                    {{ $galeris->links() }}
                </div>
            </div>
            <!-- Side widgets-->
            {{-- @include('front.artikel.side-widget') --}}
        </div>
    </div>
@endsection
