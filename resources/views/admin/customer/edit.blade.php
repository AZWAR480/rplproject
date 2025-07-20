<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Management</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>
  <link rel="stylesheet" href="/css/admin.css">
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
    {{--  <li id="dash_users"><a class="waves-effect" href="{{ route('admin.users') }}"><b>Users</b></a></li>  --}}
    {{--  <li id="dash_products"><a class="waves-effect" href="{{ route('admin.products') }}"><b>Products</b></a></li>  --}}
    <li id="dash_customers"><a class="waves-effect" href="{{ route('admin.customers') }}"><b>Customers</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Users</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Seller</a>
            </li>
            <li id="users_customer">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Customer</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Products</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Products</a>
              <a class="waves-effect" style="text-decoration: none;" href="#!">Orders</a>
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
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
        <a class="breadcrumb" href="#!">Customer Management</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
      <h2>Edit Customer</h2>

      <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-field">
          <input type="text" name="nama" id="nama" value="{{ old('nama', $customer->nama) }}" required>
          <label for="nama">Nama</label>
          @error('nama')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>

        <div class="input-field">
          <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
          <label for="email">Email</label>
          @error('email')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>

        <div class="input-field">
          <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $customer->alamat) }}" required>
          <label for="alamat">Alamat</label>
          @error('alamat')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>

        <button type="submit" class="btn blue">Update</button>
        <a href="{{ route('admin.customers') }}" class="btn grey">Batal</a>
      </form>



  </main>

  <footer class="indigo page-footer" style="bottom: 0;">
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
  <script src="/js/admin.js"></script>
</body>
</html>
