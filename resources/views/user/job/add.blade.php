 @extends('user.layouts.app',['title' => 'Specialite'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.banner-area{background:url('user/img/img_6.jpg') right;background-size:cover}
  </style>
  	{{--<link rel="stylesheet" href="{{asset('user/build/css/demo.css')}}">--}}
	<link rel="stylesheet" href="{{asset('user/build/css/intlTelInput.min.css')}}">
@endsection
 @section('main-content')

    <!-- start banner Area -->
        <section class="banner-area relative about-banner" id="home">	
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Offres d'emploi	
                        </h1>	
                        <p class="text-white link-nav"><a href="/">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('ancien.create') }}"> Emplois & Stages</a></p>
                    </div>	
                </div>
            </div>
        </section>
    <!-- End banner Area -->


	<!-- Start feature Area -->
	<section class="feature-area pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4>{{$speciality->name}}</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Usage of the Internet is becoming more common due to rapid advancement
								of technology.
							</p>									
						</div>
					</div>
				</div>												
			</div>
		</div>	
	</section>
	<!-- End feature Area -->	

	<section class="feature-area pb-120">
				<div class="container">
					<div class="section-top-border">

						<div class="row" >

							<div class="col-lg-2 col-md-2 col-sm-3 mt-sm-30 element-wrap">
							</div>

							
							<div class="col-lg-8 col-md-9 col-sm-9" style="background-color:#fff;padding:20px;margin:3px;border-radius:3px;">
								
								<form action="{{ route('emplois.store') }}" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validation()">
									@csrf
									<input type="hidden" name="speciality" value="{{ $speciality->id }}">
							
									<div class="row">
										<div class="col-md-6 ">
											<div class="mt-10">
												<label class="label_form" for="niveau">Votre Civilite</label>
												<div class="row">
													<div class="d-flex justify-content-between">
														<div class="switch-wrap d-flex justify-content-between">
															<p class="label_form ml-3">Femme</p>
															<div class="primary-switch ml-3 mr-3 mt-1 bg-secondary">
																<input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror" value="1" id="success-switch">
																<label class="label_form" for="success-switch"></label>
																@error('genre')
																<span class="invalid-feedback" role="alert">
																	<strong class="message_error">{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="switch-wrap d-flex justify-content-between mr-5">
															<p class="label_form ml-4">Homme</p>
															<div class="confirm-switch ml-3 mr-1 mt-1 bg-secondary ">
																<input type="radio" value="{{ old('genre') ?? 2 }}" class=" @error('genre') is-invalid @enderror mr-4" name="genre" value ="2" id="info-switch">
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
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
												<label class="label_form" for="status">Type de demande</label>
												<div class="row">
													<div class="d-flex justify-content-between">
														<div class="switch-wrap d-flex justify-content-between">
															<p class="label_form ml-3">Emploi</p>
															<div class="primary-switch ml-3 mr-3 mt-1 bg-secondary">
																<input type="radio" name="status" value="{{ old('status') ?? 0 }}" class=" @error('status') is-invalid @enderror"  id="deafult-switch">
																<label class="label_form" for="deafult-switch"></label>
																@error('status')
																<span class="invalid-feedback" role="alert">
																	<strong class="message_error">{{ $message }}</strong>
																</span>
																@enderror
															</div>
														</div>
														<div class="switch-wrap d-flex justify-content-between mr-5">
															<p class="label_form ml-4">Stage</p>
															<div class="confirm-switch ml-3 mr-1 mt-1 bg-secondary ">
																<input type="radio" value="{{ old('status') ?? 1 }}" class=" @error('status') is-invalid @enderror mr-4" name="status"  id="primary-switch">
																<label class="label_form" for="primary-switch"></label>
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
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
											<label class="label_form" for="name">Votre Prenom et nom</label>
												<input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Votre name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Prenom'" required class="single-input">
												@error('prenom')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
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
													<!-- <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> -->
												<div class="form-select">
													<select value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" name="commune" >
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
										<div class="col-sm-6">
											<div class="input-group-icon mt-10">
												<label class="label_form" for="niveau">Votre Niveau d'etude</label>
												<div class="form-select">
													<select value="{{ old('niveau') }}" class="form-control @error('niveau') is-invalid @enderror" name="niveau" >
														<option value="1">Licence 1</option>
														<option value="2">Licence 2 / BTS</option>
														<option value="3">Licence 3</option>
														<option value="4">Master 1</option>
														<option value="5">Master 2</option>
													</select>
													@error('niveau')
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
												<label class="label_form" for="">Votre curriculum vitae en PDF</label>
												<input type="file" value="{{ old('cv') }}" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('cv')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											<div class="mt-10">
												<label class="label_form" for="">Votre photocopie de CNI en PDF</label>
												<input type="file" name="cni" value="{{ old('cni') }}" class="form-control @error('cni') is-invalid @enderror"  placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
												@error('cni')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mt-30">
												<label class="label_form" for="">Votre profile</label>
												<textarea name="profile" id="profile" value="{{ old('profile') }}" class="form-control @error('profile') is-invalid @enderror" id="" style="width: 100%;height:200px;"></textarea>
												@error('profile')
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

							<div class="col-lg-3 col-md-3 col-sm-3 mt-sm-30 element-wrap">
							</div>

						</div>
						
					</div>
				</div>
			</section>
			<!-- End Align Area -->
	

 @endsection @section('js')
	<script src=" {{ asset('user/ckeditor/ckeditor.js') }} "></script>
 @endsection


