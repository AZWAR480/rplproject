<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><span class="text-warning">Trav</span>ail</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#product">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#about">About</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request()->input('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="title mb-4">
                <h2>Form Pemesanan Produk</h2>
            </div>
            <form action="{{ route('checkout.submitForm') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="fname" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" required>
                    @error('fname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="houseadd" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('houseadd') is-invalid @enderror" id="houseadd" name="houseadd" placeholder="Nomor rumah dan nama jalan" value="{{ old('houseadd') }}" required>
                    @error('houseadd')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apartment" class="form-label">Apartemen, suite, unit, dll. (opsional)</label>
                    <input type="text" class="form-control" id="apartment" name="apartment" value="{{ old('apartment') }}">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="city" class="form-label">Kabupaten / Kota <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="province" class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" required>
                        @error('province')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="zipcode" class="form-label">Kode Pos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" required>
                        @error('zipcode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                    <select class="form-select @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="direct_bank_transfer" {{ old('metode_pembayaran') == 'direct_bank_transfer' ? 'selected' : '' }}>Transfer Bank Langsung</option>
                        <option value="cash_on_delivery" {{ old('metode_pembayaran') == 'cash_on_delivery' ? 'selected' : '' }}>Bayar di Tempat</option>
                    </select>
                    @error('metode_pembayaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pesanan Anda</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                                @foreach(session('cart') as $item)
                                    <tr>
                                        <td><img src="{{ asset('image/' . $item['gambar_barang']) }}" style="max-width: 50px;"></td>
                                        <td>{{ $item['nama_barang'] }}</td>
                                        <td>Rp. {{ number_format($item['harga_barang'], 2) }}</td>
                                        <td>{{ $item['jumlah'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Keranjang kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(session('cart'))
                        <div class="text-end">
                            <strong>Total Harga: Rp. {{ number_format(array_reduce(session('cart'), function($carry, $item) { return $carry + $item['harga_barang'] * $item['jumlah']; }, 0), 2) }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-9NDxH8BxwmePZvsfbWddicPt5CBnU6pC7GDyZpHxiPbOk5Xy09ug4P5FV7nRMjrl" crossorigin="anonymous"></script>
</body>
</html>
