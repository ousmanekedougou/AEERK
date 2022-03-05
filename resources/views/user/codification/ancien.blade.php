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
					<div class="col-lg-3"></div>
						<div class="col-lg-6 my-4 form_content">
								
								<div class="row">
									@if($ancien->genre == 1)
										<h3 class="text-center" style="margin-bottom:10px;width:100%">M.{{ $ancien->prenom .' '. $ancien->nom}}</h3>
									@else 
										<h3 class="text-center" style="margin-bottom:10px;width:100%">Mme {{ $ancien->prenom .' '. $ancien->nom}}</h3>
									@endif
								</div>
									<p class="text-center"> Vous allez codifier a {{$immeubles->name }} </p>
									<form class="form-area contact-form text-right" action="{{ route('codifier_ancien',$ancien->id) }}" method="post">
										@csrf
										{{method_field('PUT')}}
										{{--
										<div class="input-group-icon mt-10">
											<div class="form-select" id="default-select">
												<label for="" class="pull-right"></label>
												<input type="hidden" value="{{ $ancien->genre }}" name="genre">
												<select value="{{ old('immeuble') }}" name="immeuble" class="common-input mb-20 form-control @error('immeuble') is-invalid @enderror">
												@foreach($immeubles as $imb)
													<option value="{{$imb->id}}">{{$imb->name}}</option>
												@endforeach
												</select>
												@error('immeuble')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										--}}
										<div class="">
											{{-- <div class="alert-msg" style="text-align: left;"></div>  --}}
											<button class="genric-btn primary my-4 btn-block" type="submit">Valider la codification</button>											
										</div>
									</form>	
						</div>
					<div class="col-lg-3"></div>
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