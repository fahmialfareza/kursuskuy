@extends('layouts.header')
@section('title', 'KursusKuy | Validasi Transaksi')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Validasi Transaksi </h1>
          <form method="post" action="{{ route('validasi.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
              <input type="hidden" name="transaksi_id" id="transaksi_id" value="{{ $transaksi->id }}">
              <div class="form-group{{ $errors->has('konfirmasi') ? ' has-error' : '' }}">
                <label for="konfirmasi">Foto Bukti Pembayaran</label>
                <input type="file" name="konfirmasi" id="konfirmasi" class="form-control" required>
                @if ($errors->has('konfirmasi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('konfirmasi') }}</strong>
                    </span>
                @endif
              </div>
            <div class="form-group{{ $errors->has('nominal') ? ' has-error' : '' }}">
              <label for="nominal">Total Harga</label>
              <input type="number" id="nominal" name="nominal" class="form-control" placeholder="nominal" readonly value="{{ $transaksi->total_harga }}" required>
              @if ($errors->has('nominal'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nominal') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary text-center">Validasi</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
