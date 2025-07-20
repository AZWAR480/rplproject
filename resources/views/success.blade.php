<!DOCTYPE html>
<html>
<head>
    <title>Checkout Success</title>
    <script src="https://kit.fontawesome.com/fae9849151.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            margin-top: 50px;
        }
        .text-center {
            text-align: center;
        }
        .btn-download {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-center">
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
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <h1>Checkout Success</h1>
            <p>Terima kasih telah melakukan pemesanan!</p>
            <p>ID Pesanan: {{ $checkout->id_checkout }}</p>
            <a href="{{ route('invoice.download', ['id_checkout' => $checkout->id_checkout]) }}" class="btn btn-primary btn-download">Download Invoice</a>
        </div>
    </div>

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
