<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ filemtime(public_path('css/profile.css')) }}">
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <img src="{{ asset('image/menu.png') }}" class="menu-icon" onclick="window.location.href='{{ route('dashboard') }}'">
            <a href="{{ route('profile.edit') }}">
                <img src="{{ asset('image/setting.png') }}" class="setting-icon">
            </a>
            <img src="{{ asset('image/blank_pp.png') }}" class="profile-icon">
            <h3>{{ $user->nama }}</h3>
            <p>{{ $user->email }}</p>
            <p>{{ $user->alamat }}</p>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
