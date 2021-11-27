 @extends('user.layouts.app',['title' => 'contact'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Contact As')
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
									Contactez Nous
								</h1>	
								<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Contact</a></p>
							</div>	
						</div>
					</div>
				</section>
			
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap" style="margin-top:-30px;margin-bottom:-30px;">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>{{ all_info()->adresse ?? 'Medina-(Dakar),30x32'}}</h5>
									<p>
										4343 Hinkle Deegan Lake Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>{{ all_info()->phone  ?? '+221 78 287 59 71' }}</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>{{ all_info()->email ?? 'ousmanelaravel@gmail.com'}}</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right"  action="{{ route('contact.store') }}" method="post">
								@csrf
								<div class="row">	
									<div class="col-lg-6 form-group">
									<div class="form-group">
										<input name="nom" placeholder="Prenom & Nom" value="{{ old('nom') }}"  onfocus="this.placeholder = 'Prenom & Nom'" onblur="this.placeholder = 'Prenom & Nom'" class="common-input mb-20 form-control  @error('nom') is-invalid @enderror" required="" type="text">
										@error('nom')
											<span class="invalid-feedback" role="alert">
												<strong class="text-danger">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									
									<div class="form-group">
									<input name="email" placeholder="Votre adresse E-mail"  value="{{ old('email') }}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse E-mail'" class="common-input mb-20 form-control @error('email') is-invalid @enderror" required="" type="email">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong class="text-danger">{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="form-group">
									<input name="subject" placeholder="Votre Objet" value="{{ old('subject') }}" onfocus="this.placeholder = 'Votre Objet'" onblur="this.placeholder = 'Votre Objet'" class="common-input mb-20 form-control @error('subject') is-invalid @enderror" required="" type="text">
										@error('subject')
											<span class="invalid-feedback" role="alert">
												<strong class="text-danger">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control @error('msg') is-invalid @enderror" value="{{ old('msg') }}" name="msg" placeholder="Votre Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Messege'" required=""></textarea>				
										@error('msg')
											<span class="invalid-feedback" role="alert">
												<strong class="text-danger">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" style="float: right;">Envoyer Le Message</button>											
									</div>
								</div>
							</form>	
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

