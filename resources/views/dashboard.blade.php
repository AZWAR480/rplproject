<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/landing.css">

    <!-- Custom CSS to remove underline from category links -->
    <style>
        .category a {
            text-decoration: none; /* Menghilangkan garis bawah */
            color: inherit; /* Mengambil warna teks dari elemen induk */
        }

        .category a:hover {
            text-decoration: none; /* Menghilangkan garis bawah saat hover */
            color: inherit; /* Mengambil warna teks dari elemen induk saat hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/dashboard"><span class="text-warning">Trav</span>ail</a>
            <!--Logo dari perusahaan-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/about">About</a>
                    </li>
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

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/colokan.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Produk Listrik Berkualitas!</h5>
                    <p style="font-size: 20px;">Temukan produk listrik berkualitas dengan harga terjangkau, daya tahan lama, dan performa handal yang memenuhi kebutuhan Anda setiap hari.</p>
                    <p><a href="#" class="btn btn-warning mt3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/listrik.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Kepuasan Produk yang Dihadirkan</h5>
                    <p style="font-size: 20px;">Kepuasan Anda adalah prioritas kami dengan produk yang dihadirkan, memenuhi standar kualitas dan kebutuhan sehari-hari secara konsisten.</p>
                    <p><a href="#" class="btn btn-warning mt3">Learn More</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @if($barang->isEmpty())
        <div class="alert alert-warning" role="alert">
            Barang Tidak Ditemukan!!!
        </div>
    @else
    <!-- Category -->
    <section id="category" class="category section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="section-header text-left pb-5">
                        <h2>Category</h2>
                    </div>
                </div>
            </div>

            <div class="row" id="category-row">
                <!-- Kategori -->
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="category text-center bg-white pb-2">
                        <a href="{{ url('/dashboard?kategori=stop kontak dan saklar') }}">
                            <div class="category-body text-dark">
                                <div class="category-area mb-4">
                                    <img src="image/category1.png" class="object-fit-cover border rounded img-fluid" alt="Saklar dan Stopkontak">
                                </div>
                                <h4 class="card-title">Saklar dan Stopkontak</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="category text-center bg-white pb-2">
                        <a href="{{ url('/dashboard?kategori=kabel dan aksesoris') }}">
                            <div class="category-body text-dark">
                                <div class="category-area mb-4">
                                    <img src="image/category2.jpeg" class="object-fit-cover border rounded img-fluid" alt="Kabel dan Aksesoris">
                                </div>
                                <h4 class="card-title">Kabel dan Aksesoris</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="category text-center bg-white pb-2">
                        <a href="{{ url('/dashboard?kategori=lampu') }}">
                            <div class="category-body text-dark">
                                <div class="category-area mb-4">
                                    <img src="image/category3.png" class="object-fit-cover border rounded img-fluid" alt="Lampu">
                                </div>
                                <h4 class="card-title">Lampu</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="category text-center bg-white pb-2">
                        <a href="{{ url('/dashboard?kategori=pipa dan trunking') }}">
                            <div class="category-body text-dark">
                                <div class="category-area mb-4">
                                    <img src="image/category4.png" class="object-fit-cover border rounded img-fluid" alt="Pipa & Trunking">
                                </div>
                                <h4 class="card-title">Pipa & Trunking</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- List Item -->
    <section id="list_item" class="list_item">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="section-header text-left pb-3">
                        <h2>All Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($barang as $item)
                <div class="col-6 col-md-3 col-lg-2 mb-2">
                    <div class="card text-center bg-white">
                        <img src="{{ asset('image/' . $item->gambar_barang) }}" class="card-img-top" alt="{{ $item->nama_barang }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_barang }}</h5>
                            <p class="card-text">Rp.{{ $item->harga_barang }}</p>
                            <form action="{{ route('cart.add', $item->id_barang) }}" method="POST">
                                @csrf
                                <input type="number" name="jumlah" value="1" min="1" class="form-control mb-2" />
                                <button type="submit" class="btn btn-primary btn-sm">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Footer -->
<footer class="footer p-2 text-center">
  <div class="container">
    <div class="row" id="textplace">
      <div class="col-12 col-md-12 col-lg-3">
        <div class="footer text-center pb-2">
          <div class="Footer-text text-dark">
            <h3>About</h3>
            <p>Who Are We?</p>
            <p>Privacy Policy</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-3">
        <div class="footer text-center pb-2">
          <div class="Footer-text text-dark">
            <h3>Help</h3>
            <p>Support</p>
            <p>Help Center</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-3">
        <div class="footer text-center pb-2">
          <div class="Footer-text text-dark">
            <h3>Contact</h3>
            <p>Terms & Condition</p>
            <p>Return & Exchange Policy</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-3">
        <div class="footer text-center pb-2">
          <div class="Footer-text text-dark">
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
