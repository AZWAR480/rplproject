<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
</head>

<body>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="form-box">
                <h1>Edit Profil</h1>

                <!-- Alert untuk pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

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
                        <input type="text" placeholder="Nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-home"></i>
                        <input type="text" placeholder="Alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" required>
                    </div>
                </div>

                <button type="submit" id="submit">Update Profil</button>
            </div>
        </div>
    </form>
</body>

</html>
