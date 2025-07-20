<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
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
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="indigo-text" style="background: none; border: none; cursor: pointer;">Logout</button>
        </form>
    </li>
</ul>


    <nav class="indigo" role="navigation">
        <div class="nav-wrapper">
            <a data-activates="slide-out" class="button-collapse show-on-" href="#!">
                <img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" />
            </a>

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
            <a class="breadcrumb" href="#!">Index</a>

            <div style="margin-right: 20px;" id="timestamp" class="right"></div>
        </div>
    </nav>
</header>

<main>
    <div class="row">
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>User Management</b>
                    </div>
                </div>

                <div class="row">
                    <a href="/admin/customers">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">people</i>
                            <span class="indigo-text text-lighten-1"><h5>Customer</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card">
                <div class="row">
                    <div class="left card-title">
                        <b>Product Management</b>
                    </div>
                </div>
                <div class="row">
                    <a href="/admin/products">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">store</i>
                            <span class="indigo-text text-lighten-1"><h5>Product</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="{{ route('admin.orders') }}">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                            <span class="indigo-text text-lighten-1"><h5>Orders</h5></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="indigo page-footer" style="bottom:0;">

    <div class="footer-copyright">
        <div class="container">

        </div>
    </div>
</footer>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
<script>
    $(document).ready(function () {
        $(".button-collapse").sideNav();
        $('.collapsible').collapsible();
        $('.dropdown-button').dropdown();
    });
</script>
</body>
</html>
