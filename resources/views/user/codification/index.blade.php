 @extends('user.layouts.app',['title' => 'Connexion'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Se Connecter')
@section('sub-heding','Bootstrap Template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.contact-page-area{
			margin-top: -4em;
		}
		.form_content{
			padding:2em;
			background-color:#fff;
			box-shadow: 0px 0px 15px #0000001a;
			border-radius: 5px;  
		}
		.button_radio{
			background-color: rgba(0, 0, 0, 0.034);
			padding:16px 10px 10px 10px;
		}
		.logo{
			text-align: center;
			padding-bottom: 20px;
			width: 100%;
			height: auto;
		}
		.logo img{
			width: 100%;
			height: auto;
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
									
								</h1>	
								<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="">Entre les informations</a></p>
							</div>	
						</div>
					</div>
				</section>
			<!-- End banner Area -->

				<!-- Start feature Area -->
			<section class="feature-area" style="margin-bottom: -70px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">
							<div class="single-feature">
								<div class="title">
									<h4>Quelques informations</h4>
								</div>
								<div class="desc-wrap">
									<p>
										Sur cette étape vous allez donner vos informations personnelle a savoire l'adress email et le numero de téléphone de votre inscription
										après avoir choisi votre status
									</p>								
								</div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
			<!-- Start contact-page Area -->
			<section class=" contact-page-area section-gap" style="margin-top:-100px;">
				<div class="container">
					<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4 form_content">
							<div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" class="image_aeerk img-responsive"></div>
							<form class="form-area contact-form text-right" action="{{ route('codification.store') }}" method="post">
								@csrf
								<div class="row">
									<h6 class="pull-center" style="margin-left:12px;margin-bottom:10px;">Vous Etes</h6>
									<div class="col-lg-12">
										<div class="single-element-widget switch-wrap d-flex justify-content-between button_radio">
											<div class="switch-wrap d-flex justify-content-between">
												<p class="text-black mr-2" style="font-weight:700;"><span class="text-danger">*</span> Nouveau</p>
												<div class="confirm-switch mt-1">
													<input type="radio" required="" id="confirm-switch" name="status" value="{{ old('status') ??  $nouveau }}" class=" @error('status') is-invalid @enderror">
													<label for="confirm-switch"></label>
													@error('status')
														<span class="invalid-feedback" role="alert">
															<strong class="message_error">{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="switch-wrap d-flex justify-content-between">
												<p class="text-black mr-2" style="font-weight:700;"><span class="text-danger">*</span> Ancien</p>
												<div class="primary-switch mt-1">
													<input type="radio" required="" id="primary-switch" name="status" value="{{ old('status') ?? $ancien }}" class=" @error('status') is-invalid @enderror">
													<label for="primary-switch"></label>
													@error('status')
														<span class="invalid-feedback" role="alert">
															<strong class="message_error">{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="" style="color: black;font-weight:600;" class="pull-left">Entrez votre adresse email <span class="text-danger">*</span></label>
									<input name="email" placeholder="" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" class="common-input mb-20 form-control @error('email') is-invalid @enderror" required="" value="{{ old('email') }}" type="email">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>
								
								<div class="form-group">
									<label for="" style="color: black;font-weight:600;" class="pull-left">Entre votre numero de telephone <span class="text-danger">*</span></label>
									<input name="phone" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" class="common-input mb-20 form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required="" type="number">
									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group">
									<div class="alert-msg"></div>
									<button class="btn  btn-primary btn-block" type="submit">Se Connecter</button>											
								</div>
							</form>	
						</div>
					<div class="col-lg-4"></div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

		


 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
@if(Session::has('flashy_notification.message'))
	<script id="flashy-template" type="text/template">
		<div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
			<i class="material-icons">speaker_notes</i>
			<a href="#" class="flashy__body" target="_blank"></a>
		</div>
	</script>
	
	<script>
		flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
	</script>
	@endif
@endsection