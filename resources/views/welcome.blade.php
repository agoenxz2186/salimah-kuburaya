<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/icon/favicon.ico') }}">

    <title>Salimah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </link>
</head>

<body>
    {{-- -- navbar  --}}
    <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/icon/favicon.ico') }}" width="70" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Kontak</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <button class="btn btn-danger">Gabung</button>
                </div>
            </div>
        </div>
    </nav>
    {{-- -- endnavbar  --}}
    <section id="hero">
        <div class="container text-center text-white">
            <div class="hero-foto">
                <img src="{{ asset('assets/images/ketua.png') }}" alt="">
                <div class="ketua-info">
                    <p>Julaihah Gravitasi <br>Ketua Cabang Kuburaya</p>
                </div>
            </div>
            <div class="hero-title">
                <div class="hero-text">Selamat Datang <br> Di Salimah Kuburaya</div>
                <p>"Salimah sendiri berdiri sebagai Pelopor dalam meningkatkan kualitas hidup Perempuan, anak dan
                    keluarga Indonesia.
                    ketika mimpimu yang begitu indah tak pernah terwujud ya sudahlah,saat kau berlari mengejar
                    anganmu dan tak pernah sampai ya sudahlah"<br><br>
                    Nama Ketua <br>(Ketua Cabang Kuburaya)</p>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
