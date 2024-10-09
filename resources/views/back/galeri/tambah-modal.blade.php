<div class="modal fade" id="ModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Video</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ url('galeriadmin') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="judul">Pilih Judul Dari Laporan</label>
                        <select name="judul" id="laporan_id"
                            onchange="this.form.judul.value=this.options[this.selectedIndex].text">
                            <option value="">Pilih Judul</option>
                            @foreach ($laporans as $laporan)
                                <option value="{{ $laporan->judul }}">{{ $laporan->judul }}</option>
                            @endforeach
                        </select>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul">Atau Masukkan Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is-invalid  @enderror" value="{{ old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="youtube_code">Kode YouTube</label>
                        <input type="text" name="youtube_code" id="youtube_code"
                            class="form-control @error('youtube_code') is-invalid  @enderror"
                            value="{{ old('youtube_code') }}">
                        @error('youtube_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
