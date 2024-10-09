@extends('back.layout.template')


@section('title', 'Edit Laporan -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Laporan</h1>

        </div>

        <div class="mt-3">
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
        </div>
        <form action="{{ url('laporan/' . $laporan->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                            value="{{ old('judul', $laporan->judul) }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="katefori_id">Cabang</label>
                        <select name="cabang_id" id="cabang_id" class="form-control">
                            @foreach ($cabangs as $item)
                                @if ($item->id == $laporan->cabang_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama }} </option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nama }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="donasi">Donasi</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="donasi" id="donasi" class="form-control"
                                value="{{ old('donasi', number_format($laporan->donasi, 2, ',', '.')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="myeditor" cols="30" rows="10" class="form-control">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="img">Image (max 3MB)</label>
                <input type="file" name="img" id="img" class="form-control" onchange="previewImage(this)">

                <div class="mt-1">
                    <small>Gambar Lama</small><br>
                    <img src="{{ asset('storage/back/' . $laporan->img) }}" alt="" class="img-thumbnail img-preview"
                        width="180px">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="visibility">Visibility</label>
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="" hidden>--Pilih Visibility--</option>
                            <option value="private" {{ $laporan->visibility == 'private' ? 'selected' : null }}>Private
                            </option>
                            <option value="publish" {{ $laporan->visibility == 'publish' ? 'selected' : null }}>Publish
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : null }}>Menunggu
                            </option>
                            <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : null }}>Ditolak
                            </option>
                            <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : null }}>Diproses
                            </option>
                            <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : null }}>Selesai
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control"
                            value="{{ old('tanggal_kegiatan', $laporan->tanggal_kegiatan) }}">
                    </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ url('laporan') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
        </div>
    </main>
    {{-- footer --}}
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages: false
        }
    </script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('myeditor', options);
        });

        //IMG PREVIEW
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
