@extends('front.about.template')

@section('content')
    <header>
        <section class="header" id="hero">
            <h2>Profil Salimah<br>Cabang Kubu Raya</h2>
        </section>
    </header>
    <section class="sejarah" id="sejarah">
        @foreach ($abouts as $item)
            @if ($item->img)
                <img src="{{ asset('storage/back/about/' . $item->img) }}" alt="img" class="img-fluid">
            @else
                <img src="{{ asset('assets/images/default-foto-ketua.png') }}" alt="Foto" class="img-fluid">
            @endif
            <div class="sejarahsingkat">
                <h4 class="fw-bold">{{ $item->judul }}</h4>
                <p>{{ $item->deskripsi }}</p>
            </div>
    </section>
    <section id="visimisi">
        <h1 class="fw-bold">Visi & Misi</h1>
        <p>Visi Dan Misi Salimah</p>
        <div class="pro-base">
            <div class="pro-box">
                <h1 class="fw-bold">Visi</h1>
                <p>{{ $item->visi }}</p>
            </div>
            <div class="pro-box">
                <h1 class="fw-bold">Misi</h1>
                <p>{!! nl2br(e($item->misi)) !!}
                </p>
            </div>
        </div>
    </section>
    @endforeach
    <section class="programjalan">
        <h1 class="fw-bold">Program Yang Dijalankan Salimah Kubu Raya</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($programs as $index => $item)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($programs as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/back/program/' . $item->img) }}" alt="program" class="fotoprog">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="map">
        @foreach ($abouts as $item)
            <h1 class="fw-bold">Lokasi Kami</h1>
            <iframe src="{{ $item->map }}" width="600" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    @endforeach
@endsection
