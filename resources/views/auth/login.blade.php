
 @extends('user.layouts.app',['title' => 'Connexion'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Se Connecter')
@section('sub-heding','Bootstrap Template')
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
									Se Connecter Pour Codifier
								</h1>	
								<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Se Connecter</a></p>
							</div>	
						</div>
					</div>
				</section>
			
			<!-- End banner Area -->	


      	<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
							<!-- <div class="single-feature">
								<div class="title">
									<h4>Codification</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div> -->
						</div>
						<div class="col-lg-8">
							<div class="single-feature">
								<div class="title">
									<h4>Quelques informations</h4>
								</div>
								<div class="desc-wrap">
									<p>
										For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<!-- <div class="single-feature">
								<div class="title">
									<h4>Etudes & Bourse</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div> -->
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap" style="margin-top:-90px;margin-bottom:-30px;">
				<div class="container">
					<div class="row " style="padding:20px;">
						
						<div class="col-lg-2 d-flex flex-column address-wrap">
																				
						</div>
						<div class="col-lg-8 col-md-8" style="background-color:white;padding:20px;">
							<h3 class="mb-30 text-center">Se Connecter</h3>
							<form action="{{ route('login') }}" method="post">
								{{ csrf_field() }}
								<div class="input-group-icon mt-10">
									<label for="" style="font-weight: bold;">Entrez l'adresse email</label>
														<input type="email" name="email" id="email" class=" form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong class="text-danger">{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="input-group-icon mt-10">
									<label for="" style="font-weight: bold;">Entrez le mot de passe</label>
														<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong class="text-danger">{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="col-xs-12 mt-3">
									<button type="submit" class="genric-btn primary radius btn-block">Se Connecter</button>
								</div>
							</form>
						</div>
						<div class="col-lg-2 d-flex flex-column address-wrap">
																				
						</div>
					</div>
				</div>	
			</section>

      	      
		
			<!-- End contact-page Area -->

			<section style="margin-bottom:-10px;">
				<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6261.6732654896405!2d-17.454947698431745!3d14.683017213132251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smedina%2039x32%20dakar!5e1!3m2!1sfr!2ssn!4v1608340244285!5m2!1sfr!2ssn" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</section>
 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection
