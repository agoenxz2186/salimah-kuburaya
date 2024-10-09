<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="previewImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            // Menangani klik pada tombol preview
            $('.preview-btn').click(function() {
                var imgSrc = $(this).data('img');
                $('#previewImage').attr('src', imgSrc);
            });
        });
    </script>
@endpush
