@extends('front.layout.template')

@section('header')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang Di Agenda Kegiatan Salimah</h1>
                <p class="lead mb-0">Halaman Ini Berisi Agenda-agenda Yang Akan Diadakan Oleh Salimah Cabang Kubu Raya</p>
            </div>
        </div>
        {{-- search --}}
        <div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ url('Agenda/search/') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" name="keyword" placeholder="Cari Agenda..." />
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
    {{-- content body --}}

    <div class="row justify-content mx-3">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <div class="row">
                @forelse ($laporankegiatan as $item)
                    @php
                        // Hitung total donasi terkumpul
                        $donasiTerkumpul = $item->laporanKeuangans->where('jenis', 'masuk')->sum('nominal');
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Blog post-->
                        <div class="card mb-4 shadow-sm">
                            <a><img class="card-img-top post-img" src="{{ asset('storage/back/' . $item->img) }}"
                                    alt="..." /></a>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
            <!-- Pagination-->
            <div>
                {{ $laporankegiatan->links() }}
            </div>
        </div>
    </div>



    {{-- footer --}}
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            const swalText = $('.swal').data('swal');

            if (swalText) {
                Swal.fire({
                    title: 'Success',
                    text: swalText,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });

        //foto
        var imageModal = document.getElementById('imageModalTemplate');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-bs-image');
            var modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageUrl;
        });
    </script>
@endpush
