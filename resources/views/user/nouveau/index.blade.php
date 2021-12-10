 @extends('user.layouts.app',['title' => 'Admission'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
  </style>
  	<link rel="stylesheet" href="{{asset('user/build/css/intlTelInput.css')}}">
  	<link rel="stylesheet" href="{{asset('user/build/css/demo.css')}}">
@endsection
 @section('main-content')

	<!-- start banner Area -->
  			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Inscription des Nouveaux		
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Nouveaux</a></p>
						</div>	
					</div>
				</div>
			</section>
      <!-- End banner Area -->	

	<!-- <section class="feature-area pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4>Learn Online Courses</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Usage of the Internet is becoming more common due to rapid advancement
								of technology.
							</p>
							<a href="#">Join Now</a>									
						</div>
					</div>
				</div>									
			</div>
		</div>	
	</section> -->
      

      		<section class="feature-area pb-120">
				<div class="container">
					<div class="section-top-border">
						<div class="row">

							<div class="col-lg-2 col-md-2 mt-sm-30 element-wrap">
								
							</div>

							<div class="col-lg-8 col-md-8" style="background-color:#fff;padding:20px;margin:3px;border-radius:3px;">
								<h3 class="mb-30 text-center">S'inscrire Pour la codifications</h3>
								<form action="{{ route('nouveau.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
									@csrf
									<div class="row">
										<div class="col-sm-4 d-flex justify-content-between">
											<div class="switch-wrap d-flex justify-content-between">
												<p class="label_form">Femme</p>
												<div class="primary-switch ml-3 mr-3 mt-1 bg-secondary">
													<input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror" id="success-switch">
													<label class="label_form" for="success-switch"></label>
												</div>
											</div>
											<div class="switch-wrap d-flex justify-content-between">
												<p class="ml-4 label_form">Homme</p>
												<div class="confirm-switch ml-3 mt-1 bg-secondary">
													<input type="radio" value="{{ old('genre') ?? 2 }}" class=" @error('genre') is-invalid @enderror" name="genre" id="info-switch">
													<label class="label_form" for="info-switch"></label>
													@error('genre')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
											<label class="label_form" for="prenom">Votre Prenom</label>
												<input type="text"  value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
												@error('prenom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
											<label class="label_form" for="nom">Votre Nom  </label>
												<input type="text"  value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
												@error('nom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										
									</div>
									
									
									<div class="row">
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="email">Votre Adresse E-mail</label>
												<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre Adresse E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Adresse Email'" required class="single-input">
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="phone">Votre Numero De Telephone</label>
												<input type="number" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Numero de telephone'" required class="single-input">
												<input type="hidden" name="indicatif" id="indicatif">
												@error('phone')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="input-group-icon mt-10">
												<label class="label_form" for="commune">Votre Commune</label>
												<div class="form-select">
													<select value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" name="commune">
														 <option selected>Selectionne votre commune</option>
														@foreach($departement as $dep)
														<optgroup label="Departement de {{ $dep->name }}">
															@foreach($dep->communes as $dep_com)
															<option value="{{ $dep_com->id }}">{{$dep_com->name}}</option>
															@endforeach
														</optgroup>
														@endforeach
													</select>
														
														@error('commune')
															<span class="invalid-feedback" role="alert">
																<strong class="message_error">{{ $message }}</strong>
															</span>
														@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="">Votre Photo Format (CNI)</label>
												<input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('image')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									
									</div>
									

									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="mt-10">
												<label class="label_form" for="">Photocopie CNI ou Extrait D'un De Vos Parents</label>
												<input type="file" value="{{ old('extrait') }}" class="form-control @error('extrait') is-invalid @enderror" name="extrait" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('extrait')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="">Votre Photocopie de CNI</label>
												<input type="file" name="photocopie" value="{{ old('photocopie') }}" class="form-control @error('photocopie') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('photocopie')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									
									</div>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="">Votre Votre Relever De Note Du Baccalaureat</label>
												<input type="file" name="relever" value="{{ old('relever') }}" class="form-control @error('relever') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('relever')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="mt-10">
											<label class="label_form" for="">Votre attestation du Baccalaureat</label>
												<input type="file" name="attestation" value="{{ old('attestation') }}" class="form-control @error('attestation') is-invalid @enderror"  placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('attestation')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="mt-10">
										<input type="submit" value="Enregistrez l'inscription" class="btn btn-primary btn-block">
									</div>
								</form>
							</div>
							<div class="col-lg-3 col-md-3 mt-sm-30 element-wrap">
								
							</div>
						

						</div>
					</div>
				</div>
			</section>
			<!-- End Align Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
  <script src="{{asset('user/build/js/intlTelInput.js')}}"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "user/build/js/utils.js",
    });


	function validation(){
		var phone = document.forms["myform"]["phone"];
		var get_num_1 = String(phone.value).charAt(0);
		var get_num_2 = String(phone.value).charAt(1);
		var get_num_final = get_num_1+''+get_num_2;
		var first_num = Number(get_num_final);
		if (isNaN(phone.value)) {
			alert('Votre numero de telephone est invalide');
			return false;
		}else if(phone.value.length != 9){
			alert('Votre numero de telphone doit etre de 9 caracter exp: 77xxxxxxx');
			return false;
		}else if(first_num != 77 & first_num != 78 & first_num != 76 & first_num != 70 & first_num != 75  ){
			alert('Votre numero de telphone doit commencer par un (77 ou 78 ou 76 ou 70 ou 75)')
			return false;
		}
		return true;
	}


  </script>
 @endsection

