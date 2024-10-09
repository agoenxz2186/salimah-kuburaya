@extends('back.layout.template')

@section('title', 'Tambah Laporan - Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Laporan</h1>
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
                </div>
            @endif
        </div>

        <form action="{{ url('laporan') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                            value="{{ old('judul') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="cabang_id">Cabang</label>
                        <select name="cabang_id" id="cabang_id" class="form-control"
                            @if (!auth()->user()->admin_Pusat()) disabled @endif>
                            <option value="" hidden>--Pilih Cabang--</option>
                            @foreach ($cabangs as $item)
                                <option value="{{ $item->id }}" @if ($item->id == auth()->user()->cabang_id) selected @endif>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="donasi">Donasi</label>
                        <input type="number" step="0.01" name="donasi" id="donasi" class="form-control"
                            value="{{ old('donasi') }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="myeditor" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="img">Image (max 3MB)</label>
                <input type="file" name="img" id="img" class="form-control">
                <div class="mt-1">
                    <img src="" alt="" class="img-thumbnail img-preview" width="180px">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="visibility">Visibility</label>
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="" hidden>--Pilih Visibility--</option>
                            <option value="private">Private</option>
                            <option value="publish">Publish</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="menunggu">Menunggu</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control">
                    </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ url('laporan') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
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
        };

        // CK Editor
        $(document).ready(function() {
            CKEDITOR.replace('myeditor', options);
        });

        // Image Preview
        $("#img").change(function() {
            previewImage(this);
        });

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
