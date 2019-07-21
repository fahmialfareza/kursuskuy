@extends('layouts.header')
@section('title', 'KursusKuy | Dashboard')
@section('content')
  {{-- @include('user.sidenav') --}}

<div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">Tempat Kursus</div>
          <div class="panel-body">
              <div class="col-md-1">
                <b>ID</b>
              </div>
              <div class="col-md-2">
                <b>Nama Tempat Kursus</b>
              </div>
              <div class="col-md-2">
                <b>Deskripsi</b>
              </div>
              <div class="col-md-1">
                <b>Foto</b>
              </div>
              <div class="col-md-1">
                <b>Status</b>
              </div>
              <div class="col-md-3">
                <b>Paket</b>
              </div>
              <div class="col-md-2">
                <b>Aksi</b>
              </div>
              @forelse ($tempatkursus as $tempat)
                <div class="row">
                <br>
                <div class="col-md-1">
                  {{ $tempat->id }}
                </div>
                <div class="col-md-2">
                  {{$tempat->nama}}
                </div>
                <div class="col-md-2">
                  {!!nl2br($tempat->deskripsi)!!}
                </div>
                <div class="col-md-1">
                  <a target="_blank" href="images/{{Auth::user()->id}}/fototempat/{{ $tempat->foto }}">{{ $tempat->foto }}</a>
                </div>
                <div class="col-md-1">
                  @if ($tempat->acc==1)
                    Disetujui
                  @else
                    Belum Disetujui
                  @endif
                </div>
                <div class="col-md-3">
                  @forelse ($tempat->paket as $paket)
                    {{ $paket->nama }} -- Rp {{number_format( $paket->harga , 2 , ',' , '.' )}}
                    <a type="button" class="btn btn-info" href="{{ route('paket.edit', $paket->id) }}">Edit</a>
                    <form action="{{route('paket.destroy', $paket->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                  @empty
                    <b>Belum ada paket</b>
                  @endforelse
                  <a type="button" class="btn btn-default get" href="{{ route('paket.create', $tempat->id) }}">Tambah paket</a>
                </div>
                <div class="col-md-2">
                  <a type="button" class="btn btn-info" href="{{ route('vendor.edit', $tempat->id) }}">Edit</a>
                  <form action="{{route('vendor.destroy', $tempat->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Hapus" class="btn btn-danger">
                  </form>
                </div>
              </div>
                <br>
              @empty
                <div class="col-md-5 center">
                  <h3>Belum Ada Tempat Kursus</h3>
                </div>
              </div>
              @endforelse
            </div>
            <a type="button" class="btn btn-default get" href="{{ route('vendor.create') }}">Tambah tempat kursus</a>
            <br>
        </div>
    </div>
</div>
@endsection
