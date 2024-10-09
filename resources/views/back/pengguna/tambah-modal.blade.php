<div class="modal fade" id="ModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ url('pengguna') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nohp">No HP</label>
                        <input type="text" name="nohp" id="nohp"
                            class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp') }}">

                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="admin_Pusat" selected>Admin Pusat</option>
                            <option value="admin_cabang">Admin Cabang</option>
                        </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3" id="cabangField" style="display:none;">
                        <label for="cabang_id">Cabang</label>
                        <select name="cabang_id" id="cabang_id"
                            class="form-control @error('cabang_id') is-invalid @enderror">
                            @foreach ($cabangs as $cabang)
                                <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
                            @endforeach
                        </select>

                        @error('cabang_id')
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
    document.getElementById('role').addEventListener('change', function() {
        var cabangField = document.getElementById('cabangField');
        if (this.value.startsWith('admin_cabang')) {
            cabangField.style.display = 'block';
        } else {
            cabangField.style.display = 'none';
        }
    });
</script>
