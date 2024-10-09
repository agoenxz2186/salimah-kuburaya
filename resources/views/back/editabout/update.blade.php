@extends('back.layout.template')

@section('title', 'Edit Tampilan About - Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Tampilan About</h1>
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

        <form action="{{ url('editabout/' . $abouts->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $abouts->img }}">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="img">Image (max 3MB)</label>
                        <input type="file" name="img" id="img" class="form-control">
                        <div class="mt-1">
                            <small>Gambar Lama</small><br>
                            <img src="{{ asset('storage/back/about/' . $abouts->img) }}" alt=""
                                class="img-thumbnail img-preview" width="180px">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                            value="{{ old('judul', $abouts->judul) }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" cols="30" rows="10" class="form-control">{{ old('deskripsi', $abouts->deskripsi) }}</textarea>
            </div>



            <div class="mb-3">
                <label for="visi">Visi</label>
                <textarea name="visi" id="visi" cols="30" rows="5" class="form-control">{{ old('visi', $abouts->visi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="misi">Misi</label>
                <textarea name="misi" id="misi" cols="30" rows="5" class="form-control">{{ old('misi', $abouts->misi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="judulmap">Judul Map</label>
                <input type="text" name="judulmap" id="judulmap" class="form-control"
                    value="{{ old('judulmap', $abouts->judulmap) }}">
            </div>

            <div class="mb-3">
                <label for="map">Map</label>
                <p>*diambil dari https: sampai sen!2sid</p>
                <input type="text" name="map" id="map" class="form-control"
                    value="{{ old('map', $abouts->map) }}">
            </div>

            <div class="float-end">
                <a href="{{ url('editabout') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
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
        }

        $(document).ready(function() {
            CKEDITOR.replace('myeditor', options);
        });

        //IMG PREVIEW
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
