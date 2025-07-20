<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/landing.css" />
    <title>About Us</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/dashboard"><span class="text-warning">Trav</span>ail</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                </ul>
                <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request()->input('search') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <a href="{{ route('cart.show') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-cart-shopping"></i> Cart
            </a>
        </div>
    </nav>
    <section class="about-us">
        <div class="about">
            <div class="text" style="margin: 128.5px;">
                <h1>About Us</h1>
                <h2>Toko Listrik <span>Online</span></h2>
                <p style="font-size: 20px">Toko listrik merupakan salah satu jenis usaha yang menyediakan berbagai macam produk listrik dengan berbagai varian dan bentuk yang menarik. Seiring dengan perkembangan zaman, kebutuhan masyarakat akan kemudahan dalam mendapatkan informasi dan melakukan transaksi pembelian semakin meningkat. Oleh karena itu, keberadaan aplikasi penjualan web untuk toko listrik menjadi solusi yang tepat untuk memenuhi kebutuhan tersebut. Aplikasi penjualan web toko listrik memungkinkan pelanggan untuk mengakses informasi tentang produk listrik yang ditawarkan, melihat daftar produk, serta melakukan pemesanan secara online tanpa harus datang langsung ke toko.</p>
            </div>
        </div>
    </section>
    <footer class="footer p-2 text-center">
        <div class="container">
            <div class="row" id="textplace">
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="footer text-center pb-2">
                        <div class="Footer-text">
                            <h3>About</h3>
                            <p>Who Are We?</p>
                            <p>Privacy Policy</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="footer text-center pb-2">
                        <div class="Footer-text">
                            <h3>Help</h3>
                            <p>Support</p>
                            <p>Help Center</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="footer text-center pb-2">
                        <div class="Footer-text">
                            <h3>Contact</h3>
                            <p>Terms & Condition</p>
                            <p>Return & Exchange Policy</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="footer text-center pb-2">
                        <div class="Footer-text">
                            <h3>Follow Us</h3>
                            <p>Facebook</p>
                            <p>Instagram</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
