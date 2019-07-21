@extends('layouts.header')
@section('title', 'KursusKuy | Registrasi')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Registrasi</h1>
          <form method="post" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
              <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
              @if ($errors->has('alamat'))
                  <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
              <input type="number" id="no_telepon" name="no_telepon" class="form-control" placeholder="No Telp" value="{{ old('no_telepon') }}" required>
              @if ($errors->has('no_telepon'))
                  <span class="help-block">
                      <strong>{{ $errors->first('no_telepon') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirmation Password" id="password-confirm" name="password_confirmation" required>
            </div>
            <div class="form-group"> <label for="sel1">Jenis Akun</label>
              <select class="form-control" id="vendor" name="vendor" required>
                <option value="0">Pelajar</option>
                <option value="1">Vendor</option>
              </select>
              @if ($errors->has('vendor'))
                  <span class="help-block">
                      <strong>{{ $errors->first('vendor') }}</strong>
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
