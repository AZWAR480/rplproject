<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Form untuk Reset Password -->
    <form method="POST" action="{{ route('password.update') }}" id="reset-password-form">
        @csrf
        <div class="container">
            <div class="form-box">
                <h1 id="title">Reset Password</h1>

                <!-- Alert untuk pesan kesalahan -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Alert untuk pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success" id="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="input-group-login">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password Baru" name="password" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Konfirmasi Password Baru" name="password_confirmation" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit" id="reset-password" name="submit">Reset Password</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cek apakah ada alert sukses
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                alert(successMessage.textContent);
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 500); // Delay 500ms untuk memastikan alert muncul sebelum redirect
            }
        });
    </script>
</body>

</html>
