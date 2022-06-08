 @extends('user.layouts.app',['title' => 'Specialite'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.banner-area{background:url('user/img/img_6.jpg') right;background-size:cover}
  </style>
  	{{--<link rel="stylesheet" href="{{asset('user/build/css/demo.css')}}">--}}
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
                            Offres d'emploi	
                        </h1>	
                        <p class="text-white link-nav"><a href="/">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('ancien.create') }}"> Emplois & Stages</a></p>
                    </div>	
                </div>
            </div>
        </section>
    <!-- End banner Area -->


	<!-- Start feature Area -->
	<section class="feature-area pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4>Toutes les specialites pour le domaine {{ $domaine->name }}</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Usage of the Internet is becoming more common due to rapid advancement
								of technology.
							</p>									
						</div>
					</div>
				</div>												
			</div>
		</div>	
	</section>
	<!-- End feature Area -->	


		<section class="feature-area pb-80 pt-80">
		<div class="container">
			<div class="row">
				@foreach($specialites as $speciality)
					<div class="col-lg-4">
						<div class="single-feature">
							<div class="title" style="background-color: #3753db;">
								<h4>{{ $speciality->name }}</h4>
							</div>
							<div class="desc-wrap">
								<p>
									Usage of the Internet is becoming more common due to rapid advancement
									of technology.
								</p>
								<a href="{{ route('emplois.add',$speciality->slug) }}">Postulez</a>									
							</div>
						</div>
					</div>
				@endforeach											
			</div>
		</div>	
	</section>

	

 @endsection


