@extends('back.layout.template')

@section('title', 'Dashboard -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>

        </div>
        <div class="row">
            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_artikels }} Artikel</h3>
                        <p>Total Artikel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper nav-icon"></i>
                    </div>
                    <a href="{{ url('/artikeladmin') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_kategoris }} Kategori</h3>
                        <p>Total Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list nav-icon"></i>
                    </div>
                    <a href="{{ url('/kategoriadmin') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_videos }} Video</h3>
                        <p>Total Video</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-image nav-icon"></i>
                    </div>
                    <a href="{{ url('galeriadmin') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            @if (Auth::user()->role === 'admin_Pusat')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_laporan_menunggu }} Laporan</h3>
                            <p>Menunggu diproses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_laporan_diproses }} Laporan</h3>
                            <p>Sedang Diproses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $total_laporan_menunggu_verif }} Laporan</h3>
                            <p>Menunggu Verifikasi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_laporan_selesai }} Laporan</h3>
                            <p>Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
        </div>


        <div class="row">
            <div class="col-6">
                <h3>Artikel Terbaru</h3>
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_artikels as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ url('artikeladmin/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <h3>Artikel Populer</h3>
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($populer_artikels as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td class="text-center">{{ $item->kategori->nama }}</td>
                                <td class="text-center">{{ $item->view }}</td>
                                <td class="text-center">
                                    <a href="{{ url('artikel/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

    </main>
    {{-- footer --}}
@endsection
