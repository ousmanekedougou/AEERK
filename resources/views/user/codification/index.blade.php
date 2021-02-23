<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	@include('user/layouts/head')
	<style>
		.contact-page-area{
			margin-top: -4em;
		}
		.form_content{
			padding:2em;
			background-color:#fff;
			box-shadow: 0px 0px 15px #0000001a;  
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
	{{-- @extends('user/layouts/app') --}}
		<body>	
			@include('flashy::message')
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					{{-- <div class="pull-right">
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();"
						 class="btn btn-default btn-flat">Se Deconnecter</a>
	  
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					  </div> --}}
					<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4 form_content">
							<div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" class="image_aeerk img-responsive"></div>
							<form class="form-area contact-form text-right" action="{{ route('codification.store') }}" method="post">
								@csrf
								<div class="row">
									<h3 class="pull-center" style="margin-left:12px;margin-bottom:10px;">Vous Etes</h3>
									<div class="col-lg-12">
										<div class="single-element-widget switch-wrap d-flex justify-content-between button_radio">
											<div class="switch-wrap d-flex justify-content-between">
												<p class="text-black mr-2" style="font-weight:700;">* Nouveau</p>
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
												<p class="text-black mr-2" style="font-weight:700;">* Ancien</p>
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
									<input name="email" placeholder="Entre votre adresse email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entre votre adresse email'" class="common-input mb-20 form-control @error('email') is-invalid @enderror" required="" value="{{ old('email') }}" type="email">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>
								
								<div class="form-group">
									<input name="phone" placeholder="Entre votre numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entre votre numero de telephone'" class="common-input mb-20 form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required="" type="number">
									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="col-lg-12">
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


			<script src="{{asset('user/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.{{asset('user/js/1.12.9/umd/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{asset('user/js/vendor/bootstrap.min.js')}}"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('user/js/easing.min.js')}}"></script>			
			<script src="{{asset('user/js/hoverIntent.js')}}"></script>
			<script src="{{asset('user/js/superfish.min.js')}}"></script>	
			<script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>	
    		<script src="{{asset('user/js/jquery.tabs.min.js')}}"></script>						
			<script src="{{asset('user/js/jquery.nice-select.min.js')}}"></script>	
			<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>									
			<script src="{{asset('user/js/mail-script.js')}}"></script>	
			<script src="{{asset('user/js/main.js')}}"></script>
			<script src="{{asset('user/js/dropzone/dropzone.js')}}"></script>	
		</body>
	</html>