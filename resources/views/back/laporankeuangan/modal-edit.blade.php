<div class="modal fade" id="editModal{{ $laporanKeuangan->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $laporanKeuangan->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="editModalLabel{{ $laporanKeuangan->id }}">
                    Edit Laporan Keuangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laporan.keuangan.update', ['laporanId' => $laporan->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="laporanKeuanganId[]" value="{{ $laporanKeuangan->id }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="jenis{{ $laporanKeuangan->id }}" class="form-label">Jenis</label>
                            <select name="jenis[]" id="jenis{{ $laporanKeuangan->id }}" class="form-select" required>
                                <option value="masuk" {{ $laporanKeuangan->jenis == 'masuk' ? 'selected' : '' }}>
                                    Masuk</option>
                                <option value="keluar" {{ $laporanKeuangan->jenis == 'keluar' ? 'selected' : '' }}>
                                    Keluar</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nominal{{ $laporanKeuangan->id }}" class="form-label">Nominal</label>
                            <input type="number" name="nominal[]" id="nominal{{ $laporanKeuangan->id }}"
                                class="form-control nominal" value="{{ $laporanKeuangan->nominal }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="keterangan{{ $laporanKeuangan->id }}" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan[]" id="keterangan{{ $laporanKeuangan->id }}"
                                class="form-control" value="{{ $laporanKeuangan->keterangan }}" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="img{{ $laporanKeuangan->id }}" class="form-label">Gambar</label>
                            @if ($laporanKeuangan->img)
                                <div>
                                    <img src="{{ asset('storage/back/' . $laporanKeuangan->img) }}"
                                        class="img-thumbnail img-preview" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @else
                                <div>
                                    <p>Tidak ada gambar terkait.</p>
                                </div>
                            @endif
                            <input type="file" name="img[]" id="img{{ $laporanKeuangan->id }}"
                                class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
