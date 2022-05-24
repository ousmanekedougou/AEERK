 @extends('user.layouts.app',['title' => 'Modification Ancien'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.banner-area{background:url('user/img/img_6.jpg') right;background-size:cover}
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
						<p class="text-white link-nav"><a href="/">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('ancien.index') }}"> Ancien</a></p>
					</div>	
				</div>
			</div>
		</section>
	<!-- End banner Area -->	


	<section class="feature-area pb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4>Note d'information</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Cette page est reserve pour la modification des documents des etudiants anciens enregistre. <br>
								Si toute fois vous etes un anciens et que vous n'etiez pas inscrit cliquer sur le lien s'inscrire ci-dessous pour vous inscrire comme ancien.
							</p>
							<a style="text-decoration: underline;" href="{{ route('ancien.create') }}">Cliquez ici pour s'inscrire comme ancien</a>									
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>


	<section class="feature-area pb-120">
		<div class="container">
			<div class="section-top-border">

				<div class="row">

					<div class="col-lg-2 col-md-2 col-sm-2 mt-sm-30 element-wrap">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8" style="background-color:#fff;padding:20px;margin:3px;border-radius:3px;">
						<h3 class="mb-30 text-center">Entrez vos informations</h3>
						<div class="single-element-widget">
							<form action="{{ route('update_certificat') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-6">
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
									<div class="col-md-6">
										<div class="mt-10">
											<label class="label_form" for="update_phone">Votre Numero De Telephone existant</label>
											<input type="number" value="{{ old('update_phone') }}" class="form-control @error('update_phone') is-invalid @enderror" name="update_phone" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Numero de telephone'" required class="single-input">
											@error('update_phone')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
								
								

								<h3 class="mb-30 mt-30 text-center">Modifier vos documments</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="mt-10">
											<label class="label_form" for="update_certificat">Votre Certificat D'inscription de l'annee</label>
											<input type="file" name="update_certificat" value="{{ old('update_certificat') }}" class="form-control @error('update_certificat') is-invalid @enderror"  placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
											@error('update_certificat')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="mt-10">
											<label class="label_form" for="update_relever">Relever de note de l'annee</label>
											<input type="file" name="update_relever" value="{{ old('update_relever') }}" class="form-control @error('update_relever') is-invalid @enderror" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
											@error('update_relever')
												<span class="invalid-feedback" role="alert">
													<strong class="message_error">{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-group-icon mt-10">
											<label class="label_form text-center mt-3" for="immeuble" style="width: 100%;">Choisire votre immeuble</label>
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
									</div>
								</div>
								
								
								
								<div class="mt-10">
									<input type="submit" value="Enregistrez l'inscription" class="btn btn-primary btn-block ">
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 mt-sm-30 element-wrap">
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