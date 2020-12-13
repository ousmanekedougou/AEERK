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
								Inscription Pour Les Recasements	
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
							<div class="col-lg-8 col-md-8 ">
								<div class="col-offset-lg-3 col-lg-9">
								<h3 class="mb-30 ">S'inscrire Pour Les Recasements</h3>
								<form action="{{ route('recasement.store') }}" method="POST">
									@csrf
									<div class="single-element-widget"  style="background-color:black;width:100%;padding:10px;">
									<h3 class="mb-30 text-white">Precisez Votre Status</h3>
									<div class="switch-wrap d-flex justify-content-between">
										<p class="text-white">Cochez cette Case Si Vous Etes un Nouveau</p>
										<div class="primary-switch">
											<input type="radio" name="status" value="{{ old('status') ?? 1 }}" class=" @error('status') is-invalid @enderror" id="default-switch">
											<label for="default-switch"></label>
											@error('status')
											<span class="invalid-feedback" role="alert">
												<strong class="message_error">{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="switch-wrap d-flex justify-content-between">
										<p  class="text-white">Cochez cette Case Si Vous Etes Un Ancien</p>
										<div class="primary-switch">
											<input type="radio" value="{{ old('status') ?? 2 }}" class=" @error('status') is-invalid @enderror"  name="status" id="primary-switch" >
											<label for="primary-switch"></label>
											@error('status')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
											<div class="mt-10">
											<label for="email">Votre Adresse E-mail</label>
												<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="mt-10">
											<label for="phone">Votre Numero De Telephone</label>
												<input type="number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
												@error('phone')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="input-group-icon mt-10 mb-5">
												<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
													<div class="form-select" id="default-select">
													<label for="immeuble">Choisissez Votre immeuble</label>
														<select value="{{ old('immeuble') }}" class="form-control @error('immeuble') is-invalid @enderror" name="immeuble">
															
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
										
									<div class="mt-10">
										<input type="submit" value="Enregistre" class="btn btn-secondary">
									</div>
								</form>
								</div>
							</div>

							<div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
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

						</div>
					</div>
				</div>
			</div>
			<!-- End Align Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

