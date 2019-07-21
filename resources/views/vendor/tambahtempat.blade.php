@extends('layouts.header')
@section('title', 'KursusKuy | Tambah Tempat Kursus')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Tambah Tempat Kursus</h1>
          <form method="post" action="{{ route('vendor.store') }}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Tempat Kursus" value="{{ old('nama') }}" required>
              @if ($errors->has('nama'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group"> <label for="sel1">Jenis Tempat Kursus</label>
              <select class="form-control" id="jenis" name="jenis" required>
                <option value="formal">Formal</option>
                <option value="nonformal">Non Formal</option>
              </select>
              @if ($errors->has('jenis'))
                  <span class="help-block">
                      <strong>{{ $errors->first('jenis') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group"> <label for="sel1">Kota</label>
              <select class="form-control" id="kota_id" name="kota_id" required>
                @foreach ($kota as $kot)
                  <option value="{{$kot->id}}">{{ $kot->kota }}</option>
                @endforeach
              </select>
              @if ($errors->has('kota_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kota_id') }}</strong>
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
            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
              <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
              @if ($errors->has('alamat'))
                  <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
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
            <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
              <label for="foto">Foto</label>
              <input type="file" name="foto" id="foto" class="form-control" required>
              @if ($errors->has('foto'))
                  <span class="help-block">
                      <strong>{{ $errors->first('foto') }}</strong>
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
