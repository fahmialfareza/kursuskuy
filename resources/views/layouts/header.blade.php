<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
  <style>
    .search input[type=text] {
      width: 130px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      padding: 3px 20px 3px 40px;
      -webkit-transition: width 0.4s ease-in-out;
      transition: width 0.4s ease-in-out;
      margin-top: 10px;
    }

    input[type=text]:focus {
      width: 100%;
    }

    .dropdown-submenu{
      position: relative;
    }

    .dropdown-submenu>a:after{
      display: block;
      content: " ";
      float: right;
      width: 0;
      height: 0;
      border-color: transparent;
      border-style: solid;
      border-width: 5px 0 5px 5px;
      border-left-color: #ccc;
      margin-top: 5px;
      margin-right: -10px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
      display: block;
    }

    .dropdown-submenu .dropdown-menu {
      left: 100%;
      top: 0;
    }

    .dropdown-submenu .pull-left {
      float: none;
    }

  </style>
</head>

<body>
  <div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo pull-center">
            <a href="/">
              <img src="/images/kursusKUY.png" alt=""> </a>
          </div>
        </div>
        <div class="col-sm-6">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li>
                  <a href="/" class="active"><span class="glyphicon glyphicon-home"></span></a>
                </li>
                <li>
                  <a href="/tempatkursus" class="active">Tempat Kursus</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" style="color: grey;"> Filter <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a href=""> Kategori </span></a>
                      <ul class="dropdown-menu">
                      <li>
                        <a href="/formal"> Formal </a>
                      </li>
                      <li>
                        <a href="/nonformal"> Non Formal </a>
                      </li>
                      </ul>
                    </li>

                    <li class="dropdown-submenu">
                      <a href=""> Kota </span></a>
                      <ul class="dropdown-menu">
                        @foreach (App\Kota::all() as $kot)
                        <li>
                          <a href="/kota/{{$kot->id}}"> {{$kot->kota}} </a>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <div class="search">
                    <form action="{{ route('pencarian') }}">
                      <input type="text" name="search" placeholder="Search..">
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-sm-3">
          <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
              @if (Auth::check())
                <li>
                  @if (Auth::user()->admin==1)
                    <a href="/admin"><i class="fa fa-user"></i> Admin</a>
                  @elseif (Auth::user()->vendor==1)
                    <a href="/vendor"><i class="fa fa-user"></i> {{Auth::user()->nama}}</a>
                  @else
                    <a href="/home"><i class="fa fa-user"></i> {{Auth::user()->nama}}</a>
                  @endif
                </li>
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              @else
                <li>
                  <a href="/register"><i class="fa fa-user"></i> Register</a>
                </li>
                <li>
                  <a href="/login"><i class="fa fa-sign-in"></i> Login</a>
                </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!--/header-bottom-->
  <!--/header-->
  @yield('content')
  @include('layouts.footer')
