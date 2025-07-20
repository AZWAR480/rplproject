<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="form-box-reg">
            <h1 id="title">Daftar</h1>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="input-group">
                    <!-- Input Email -->
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Nama -->
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nama" placeholder="Nama Pengguna" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Alamat -->
                    <div class="input-field">
                        <i class="fa-solid fa-address-book"></i>
                        <input type="text" name="alamat" placeholder="Alamat Pengguna" value="{{ old('alamat') }}" required>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Username -->
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Kata Sandi" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
                    </div>

                    <!-- Tautan untuk login jika sudah punya akun -->
                    <p>Already have an account? <a href="{{ route('login') }}">Sign in now!</a></p>
                </div>

                <!-- Tombol Daftar -->
                <div class="btn-field">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
