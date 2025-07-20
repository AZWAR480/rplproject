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
            <div class="indigo darken-2 white-text" style="height: 180px;">
                <div class="row">
                    <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 30px;">
                        Travail
                    </p>
                </div>
            </div>
        </li>

        <li id="dash_dashboard"><a class="waves-effect" href="/admin/dashboard"><b>Dashboard</b></a></li>

        <ul class="collapsible" data-collapsible="accordion">
            <li id="dash_users">
                <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
                <div id="dash_users_body" class="collapsible-body">
                    <ul>
                        <li id="dash_customers"><a class="waves-effect" href="{{ route('admin.customers') }}"><b>Customers</b></a></li>
                    </ul>
                </div>
            </li>

            <li id="dash_products">
                <div id="dash_products_header" class="collapsible-header waves-effect "><b>Products</b></div>
                <div id="dash_products_body" class="collapsible-body">
                    <ul>
                        <li id="products_product">
                            <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.products') }}">Products</a>
                            <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.orders') }}">Orders</a>
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
        <a class="breadcrumb" href="#!">Orders</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
    <h2>Tabel Orders</h2>

    @if (session('success'))
      <div class="card-panel green lighten-4 green-text text-darken-4">
        {{ session('success') }}
      </div>
    @endif

    <table class="highlight">
      <thead>
        <tr>
          <th>ID Checkout</th>
          <th>ID Pemesan</th>
          <th>Nama Pemesan</th>
          <th>Nomor Telepon</th>
          <th>Email</th>
          <th>Tanggal Pesan</th>
          <th>Status Pesanan</th>
          <th>Metode Pembayaran</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Provinsi</th>
          <th>Kode Pos</th>
          <th>Detail Invoice</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td>{{ $order->id_checkout }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->fname }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->tgl_pesan }}</td>
            <td>{{ $order->status_pesanan }}</td>
            <td>{{ $order->metode_pembayaran }}</td>
            <td>{{ $order->houseadd }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->province }}</td>
            <td>{{ $order->zipcode }}</td>
            <td>
              <a href="{{ route('admin.orders.show', $order->id_checkout) }}" class="btn blue">Lihat</a>
            </td>
            <td>
              <form action="{{ route('admin.orders.destroy', $order->id_checkout) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn red">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

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
