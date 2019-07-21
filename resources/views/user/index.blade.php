@extends('layouts.header')
@section('title', 'KursusKuy | Dashboard')
@section('content')
  {{-- @include('user.sidenav') --}}

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Transaksi</div>
            <div class="panel-body">
                <div class="col-md-1">
                  <b>No</b>
                </div>
                <div class="col-md-4">
                  <b>Nama Tempat Kursus</b>
                </div>
                <div class="col-md-3">
                  <b>Paket</b>
                </div>
                <div class="div-col-3">
                  <b>Keterangan</b>
                </div>
                @foreach ($transaksi as $trans)
                  <div class="row">
                    <br>
                    <div class="col-md-1">
                      {{ $trans->id }}
                    </div>
                    <div class="col-md-4">
                      {{ $trans->paket->tempat_kursus->nama }}
                    </div>
                    <div class="col-md-3">
                      {{ $trans->paket->nama }} - Rp {{number_format( $trans->total_harga , 2 , ',' , '.' )}}
                    </div>
                    <div class="div-col-3">
                      @if (App\BuktiPembayaran::where('transaksi_id', $trans->id)->exists())
                        @if (App\BuktiPembayaran::where('transaksi_id', $trans->id)->first()->status==1)
                          <a type="button" class="btn btn-info" href="{{ route('cetak', $trans->id) }}">Cetak</a>
                        @else
                          Menunggu Konfirmasi
                        @endif
                      @else
                        <a type="button" class="btn btn-info" href="{{ route('validasi', $trans->id) }}">Validasi Pembayaran</a>
                      @endif
                    </div>
                    <br>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
