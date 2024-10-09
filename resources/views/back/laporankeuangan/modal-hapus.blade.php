<div class="modal fade" id="deleteModal{{ $laporanKeuangan->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $laporanKeuangan->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $laporanKeuangan->id }}">Hapus Laporan Keuangan
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus laporan keuangan ini?</p>
                <form action="{{ route('laporan.keuangan.destroy', $laporanKeuangan->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
