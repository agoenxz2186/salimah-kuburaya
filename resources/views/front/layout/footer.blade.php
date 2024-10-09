<!-- Footer-->
<footer class="py-5 bg-dark footer">
    <div class="container">
        <img src="{{ asset('assets/images/logosalimah.png') }}" alt="">
        <ul class="menu">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="{{ url('/Artikel') }}">Artikel</a>
            </li>
            <li>
                <a href="{{ url('/galeri') }}">Galeri</a>
            </li>
            <li>
                <a href="{{ url('/Agenda') }}">Kegiatan</a>
            </li>
            <li>
                <a href="{{ url('/about') }}">About</a>
            </li>
        </ul>
        <h2>Hubungi Kami</h2>
        <ul class="mediasocial">
            @foreach ($footerData as $item)
                <li>
                    <a href="{{ $item->link }}">
                        <i>{{ $item->judul }}</i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</footer>
