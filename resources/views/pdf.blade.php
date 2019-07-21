<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
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
  </style>
</head>
<body>
<div class="container">
    <div class="row">
      <img src="images/kursusKUY.png" alt=""> </a>
        <div class="panel panel-default">
            <div class="panel-heading">Transaksi</div>
            <div class="panel-body">
                <div class="col-md-1">
                  <b>No : </b> {{ $trans->id }}
                </div>
                <div class="col-md-4">
                  <b>Nama Tempat Kursus : </b> {{$trans->paket->tempat_kursus->nama}}
                </div>
                <div class="col-md-3">
                  <b>Paket : </b> {{ $trans->paket->nama }} - Rp {{number_format( $trans->total_harga , 2 , ',' , '.' )}}
                </div>
                <div class="col-md-3">
                  <b>Keterangan : </b> Transaksi Berhasil
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <br>
      <br>
      <br>
      <p>TTD,</p>
      <br>
      <br><br>
      <br>
      KursusKuy
    </div>
</body>
