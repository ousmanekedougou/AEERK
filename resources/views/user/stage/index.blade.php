 @extends('user.layouts.app',['title' => 'Stage'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.fa-thumbs-up:hover{
			color:red;
		}
	</style>
		<link rel="stylesheet" href="{{asset('user/build/css/intlTelInput.min.css')}}">
@endsection
 @section('main-content')
	<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Offres de stage d'etudes				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('stage.index') }}">Offre stage</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Offres de stage d'etudes	</h1>
								<p></p>
							</div>
						</div>
					</div>	
					<div class="row align-items-center">
						@foreach($stages as $stage)
						<div class="col-lg-6 pb-30">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<a href="{{route('stage.show',$stage->id)}}"><img class="img-fluid" src="{{Storage::url($stage->image)}}" alt=""></a>
								</div>
								<div class="detials col-12 col-md-6">
									<p>{{$stage->created_at->diffForHumans()}}</p>
									<a href="{{route('stage.show',$stage->id)}}"><h4>{{ $stage->titre }}</h4></a>
									<p>
										{{$stage->desc}}
									</p>
								</div>
							</div>
						</div>
						@endforeach																	
						<!-- <a href="#" class="text-uppercase primary-btn mx-auto mt-40">Load more courses</a>		 -->
					</div>
				</div>	
			</section>
			<!-- End events-list Area -->
 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
  <script src="{{asset('user/build/js/intlTelInput.js')}}"></script>
 @endsection

