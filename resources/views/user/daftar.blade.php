@extends('layouts.header')
@section('title', 'KursusKuy | Daftar Tempat Kursus')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Daftar {{$tempat->nama}}</h1>
          <form method="post" action="{{ route('daftar.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="">Nama Tempat Kursus</label>
              <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Tempat Kursus" value="{{ $tempat->nama }}" readonly required>
              <input type="hidden" name="tempat_kursus_id" id="tempat_kursus_id" value="{{ $paket->id }}">
              @if ($errors->has('nama'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('paket') ? ' has-error' : '' }}">
              <label for="">Nama Paket</label>
              <input type="text" id="paket" name="paket" class="form-control" placeholder="Paket" value="{{ $paket->nama }}" readonly required>
              <input type="hidden" name="paket_id" id="paket_id" value="{{ $paket->id }}">
              @if ($errors->has('paket_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('paket_id') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('total_harga') ? ' has-error' : '' }}">
              <label for="total_harga">Total Harga</label>
              <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="total_harga" readonly value="{{ $paket->harga+rand(0,1000) }}" required>
              @if ($errors->has('total_harga'))
                  <span class="help-block">
                      <strong>{{ $errors->first('total_harga') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary text-center">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
