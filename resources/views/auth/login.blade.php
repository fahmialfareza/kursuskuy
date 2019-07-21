@extends('layouts.header')
@section('title', 'KursusKuy | Login')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <h1 class="mb-4 text-center">Login</h1>
              <form method="post" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary text-center">Login</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
