<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	@include('user/layouts/head')
	<style>
		.form_content{
			padding:2em;
			background-color:#fff;
			box-shadow: 0px 0px 15px #0000001a;  
		}
		.button_radio{
			background-color: rgba(0, 0, 0, 0.034);
		}
	</style>
		<body>	
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
				
					<div class="row">
					<div class="col-lg-4"></div>
						<div class="col-lg-4 form_content">
							<form class="form-area contact-form text-right" action="{{ route('codification.store') }}" method="post">
								@csrf
								<div class="row">
									<h3 class="pull-center" style="margin-left:12px;margin-bottom:10px;">Votre Status</h3>
									<div class="col-lg-12">
										<div class="single-element-widget switch-wrap d-flex justify-content-between button_radio" style="padding:8px;">
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
									<div class="alert-msg" style="text-align: left;"></div>
									<button class="genric-btn primary" style="float: right;margin-right:-13px;" type="submit">Se Connecter</button>											
								</div>
							</form>	
						</div>
					<div class="col-lg-4"></div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

		


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