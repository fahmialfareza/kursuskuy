@extends('layouts.header')
@section('title', 'KursusKuy | Tempat Kursus')
@section('content')
  <div class="container-fluid">
    <!--awal dari conta-->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <!--level1-->
        <h2>Deskripsi {{$tempat->nama}}</h2>
        <hr>
        <div class="row">
          <div class="col-md-3">
            <!--level2 gambar-->
            <div class="thumbnail">
              <img src="/images/{{ $tempat->user->id }}/fototempat/{{ $tempat->foto }}" alt=""> </div>
          </div>
          <div class="col-md-5">
            <!--level2 deskripsi-->
            <p><b>Tempat kursus : {{$tempat->nama}}</b></p>
            <p><b>Alamat : {{$tempat->alamat}}</b></p>
            <p><b>Deskripsi : </b>
              <br>
              {!!nl2br($tempat->deskripsi)!!}</p>
            <br>
            <p>
              @foreach ($tempat->paket as $paket)
                <b>Detail {{ $paket->nama }} :</b>
                <br>
                {!!nl2br($paket->deskripsi)!!}
                <br>
              @endforeach
            </p>
          </div>
          <form action="{{ route('daftarredirect', $tempat->id) }}" method="post">
            {{ csrf_field() }}
            <select class="form-control" id="paket" style="width: 250px;" name="paket" required>
              @foreach ($tempat->paket as $pake)
                <option value="{{$pake->id}}">{{$pake->nama}} - <b>Rp {{number_format( $pake->harga , 2 , ',' , '.' )}}</b></option>
              @endforeach
            </select>
            <span><button type="submit" class="btn btn-primary">Daftar</button></span>
          </form>
        </div>
      </div>
      <hr> </div>
  </div>
  <br>
@endsection
