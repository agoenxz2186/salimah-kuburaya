@foreach ($galeris as $item)
    <div class="modal fade" id="ModalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Galeri</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('galeriadmin', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="laporan_id_{{ $item->id }}">Pilih Judul Dari Laporan</label>
                            <select name="judul" id="laporan_id_{{ $item->id }}" class="form-select">
                                <option value="">Pilih Judul</option>
                                @foreach ($laporans as $laporan)
                                    <option value="{{ $laporan->judul }}"
                                        {{ $laporan->judul == $item->judul ? 'selected' : '' }}>
                                        {{ $laporan->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="judul_{{ $item->id }}">Atau Masukkan Judul</label>
                            <input type="text" name="judul" id="judul_{{ $item->id }}"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $item->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="youtube_code_{{ $item->id }}">YouTube Code</label>
                            <input type="text" name="youtube_code" id="youtube_code_{{ $item->id }}"
                                class="form-control @error('youtube_code') is-invalid @enderror"
                                value="{{ old('youtube_code', $item->youtube_code) }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const laporanSelect = document.querySelector('#laporan_id_{{ $item->id }}');
            const judulInput = document.querySelector('#judul_{{ $item->id }}');

            // Ketika dropdown laporan berubah
            laporanSelect.addEventListener('change', function() {
                if (this.value) {
                    judulInput.value = this.options[this.selectedIndex]
                        .text; // Isi input dengan teks yang dipilih
                    judulInput.disabled = true; // Nonaktifkan input teks
                } else {
                    judulInput.value = ''; // Kosongkan input teks jika tidak ada laporan yang dipilih
                    judulInput.disabled = false; // Aktifkan input teks
                }
            });

            // Pastikan input teks diaktifkan kembali saat form reset atau modal ditutup
            const modalCreate = document.querySelector('#ModalCreate');
            modalCreate.addEventListener('hidden.bs.modal', function() {
                judulInput.disabled = false; // Aktifkan kembali input teks
                laporanSelect.value = ''; // Reset pilihan dropdown
                judulInput.value = ''; // Kosongkan input teks
            });
        });
    </script>
@endforeach
