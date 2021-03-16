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

								 <div class="single-element-widget">
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
                				</div>
                
							</div>

							
							<div class="col-lg-8 col-md-8 col-sm-8">
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
									Mise a jour de vos documents	
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

								 <div class="single-element-widget">
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
                				</div>
                
							</div>

							
							<div class="col-lg-8 col-md-8 col-sm-8">
                            <h3 class="mb-30">Modifier vos documments</h3>
								<div class="single-element-widget">
									<form action="{{ route('update_certificat') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
										<div class="mt-10">
											<label class="label_form" for="update_email">Votre Adresse E-mail existant</label>
												<input type="email" value="{{ old('update_email') }}" class="form-control @error('update_email') is-invalid @enderror" name="update_email" placeholder="Votre Adresse E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Adresse Email'" required class="single-input">
												@error('update_email')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="mt-10">
										<label class="label_form" for="update_phone">Votre Numero De Telephone existant</label>
											<input type="number" value="{{ old('update_phone') }}" class="form-control @error('update_phone') is-invalid @enderror" name="update_phone" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Numero de telephone'" required class="single-input">
											@error('update_phone')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="mt-10">
											<label class="label_form" for="update_certificat">Votre Certificat D'inscription</label>
											<input type="file" name="update_certificat" value="{{ old('update_certificat') }}" class="form-control @error('update_certificat') is-invalid @enderror"  placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
											@error('update_certificat')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
                                        <div class="mt-10">
                                            <label class="label_form" for="update_image">Votre Photo Format (CNI)</label>
                                            <input type="file" name="update_image" value="{{ old('update_image') }}" class="form-control @error('update_image') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                                            @error('update_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="message_error">{{ $message }}</strong>
                                                </span>
                                            @enderror
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
			</div>
			<!-- End Align Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection


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

