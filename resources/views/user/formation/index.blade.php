 @extends('user.layouts.app',['title' => 'formation'])
  @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
  </style>
@endsection
@section('main-content')

<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Offres de formations
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('formation.index')}}"> Popular Courses</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start popular-courses Area --> 
			<section class="popular-courses-area section-gap courses-page">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Offres de formations</h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="row">
						@foreach($formations as $formation)
							<div class="single-popular-carusel col-lg-3 col-md-6">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
											<a href="{{ route('formation.show',$formation->id) }}"><img class="img-fluid" src="{{Storage::url($formation->image)}}" alt="" style="width:263px;height:220px;"></a>
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-clock"></span> {{$formation->created_at->diffForHumans()}} </p>
									</div>									
								</div>
								<div class="details">
									<a href="{{ route('formation.show',$formation->id) }}">
										<h4>
											{{$formation->titre}}
										</h4>
									</a>
									<p>
										{{$formation->desc}}										
									</p>
								</div>
							</div>
						@endforeach						
						<!-- <a href="#" class="primary-btn text-uppercase mx-auto">Load More Courses</a>													 -->
					</div>
				</div>	
			</section>
			<!-- End popular-courses Area -->


@endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

