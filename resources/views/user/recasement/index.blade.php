@extends('user.layouts.app',['title' => 'recasement'])
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
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="">Recasement</a></p>
						</div>	
					</div>
				</div>
			</section>
     		 <!-- End banner Area -->	

			<section class="feature-area" style="margin-bottom: -30px;">
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
						<!-- <div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>No.1 of universities</h4>
								</div>
								<div class="desc-wrap">
									<p>
										For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
									</p>
									<a href="#">Join Now</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Huge Library</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
									<a href="#">Join Now</a>									
								</div>
							</div>
						</div>												 -->
					</div>
				</div>	
			</section>
      

      		<section class="feature-area" style="margin-top: -30px;">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-3 col-md-3 ">
							</div>

							<div class="col-lg-6 col-md-6 " style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;padding:20px;background-color:white;color:black;">
								<div class="">
									<h3 class="mb-30 text-center">S'inscrire Pour Les Recasements</h3>
									<form action="{{ route('recasement.store') }}" method="POST">
										@csrf
										<div class="mt-10">
											<label for="email" style="font-weight: bold;">Votre adresse email</label>
											<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="mt-10">
											<label for="phone" style="font-weight: bold;">Votre numero de telephone</label>
											<input type="number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input">
											@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="input-group-icon mt-10 mb-5">
											<div class="form-select">
											<label for="immeuble" style="font-weight: bold;">Choisissez votre immeuble</label>
												<select  value="{{ old('immeuble') }}" class="form-control @error('immeuble') is-invalid @enderror" name="immeuble">
													@foreach($immeuble as $imb)
													<option  value="{{ $imb->id }}">{{$imb->name}}</option>
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
											<input type="submit" value="Enregistre l'inscription" class="btn btn-primary btn-block">
										</div>
									</form>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 ">
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- End Align Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

