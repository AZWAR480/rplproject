<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
</head>

<body>
    <form method="post" action="{{ route('login.authenticate') }}">
        @csrf
        <div class="container">
            <div class="form-box">
                <h1 id="title">Login</h1>

                <!-- Alert untuk pesan kesalahan -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="input-group-login">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <p>Forgot Password? <a href="{{ route('password.update') }}">Click Here!</a></p>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signin" name="submit">Login</button>
                </div>
                <div class="no-account">
                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a></p>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
