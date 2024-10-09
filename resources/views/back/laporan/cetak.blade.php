<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            font-size: 16px;
        }

        .thumbnail {
            display: block;
            margin: 10px auto;
            max-width: 500px;
            border-radius: 10px;
        }

        .small-thumbnail {
            display: block;
            margin: 10px;
            max-width: 30%;
            border-radius: 10px;
        }

        .image-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: 10px;
        }

        table.static {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #543535;
            margin-bottom: 20px;
        }

        table.static th,
        table.static td {
            border: 1px solid #543535;
            padding: 8px;
            text-align: left;
        }

        .totals {
            margin-top: 20px;
        }

        .totals label {
            font-weight: bold;
        }

        .totals span {
            margin-left: 10px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $laporan->judul }}</h1>
        <p>{{ $laporan->Cabang->nama }}</p>
        <p>Tanggal Kegiatan: {{ \Carbon\Carbon::parse($laporan->tanggal_kegiatan)->format('d-m-Y') }}</p>
        <img src="{{ asset('storage/back/' . $laporan->img) }}" alt="Thumbnail" class="thumbnail">
    </div>



    <div class="content">
        <p>{!! $laporan->deskripsi !!}</p>
    </div>
    <div class="page-break"></div>
    <h3>Laporan Keuangan</h3>
    <div class="mt-5">
        <h3>Laporan Keuangan - Masuk</h3>
        <table class="static">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $totalMasuk = 0; @endphp
                @foreach ($laporan->laporanKeuangans->where('jenis', 'masuk') as $laporanKeuangan)
                    <tr>
                        <td>{{ ucfirst($laporanKeuangan->jenis) }}</td>
                        <td>Rp {{ number_format($laporanKeuangan->nominal, 0, ',', '.') }}</td>
                        <td>{!! $laporanKeuangan->keterangan !!}</td>
                    </tr>
                    @php $totalMasuk += $laporanKeuangan->nominal; @endphp
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="mt-5">
        <h3>Laporan Keuangan - Keluar</h3>
        <table class="static">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $totalKeluar = 0; @endphp
                @foreach ($laporan->laporanKeuangans->where('jenis', 'keluar') as $laporanKeuangan)
                    <tr>
                        <td>{{ ucfirst($laporanKeuangan->jenis) }}</td>
                        <td>Rp {{ number_format($laporanKeuangan->nominal, 0, ',', '.') }}</td>
                        <td>{!! $laporanKeuangan->keterangan !!}</td>
                    </tr>
                    @php $totalKeluar += $laporanKeuangan->nominal; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="totals">
        <label>Jumlah Uang Masuk:</label><span>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</span><br>
        <label>Jumlah Uang Keluar:</label><span>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</span><br>
        <label>Sisa Uang:</label><span>Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</span>
    </div>

    <div class="page-break"></div>
    <div class="image-row">
        <h2>Lampiran Bukti Masuk</h2>
        @foreach ($laporan->laporanKeuangans->where('jenis', 'masuk') as $laporanKeuangan)
            @if ($laporanKeuangan->img)
                <div class="image-box">
                    <img src="{{ asset('storage/back/' . $laporanKeuangan->img) }}" alt="Gambar Laporan Masuk"
                        class="small-thumbnail">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    <h2>Lampiran Bukti Keluar</h2>
    <div class="image-row">
        @foreach ($laporan->laporanKeuangans->where('jenis', 'keluar') as $laporanKeuangan)
            @if ($laporanKeuangan->img)
                <img src="{{ asset('storage/back/' . $laporanKeuangan->img) }}" alt="Gambar Laporan Keluar"
                    class="small-thumbnail">
            @endif
        @endforeach
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
