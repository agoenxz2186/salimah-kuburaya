@extends('back.layout.template')

@section('title', 'Edit Beranda -Admin')

@section('content')
    {{-- content body --}}
    <main class="col-md-12 ms-sm-auto col-lg-20 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Beranda</h1>
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

        <form action="{{ url('berandaadmin/' . $beranda->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- <input type="hidden" name="oldBackgroundIMG" value="{{ $beranda->backgroundIMG }}"> --}}
            <input type="hidden" name="oldFotoketua" value="{{ $beranda->fotoketua }}">

            <div class="row">
                {{-- <div class="col-6">
                    <div class="mb-3">
                        <label for="backgroundIMG">Background Image (max 3MB)</label>
                        <input type="file" name="backgroundIMG" id="backgroundIMG" class="form-control">
                        @if ($beranda->backgroundIMG)
                            <div class="mt-1">
                                <small>Gambar Lama</small><br>
                                <img src="{{ asset('storage/back/' . $beranda->backgroundIMG) }}" alt=""
                                    class="img-thumbnail img-preview" width="180px">
                            </div>
                        @endif
                    </div>
                </div> --}}

                <div class="col-6">
                    <div class="mb-3">
                        <label for="fotoketua">Foto Ketua (max 3MB)</label>
                        <input type="file" name="fotoketua" id="fotoketua" class="form-control">
                        @if ($beranda->fotoketua)
                            <div class="mt-1">
                                <small>Gambar Lama</small><br>
                                <img src="{{ asset('storage/back/' . $beranda->fotoketua) }}" alt=""
                                    class="img-thumbnail img-preview" width="180px">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="myeditor" cols="30" rows="10" class="form-control">{{ old('deskripsi', $beranda->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="sambutan">Sambutan</label>
                <textarea name="sambutan" id="sambutan" cols="30" rows="10" class="form-control">{{ old('sambutan', $beranda->sambutan) }}</textarea>
            </div>

            <div class="float-end">
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
    </script>

    <script>
        $(document).ready(function() {
            const maxLength = 1000;

            $("#deskripsi_program1, #deskripsi_program2, #deskripsi_program3").on('input', function() {
                var currentLength = $(this).val().length;
                $(this).next('.charCount').text(currentLength + '/200');
                if (currentLength > maxLength) {
                    $(this).val($(this).val().substring(0, maxLength));
                    $(this).next('.charCount').text(maxLength + '/200');
                }
            });

            // Preview Background Image
            // Preview Background Image
            $("#backgroundIMG").change(function() {
                previewImage(this, '#img-preview-background');
            });

            // Preview Foto Ketua
            $("#fotoketua").change(function() {
                previewImage(this, '#img-preview-fotoketua');
            });

            function previewImage(input, selector) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endpush
