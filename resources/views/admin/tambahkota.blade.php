@extends('layouts.header')
@section('title', 'KursusKuy | Tambah Kota')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Tambah Kota</h1>
          <form method="post" action="{{ route('kota.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
            <div class="form-group{{ $errors->has('kota') ? ' has-error' : '' }}">
              <input type="text" id="kota" name="kota" class="form-control" placeholder="Nama Kota/Kabupaten" value="{{ old('kota') }}" required>
              @if ($errors->has('kota'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kota') }}</strong>
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
