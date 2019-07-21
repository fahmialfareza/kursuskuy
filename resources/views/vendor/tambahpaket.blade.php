@extends('layouts.header')
@section('title', 'KursusKuy | Tambah Paket')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Tambah Paket - {{ $tempatkursus->nama }}</h1>
          <form method="post" action="{{ route('paket.store', $tempatkursus->id) }}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Paket" value="{{ old('nama') }}" required>
              @if ($errors->has('nama'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
              <textarea name="deskripsi" id="deskripsi" rows="8" cols="80" class="form-control" placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>
              @if ($errors->has('deskripsi'))
                  <span class="help-block">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
              <input type="number" id="harga" name="harga" class="form-control" placeholder="Harga" value="{{ old('harga') }}" required>
              @if ($errors->has('harga'))
                  <span class="help-block">
                      <strong>{{ $errors->first('harga') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary text-center">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
