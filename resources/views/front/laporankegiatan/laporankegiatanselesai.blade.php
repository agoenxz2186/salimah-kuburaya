@extends('front.layout.template')

@section('header')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang Di Laporan Kegiatan Salimah</h1>
                <p class="lead mb-0">Halaman Ini Berisi Laporan Kegiatan Yang Diadakan Oleh Salimah Cabang Kubu Raya</p>
            </div>
        </div>
        {{-- search --}}
        <div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ url('KegiatanSelesai/search/') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" name="keyword" placeholder="Cari Kegiatan..." />
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

    <div class="row justify-content mx-3"> <!-- Menambahkan padding pada elemen row -->
        <!-- Blog entries-->
        <div class="col-lg-12">
            <div class="row">
                @forelse ($laporankegiatan as $item)
                    @php
                        // Hitung total donasi terkumpul
                        $donasiTerkumpul = $item->laporanKeuangans->where('jenis', 'masuk')->sum('nominal');
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Menambahkan margin bottom pada col -->
                        <!-- Blog post-->
                        <div class="card mb-4 shadow-sm">
                            <a><img class="card-img-top post-img" src="{{ asset('storage/back/' . $item->img) }}"
                                    alt="..." /></a>
                            <div class="card-body card-height">
                                <h2 class="card-title h4">{{ $item->judul }}</h2>
                                <p><strong>dilaksanakan Pada:</strong>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</p>
                                <p><strong>Donasi Yang Terkumpul:</strong> Rp
                                    {{ number_format($donasiTerkumpul, 0, ',', '.') }}</p>


                                <a href="{{ url('Kegiatan/cetak/' . $item->id) }}" target="_blank" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Lihat
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
                        <h3>Kegiatan Belum Ada Yang Selesai...</h3>
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
