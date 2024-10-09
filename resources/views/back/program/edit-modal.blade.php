@foreach ($programs as $item)
    <div class="modal fade" id="ModalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Program</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('programadmin', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="oldImg" value="{{ $item->img }}">

                        <div class="mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $item->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="img">Foto Program</label>
                            <input type="file" name="img" id="img"
                                class="form-control @error('img') is-invalid @enderror">
                            @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <img src="{{ asset('storage/back/program/' . $item->img) }}" alt="Program Image"
                                class="img-fluid mt-2" style="max-width: 200px;">
                        </div>

                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="unggulan"
                                    {{ old('status', $item->status) == 'unggulan' ? 'selected' : '' }}>Unggulan</option>
                                <option value="dijalankan"
                                    {{ old('status', $item->status) == 'dijalankan' ? 'selected' : '' }}>Dijalankan
                                </option>
                            </select>
                            @error('status')
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
@endforeach
