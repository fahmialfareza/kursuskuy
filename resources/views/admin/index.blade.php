@extends('layouts.header')
@section('title', 'KursusKuy | Dashboard')
@section('content')
  {{-- @include('user.sidenav') --}}

<div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">Kota</div>
          <div class="panel-body">
              <div class="col-md-1">
                <b>ID</b>
              </div>
              <div class="col-md-7">
                <b>Nama Kota</b>
              </div>
              <div class="col-md-4">
                <b>Aksi</b>
              </div>
              @forelse ($kota as $kot)
                <div class="row">
                  <br>
                  <div class="col-md-1">
                    {{ $kot->id }}
                  </div>
                  <div class="col-md-7">
                    {{$kot->kota}}
                  </div>
                  <div class="col-md-4">
                    <a type="button" class="btn btn-info" href="{{ route('kota.edit', $kot->id) }}">Edit</a>
                    <form action="{{route('kota.destroy', $kot->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                  </div>
                  <br>
                </div>
              @empty
                <div class="col-md-5 center">
                  <h3>Belum Ada Kota</h3>
                </div>
              @endforelse
            </div>
            <a type="button" class="btn btn-default get" href="{{ route('kota.create') }}">Tambah kota</a>
            <br>
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
              <div class="col-md-3">
                <b>Paket</b>
              </div>
              <div class="col-md-2">
                <b>Status</b>
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
                <div class="col-md-3">
                  @forelse ($tempat->paket as $paket)
                    {{ $paket->nama }} -- Rp {{number_format( $paket->harga , 2 , ',' , '.' )}}
                  @empty
                    <b>Belum ada paket</b>
                  @endforelse
                </div>
                <div class="col-md-2">
                    <form action="{{route('tempat.status', $tempat->id)}}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PUT">
                      @if ($tempat->acc==0)
                        <input type="submit" value="Setujui" class="btn btn-info">
                      @else
                        <input type="submit" value="Jangan Setujui" class="btn btn-danger">
                      @endif
                    </form>
                </div>
                <br>
              </div>
              @empty
                <div class="col-md-5 center">
                  <h3>Belum Ada Tempat Kursus</h3>
                </div>
              @endforelse
            </div>
            <br>
            <div class="panel-heading">Transaksi</div>
            <div class="panel-body">
                <div class="col-md-1">
                  <b>No</b>
                </div>
                <div class="col-md-3">
                  <b>Nama Tempat Kursus</b>
                </div>
                <div class="col-md-1">
                  <b>Nama Pemesan</b>
                </div>
                <div class="col-md-3">
                  <b>Paket</b>
                </div>
                <div class="col-md-1">
                  <b>Bukti</b>
                </div>
                <div class="div-col-2">
                  <b>Keterangan</b>
                </div>
                @foreach ($transaksi as $trans)
                  <div class="row">
                    <br>
                    <div class="col-md-1">
                      {{ $trans->id }}
                    </div>
                    <div class="col-md-3">
                      {{$trans->paket->tempat_kursus->nama}}
                    </div>
                    <div class="col-md-1">
                      {{$trans->user->nama}}
                    </div>
                    <div class="col-md-3">
                      {{ $trans->paket->nama }} - Rp {{number_format( $trans->total_harga , 2 , ',' , '.' )}}
                    </div>
                    <div class="col-md-1">
                      <a target="_blank" href="/images/{{$trans->user->id}}/konfirmasi/{{ $trans->bukti_pembayaran->konfirmasi }}">{{ $trans->bukti_pembayaran->konfirmasi }}</a>
                    </div>
                    <div class="div-col-2">
                      @if (App\BuktiPembayaran::where('transaksi_id', $trans->id)->exists())
                        @if (App\BuktiPembayaran::where('transaksi_id', $trans->id)->first()->status==1)
                          Transaksi Selesai
                        @else
                          <form action="{{route('validasi.update', $trans->bukti_pembayaran->id)}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            @if ($trans->status==0)
                              <input type="submit" value="Diterima" class="btn btn-info">
                            @else
                              <input type="submit" value="Jangan Diterima" class="btn btn-danger">
                            @endif
                          </form>
                        @endif
                      @else
                        Menunggu Validasi Pembayaran
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
