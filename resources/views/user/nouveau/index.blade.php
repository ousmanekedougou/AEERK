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
								Inscription des Nouveau		
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

							<div class="col-lg-3 col-md-3 mt-sm-30 element-wrap">
								<div class="single-element-widget">
									<h3 class="mb-30">Switches</h3>
									<div class="switch-wrap d-flex justify-content-between">
										<p>01. Sample Switch</p>
										<div class="primary-switch">
											<input type="checkbox" id="default-switch">
											<label for="default-switch"></label>
										</div>
									</div>
									<div class="switch-wrap d-flex justify-content-between">
										<p>02. Primary Color Switch</p>
										<div class="primary-switch">
											<input type="checkbox" id="primary-switch" checked>
											<label for="primary-switch"></label>
										</div>
									</div>
									<div class="switch-wrap d-flex justify-content-between">
										<p>03. Confirm Color Switch</p>
										<div class="confirm-switch">
											<input type="checkbox" id="confirm-switch" checked>
											<label for="confirm-switch"></label>
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
                				</div>
                
							</div>

							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30">S'inscrire Pour la codifications</h3>
								<form action="{{ route('nouveau.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-sm-4">
											<div class="switch-wrap d-flex justify-content-between">
												<p>Femme</p>
												<div class="primary-switch">
													<input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror" id="success-switch">
													<label for="success-switch"></label>
												</div>
											</div>
											<div class="switch-wrap d-flex justify-content-between">
												<p>Homme</p>
												<div class="confirm-switch">
													<input type="radio" value="{{ old('genre') ?? 2 }}" class=" @error('genre') is-invalid @enderror" name="genre" id="info-switch">
													<label for="info-switch"></label>
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
										<div class="col-md-6">
											<div class="mt-10">
											<label for="nom"> Votre Nom </label>
												<input type="text"  value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Votre Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
												@error('nom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="mt-10">
											<label for="prenom">Votre Prenom</label>
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
										<div class="col-md-6">
											<div class="mt-10">
											<label for="email">Votre Adresse E-mail</label>
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
											<label for="phone">Votre Numero De Telephone</label>
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
										<div class="col-md-6">
											<div class="input-group-icon mt-10">
												<label for="commune">Votre Commune</label>
													<!-- <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> -->
												<div class="form-select">
													<select value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" name="commune">
														<option ></option>
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
										<div class="col-md-6">
											<div class="mt-10">
											<label for="">Votre Photo Format (CNI)</label>
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
												<label for="">Photocopie CNI ou Extrait D'un De Vos Parents</label>
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
											<label for="">Votre Photocopie de CNI</label>
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
											<label for="">Votre Votre Relever De Note Du Baccalaureat</label>
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
											<label for="">Votre attestation du Baccalaureat</label>
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
										<input type="submit" value="Enregistre" class="btn btn-success">
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

