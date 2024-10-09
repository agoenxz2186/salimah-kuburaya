@extends('front.artikel.showtemplate')

@section('content')
    <!-- Header -->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h2 class="fw-bolder">{{ $artikel->judul }}</h2>
                <p class="lead mb-0">{{ $artikel->created_at->format('d-m-Y') }}</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="{{ url('p/' . $artikel->slug) }}"><img class="card-img-top single-img"
                            src="{{ asset('storage/back/' . $artikel->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <span class="ml-2">{{ $artikel->created_at->format('d-m-Y') }}</span>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <span class="ml-2">{{ $artikel->view }}x Dilihat</span>
                        <p class="card-text">
                            {!! $artikel->deskripsi !!}</p>
                        <div class="mt-5">
                            <p style="font-size: 20px"><b>Share This</b></p>
                            <a class="btn btn-primary" href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                target="_blank">Facebook</a>
                            <a class="btn btn-success" href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                                target="_blank">WhatsApp</a>
                        </div>
                    </div>
                </div>



            </div>
            <!-- Side widgets-->
            @include('front.artikel.side-widget')
        </div>
    </div>
@endsection
