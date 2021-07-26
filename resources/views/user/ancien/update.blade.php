 @extends('user.layouts.app',['title' => 'Information'])
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
								<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.html"> Informations</a></p>
							</div>	
						</div>
					</div>
				</section>
			<!-- End banner Area -->	


				<section class="feature-area pb-120">
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
      

      		<section class="feature-area pb-120">
				<div class="container">
					<div class="section-top-border">

						<div class="row">

							<div class="col-lg-2 col-md-2 col-sm-3 mt-sm-30 element-wrap">
							</div>

							
							<div class="col-lg-8 col-md-8 col-sm-8" style="background-color:#fff;padding:20px;margin:3px;border-radius:3px;">
                            	<h3 class="mb-30 text-center">Entrez vos informations</h3>
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
										<h3 class="mb-30 mt-30 text-center">Modifier vos documments</h3>
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
                                            <label class="label_form" for="update_image">Votre image Format CNI (facultative)</label>
                                            <input type="file" name="update_image" value="{{ old('update_image') }}" class="form-control @error('update_image') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                                            @error('update_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="message_error">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
										<div class="input-group-icon mt-10">
											<label class="label_form" for="immeuble">Choisire votre immeuble</label>
											<div class="form-select">
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
											<input type="submit" value="Enregistrez l'inscription" class="btn btn-primary btn-block ">
										</div>
									</form>
								</div>
							</div>

							<div class="col-lg-2 col-md-2 col-sm-3 mt-sm-30 element-wrap">
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


