@extends('back.layout.template')

@section('title', 'Profil Pengguna -Admin')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('profile.update', $user->id) }}" method="post" id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nohp">Nomor HP</label>
                        <input type="text" name="nohp" id="nohp" value="{{ old('nohp', $user->nohp) }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                        <small id="passwordError" class="text-danger d-none">Konfirmasi password tidak cocok.</small>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordError = document.getElementById('passwordError');
            const submitBtn = document.getElementById('submitBtn');

            function validatePassword() {
                if (password.value !== passwordConfirmation.value) {
                    passwordError.classList.remove('d-none');
                    submitBtn.disabled = true;
                } else {
                    passwordError.classList.add('d-none');
                    submitBtn.disabled = false;
                }
            }

            password.addEventListener('input', validatePassword);
            passwordConfirmation.addEventListener('input', validatePassword);
        });
    </script>
@endsection
