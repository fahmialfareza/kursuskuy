@extends('layouts.header')
@section('title', 'KursusKuy | Home')
@section('content')
  <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Kursus Mobil</span></h1>
									<h2>Belajar Mobil dengan cepat</h2>
									<p>Jaminan 3x pertemuan lancar</p>
									<a type="button" class="btn btn-default get" href="/nonformal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Mobil.jpg" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Kursus Bahasa Inggris</span></h1>
									<h2>Speaking more fluently</h2>
									<p>Like the BULE</p>
									<a type="button" class="btn btn-default get"href="/formal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Inggris.jpg" class="img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>Kursus Bahasa Prancis</span></h1>
									<h2>Bonjour les amis</h2>
									<p>Sympa de te parler</p>
									<a type="button" class="btn btn-default get" href="/formal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Prancis.jpg" class="img-responsive" alt="" />
								</div>
							</div>

						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
@endsection
