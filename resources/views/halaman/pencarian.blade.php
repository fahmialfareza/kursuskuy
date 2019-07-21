@extends('layouts.header')
@section('title', 'KursusKuy | Pencarian "{{ $search }}"')
@section('content')
<section>
  <div class="row">
    <!--awal row-->
    <div class="col-md-10 col-md-offset-1">
      <!--awal box-->
      <h2>Pencarian <small>Tempat Kursus "{{$search}}"</small></h2>
      <hr>
      @forelse ($tempatkursus as $tempat)
        <div class="col-xs-6 col-sm-4 col-md-2">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a href="/detail/{{ $tempat->id }}">
                <img class="img-responsive" src="/images/{{ $tempat->user->id }}/fototempat/{{ $tempat->foto }}" alt="Foto">
              <br> <span>{{$tempat->nama}}</span> </a>
              <br> </div>
              <div class="box-footer box-profile"> <span class="fa fa-home"><span class="spantext"> {{$tempat->user->nama}}</span>
              <br> <span class="glyphicon glyphicon-map-marker"></span><span class="spantext"> {{$tempat->alamat}}</span> </span>
            </div>
          </div>
        </div>
      @empty
        <h1>Coming Soon</h1>
      @endforelse
    </div>
  </div>
  <div class="row">
    <!--awal row-->
    <br>
    <br>
    <div class="col-md-10 col-md-offset-1">
      <nav aria-label="Page navigation">
        <!--awal pagination-->
        <ul class="pagination">
          <li>
            {!! $tempatkursus->links() !!}
          </li>
        </ul>
      </nav>
      <!--akhir pagination-->
    </div>
    <!--akhir thumbnail-->
  </div>
  <!--awal row-->
  <br>
  <br> </section>
@endsection
