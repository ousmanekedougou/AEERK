 @extends('user.layouts.app')
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Admission')
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
									Inscription des Anciens		
								</h1>	
								<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.html"> Elements</a></p>
							</div>	
						</div>
					</div>
				</section>
			<!-- End banner Area -->	
      

      		<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">

						<div class="row">

							<div class="col-lg-3 col-md-3 col-sm-3 mt-sm-30 element-wrap">

								{{-- <div class="single-element-widget">
									<h3 class="mb-30">Switches</h3>
									<div class="switch-wrap d-flex justify-content-between">
										<p>01. Sample Switch</p>
										<div class="primary-switch">
											<input type="checkbox" id="default-switch">
											<label class="label_form" for="default-switch"></label>
										</div>
									</div>
									<div class="switch-wrap d-flex justify-content-between">
										<p>02. Primary Color Switch</p>
										<div class="primary-switch">
											<input type="checkbox" id="primary-switch" checked>
											<label class="label_form" for="primary-switch"></label>
										</div>
									</div>
									<div class="switch-wrap d-flex justify-content-between">
										<p>03. Confirm Color Switch</p>
										<div class="confirm-switch">
											<input type="checkbox" id="confirm-switch" checked>
											<label class="label_form" for="confirm-switch"></label>
										</div>
									</div>
								</div>
								<div class="single-element-widget">
									<h3 class="mb-30">Selectboxes</h3>
									<div class="default-select" id="default-select">
										<select>
											<option value="1">English</option>
											<option value="1">Spanish</option>
											<option value="1">Arabic</option>
											<option value="1">Portuguise</option>
											<option value="1">Bengali</option>
										</select>
									</div>
                				</div> --}}
                
							</div>

							
							<div class="col-lg-8 col-md-8 col-sm-8">
								<h3 class="mb-30">S'inscrire Pour la codifications</h3>
								<form action="{{ route('ancien.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
							
									<div class="row">
										<div class="col-sm-6 d-flex justify-content-between">
											<div class="switch-wrap d-flex justify-content-between">
												<p class="label_form ">Femme</p>
												<div class="primary-switch ml-1 mt-1">
													<input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror" value="1" id="success-switch">
													<label class="label_form" for="success-switch"></label>
													@error('genre')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="switch-wrap d-flex justify-content-between">
												<p class="label_form mr-1">Homme</p>
												<div class="confirm-switch mt-1">
													<input type="radio" value="{{ old('genre') ?? 2 }}" class=" @error('genre') is-invalid @enderror" name="genre" value ="2" id="info-switch">
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
												<label class="label_form" for="nom">Votre Nom</label>
												<input type="text"  value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Votre Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
												@error('nom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
											<label class="label_form" for="prenom">Votre Prenom</label>
												<input type="text"  value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Votre Prenom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Prenom'" required class="single-input">
												@error('prenom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
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
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
											<label class="label_form" for="phone">Votre Numero De Telephone</label>
												<input type="number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Numero de telephone'" required class="single-input">
												@error('phone')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="input-group-icon mt-10">
												<div class="form-select" id="default-select">
													<label class="label_form" for="commune">Votre Commune</label>
													<select value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" name="commune">
														<option desable>Votre Commune</option>
														@foreach($departement as $dep)
															<p>{{ $dep->name }}</p>
															@foreach($dep->communes as $dep_com)
															<option value="{{ $dep_com->id }}">{{$dep_com->name}}</option>
															@endforeach
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
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="input-group-icon mt-10">
												<div class="form-select" id="default-select">
													<label class="label_form" for="immeuble">Votre Immeuble De Choix</label>
													<select value="{{ old('immeuble') }}" class="form-control @error('immeuble') is-invalid @enderror" name="immeuble">
														<option desable>Votre Immeuble</option>
														@foreach($immeuble as $imb)
														<option value="{{ $imb->id }}">{{$imb->name}}</option>
														@endforeach
													</select>
													@error('immeuble')
														<span class="invalid-feedback" role="alert">
															<strong class="message_error">{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
										
									</div>
									

									<br>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
												<label class="label_form" for="">Votre Attestation Du Baccalaureat</label>
												<input type="file" value="{{ old('extrait') }}" class="form-control @error('extrait') is-invalid @enderror" name="extrait" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('extrait')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
												<label class="label_form" for="">Votre Certificat D'inscription</label>
												<input type="file" name="certificat" value="{{ old('certificat') }}" class="form-control @error('certificat') is-invalid @enderror"  placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('certificat')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
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
										<div class="col-md-6 col-sm-6 col-lg-6">
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

									<div class="mt-10">
										<input type="submit" value="Enregistrez l'inscription" class="btn btn-primary btn-block ">
									</div>
								</form>
							</div>

							
						</div>
						
					</div>
				</div>
			</div>
			<!-- End Align Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

