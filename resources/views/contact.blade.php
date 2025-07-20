<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/contact_us.css" />
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
    <div class="about-section">
        <h1>Contact Us</h1>
        <p>Hubungi Kami dengan nomor kontak yang ada di bawah ini</p>
        <p>Admin Respon 24 Jam.</p>
      </div>

      <h2 style="text-align:center">Owner</h2>
      <div class="row">
        <div class="column">
          <div class="card">
            {{--  //<img src="/w3images/team1.jpg" alt="Jane" style="width:100%">  --}}
            <div class="containerCard">
              <h2>Andri Pangistu</h2>
              <p class="title">Admin</p>
              <p>No. HP</p>
              <p>jane@example.com</p>
              <p><button class="button">Contact</button></p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            {{--  //<img src="/w3images/team2.jpg" alt="Mike" style="width:100%">  --}}
            <div class="containerCard">
              <h2>Alfina Amalia</h2>
              <p class="title">Owner</p>
              <p>No. HP</p>
              <p>mike@example.com</p>
              <p><button class="button">Contact</button></p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            {{--  //<img src="/w3images/team3.jpg" alt="John" style="width:100%">  --}}
            <div class="containerCard">
              <h2>M. Ragahdo</h2>
              <p class="title">Admin</p>
              <p>No. HP</p>
              <p>john@example.com</p>
              <p><button class="button">Contact</button></p>
            </div>
          </div>
        </div>
      </div>

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
