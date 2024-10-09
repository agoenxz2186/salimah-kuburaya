@extends('front.layout.template')
@push('css')
    <style>
        #hero {
            background-image: linear-gradient(rgba(98, 11, 239, 0.285), rgba(255, 255, 255, 1)), url("{{ asset('assets/images/background.jpeg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-position: center;
            height: 800px;
        }
    </style>
@endpush

@section('header')
    @foreach ($berandas as $item)
        <header>
            <section id="hero">
                <h2>Selamat Datang Di Salimah<br>Cabang Kubu Raya</h2>
                <p>{{ $item->deskripsi }}
                </p>
            </section>
        </header>
    @endsection

    @section('content')
        <section class="sambutan" id="sambutan">
            <!-- Foto Ketua -->
            @if ($item->fotoketua)
                <img src="{{ asset('storage/back/' . $item->fotoketua) }}" alt="Foto Ketua" class="img-fluid">
            @else
                <img src="{{ asset('assets/images/default-foto-ketua.png') }}" alt="Foto Ketua" class="img-fluid">
            @endif
            <div class="katasambut">
                <h4 class="fw-bold">Kata Sambutan Ketua Salimah Cabang Kubu Raya</h4>
                <p>{{ $item->sambutan ?? 'Sambutan tidak tersedia.' }}.</p>
            </div>
        </section>
    @endforeach


    <section id="program">
        <h1 class="fw-bold">PROGRAM UNGGULAN</h1>
        <p>Program Unggulan Yang Dimiliki Salimah</p>
        <div class="pro-base">
            @foreach ($programs as $item)
                <div class="pro-box">
                    <i class="fa-solid fa-star"></i>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <br>

    <section id="artikel">
        <div class="container py-5">
            <div class="header text-center">
                <h2 class="fw-bold">ARTIKEL</h2>
                <p>Artikel Terbaru Salimah Kubu Raya</p>
            </div>
            <div class="row py-1">
                @forelse ($artikels as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                                    {{ Str::limit(strip_tags(htmlspecialchars_decode($item->deskripsi)), 150, '...') }}
                                </p>
                                <a class="btn btn-primary btn-baca" href="{{ url('p/' . $item->slug) }}">Baca
                                    Selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-lg-12">
                        <h3>Artikel Belum Tersedia...</h3>
                    </div>
                @endforelse
            </div>

        </div>
        <div class="text-center my-1 mb-5">
            <a class="btn btn-primary btn-baca w-100" href="{{ url('/Artikel') }}">Lihat Lebih Banyak Artikel
                →</a>
        </div>
    </section>
    <section id="galeri">
        <div class="container py-3">
            <div class="header text-center">
                <h2 class="fw-bold">GALERI</h2>
                <p>Video Terbaru Dari Galeri Salimah Kubu Raya</p>
            </div>
            <div class="row">
                @forelse ($galeris as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                        <h3>Video Belum Tersedia...</h3>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="text-center my-1 mb-5">
            <a class="btn btn-primary btn-baca w-100" href="{{ url('/galeri') }}">Lihat Lebih Banyak Galeri Salimah
                →</a>
        </div>
    </section>
    <section id="agenda">
        <div class="container py-5">
            <div class="header text-center">
                <h2 class="fw-bold">Agenda</h2>
                <p>Agenda Terbaru Salimah Kubu Raya</p>
            </div>
            <div class="row py-1">
                @forelse ($agendas as $item)
                    @php
                        // Hitung total donasi terkumpul
                        $donasiTerkumpul = $item->laporanKeuangans
                            ? $item->laporanKeuangans->where('jenis', 'masuk')->sum('nominal')
                            : 0;
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Blog post-->
                        <div class="card mb-4 shadow-sm">
                            <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                    src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                            <div class="card-body card-height">
                                <h2 class="card-title h4">{{ $item->judul }}</h2>
                                <p><strong>Akan dilaksanakan Pada:</strong>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</p>
                                <p><strong>Donasi Yang dibutuhkan:</strong> Rp
                                    {{ number_format($item->donasi, 0, ',', '.') }}</p>
                                <p><strong>Donasi Yang Terkumpul:</strong> Rp
                                    {{ number_format($donasiTerkumpul, 0, ',', '.') }}</p>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#imageModal{{ $item->id }}">
                                    <i class="fa fa-eye"></i> Lihat
                                </button>
                                <a class="btn btn-success"
                                    href="https://wa.me/{{ $item->user->nohp }}?text=Halo, saya ingin berdonasi untuk kegiatan dengan judul {{ $item->judul }}."
                                    target="_blank">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1197px-WhatsApp.svg.png"
                                        alt="WhatsApp Logo" width="20" height="20"> Berdonasi →
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel{{ $item->id }}">Gambar Laporan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/back/' . $item->img) }}" class="img-fluid"
                                        alt="Gambar Laporan">
                                </div>
                                <div class="modal-body">
                                    <h2>{{ $item->judul }}</h2>
                                    <p>{!! $item->deskripsi !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h3>Belum Ada Agenda...</h3>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="text-center my-1 mb-5">
            <a class="btn btn-primary btn-baca w-100" href="{{ url('/Agenda') }}">Lihat Lebih Banyak Agenda
                →</a>
        </div>
    </section>
@endsection
@push('js')
    <script>
        var imageModal = document.getElementById('imageModalTemplate');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-bs-image');
            var modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageUrl;
        });
    </script>
@endpush
