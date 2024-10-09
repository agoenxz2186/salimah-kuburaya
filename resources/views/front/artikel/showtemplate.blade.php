<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @stack('meta-seo')
    <title>Artikel Salimah</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/artikel/img/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/artikel/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/artikel/css/custom.css') }}" rel="stylesheet" />
    @stack('css')
</head>

<body>
    <!-- Responsive navbar-->
    @include('front.layout.navbar')
    <!-- Page header with logo and tagline-->


    @yield('content')

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Salimah &copy; Kubu Raya</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/artikel/js/scripts.js') }}"></script>
    @stack('js')
</body>

</html>
