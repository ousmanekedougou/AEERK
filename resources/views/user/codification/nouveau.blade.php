<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	@include('user/layouts/head')
	<style>
		.form_content{
			padding:2em;
			background-color:#fff;
			box-shadow: 0px 0px 15px #0000001a;
			border-radius: 5px;  
		}
		.button_radio{
			background-color: rgba(0, 0, 0, 0.034);
		}
		.image_user img{
			width: 75%;
			height: auto;
			border-radius:100% ;
		}
		.logo{
		text-align: center;
		padding-bottom: 10px;
		width: 100%;
		height: auto;
		}
		.logo img{
			width: 100%;
			height: auto;
		}
	</style>
		<body>	
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
				
					<div class="row">
					<div class="col-lg-4"></div>
						<div class="col-lg-4 form_content">
							<div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" class="image_aeerk img-responsive"></div>
							<form class="form-area contact-form text-right" action="{{ route('codification.update',$nouveau->id) }}" method="post">
								@csrf
								{{method_field('PUT')}}
								
								<div class="input-group-icon mt-10">
									<div class="row text-center image_user">
										<div class="col-md-4"></div>
										<div class="col-md-4">
										<img class="img-responsive" src="{{ Storage::url($nouveau->image) }}" alt="" srcset="">
										</div>
										<div class="col-md-4"></div>
									</div>
									<div class="text-center">
										@if($nouveau->genre == 1)
										<h3 class="text-center" style="margin-bottom:20px;margin-top:8px;width:100%">Mme {{ $nouveau->prenom .' '. $nouveau->nom}}</h3>
										@elseif($nouveau->genre == 2) 
										<h3 class="text-center" style="margin-bottom:20px;margin-top:8px;width:100%">Mr {{ $nouveau->prenom .' '. $nouveau->nom}}</h3>
										@endif
									</div>
									<p class="text-center"> Vous allez codifier a {{$immeubles->name }} </p>
								
								</div>


								

								<div class="col-lg-12 text-center">
									<button class="genric-btn primary btn-block" type="submit">Valider la codification</button>											
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