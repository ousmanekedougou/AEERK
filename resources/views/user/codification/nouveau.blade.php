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
							<form class="form-area contact-form text-right" action="{{ route('codification.update',$nouveau->id) }}" method="post">
								@csrf
								{{method_field('PUT')}}
								<div class="row">
								@if($nouveau->genre == 1)
								<h3 class="pull-left" style="margin-bottom:10px;">M.{{ $nouveau->prenom .' '. $nouveau->nom}}</h3>
								@else 
								<h3 class="pull-left" style="margin-bottom:10px;">Mme {{ $nouveau->prenom .' '. $nouveau->nom}}</h3>
								@endif
								</div>
								<div class="input-group-icon mt-10">
								<h5 class="pull-left" style="margin-bottom:10px;">Choisissez Votre Chambre a {{ $immeubles->name }}</h5>
									<!-- <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div> -->
									<div class="form-select" id="default-select">
									<label for="" class="pull-right"></label>
										<select value="{{ old('chambre_id') }}" name="chambre_id" class="common-input mb-20 form-control @error('chambre_id') is-invalid @enderror">
										@foreach($immeubles->chambres  as $chm)
											@if($nouveau->genre == $chm->genre)
											<option value="{{$chm->id}}">{{$chm->nom}}</option>
											@endif
										@endforeach
										</select>
										@error('chambre_id')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="col-lg-12">
									<div class="alert-msg" style="text-align: left;"></div>
									<button class="genric-btn primary" style="float: right;margin-right:-13px;" type="submit">Codifier</button>											
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