<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard with Materialize</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-3 white-text" style="height: 180px;">
        <div class="row">
          <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 30px;">
            Travail
          </p>
        </div>
      </div>
    </li>

    <li id="dash_dashboard"><a class="waves-effect" href="{{ route('admin.dashboard') }}"><b>Dashboard</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_customer">
              <a class="waves-effect" href="{{ route('admin.customers') }}">Customer</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Products</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" href="{{ route('admin.products') }}">Products</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </ul>

  <header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a class="indigo-text" href="{{ route('logout') }}">Logout</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

    <nav>
      <div class="nav-wrapper indigo darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="{{ route('admin.dashboard') }}">Admin</a>
        <a class="breadcrumb" href="{{ route('admin.products') }}">Products</a>
        <a class="breadcrumb">Edit Product</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
    <h2 style="margin-left: 10px">Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product->id_barang) }}" method="POST" style="margin-left: 10px">
        @csrf
        @method('PUT')
        <div class="input-field col s12">
          <input id="nama_barang" name="nama_barang" type="text" class="validate" value="{{ old('nama_barang', $product->nama_barang) }}" required>
          <label for="nama_barang">Nama Barang</label>
        </div>
        <div class="input-field col s12">
          <input id="kategori_barang" name="kategori_barang" type="text" class="validate" value="{{ old('kategori_barang', $product->kategori_barang) }}" required>
          <label for="kategori_barang">Kategori Barang</label>
        </div>
        <div class="input-field col s12">
          <textarea id="deskripsi_barang" name="deskripsi_barang" class="materialize-textarea" required>{{ old('deskripsi_barang', $product->deskripsi_barang) }}</textarea>
          <label for="deskripsi_barang">Deskripsi Barang</label>
        </div>
        <div class="input-field col s12">
          <textarea id="spesifikasi_barang" name="spesifikasi_barang" class="materialize-textarea" required>{{ old('spesifikasi_barang', $product->spesifikasi_barang) }}</textarea>
          <label for="spesifikasi_barang">Spesifikasi Barang</label>
        </div>
        <div class="input-field col s12">
          <input id="harga_barang" name="harga_barang" type="number" class="validate" value="{{ old('harga_barang', $product->harga_barang) }}" required>
          <label for="harga_barang">Harga Barang</label>
        </div>
        <button type="submit" class="btn pink" style="margin-left: 10px">Update Produk</button>
        <a href="{{ route('admin.products') }}" class="btn grey">Kembali</a>
      </form>

  </main>

  <footer class="indigo page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul id='credits'>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
         </div>
    </div>
  </footer>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
