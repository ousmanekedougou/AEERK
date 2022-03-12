@extends('user.layouts.app',['title' => 'acceuil'])
@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
<style>
	.feature-area{
		padding-left: 5px;
		padding-right: 5px;
	}
</style>
@endsection
    	

			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">	
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							@include('user.message.index')
						</div>
						<div class="col-md-3"></div>
					</div>			
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white text-uppercase">
								Portail de l'aeerk		
							</h1>	
							<!-- <p class="text-white link-nav"><a class="btn btn-primary btn-sm text-uppercase" href="#form">S'inscrire ici <i class="fa fa-plus"></i></a> </p> -->
						</div>	
					</div>
				</div>
			</section>
	
			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<div class="single-feature">
								<div class="desc-wrap">
									<p>
										<img src="{{ asset('user/img/3ccs.jpg') }}" alt="" width="100%;height:auto;" srcset="">
									</p>								
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="single-feature">
								<div class="title">
									<h4>Description du portail</h4>
								</div>
								<div class="desc-wrap text-left">
									<p>
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia ut quas alias aliquid pariatur autem odit fugit nobis cupiditate ipsa.
									</p>
									<p>
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia ut quas alias aliquid pariatur autem odit fugit nobis cupiditate ipsa.
									</p>
									<p>
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia ut quas alias aliquid pariatur autem odit fugit nobis cupiditate ips.
									</p>
									<!-- <a href="#">Voire</a>									 -->
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- Start info Area -->
			<section class="popular-course-area section-gap" style="margin-bottom:0;margin-top:-70px;" id="form">
				<div class="container">
					<div class="title text-center">
						<h4>Formulaire d'inscription</h4>
					</div>
					<form action="{{ route('recrutement.store') }}" method="POST" enctype="multipart/form-data"  style="background-color:#fff;padding:20px;margin:3px;border-radius:8px;padding:20px;">
						@csrf
						<div class="row">
							<div class="col-sm-3 d-flex justify-content-between" style="border: 1px solid rgba(177, 171, 171, 0.301);margin-left:15px;padding-top:6px;">
								<div class="switch-wrap d-flex justify-content-between">
									<p class="label_form">Femme</p>
									<div class="primary-switch ml-2 mr-2 mt-1">
										<input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror" id="success-switch">
										<label class="label_form" for="success-switch"></label>
									</div>
								</div>
								<div class="switch-wrap d-flex justify-content-between" >
									<p class="ml-3 label_form">Homme</p>
									<div class="confirm-switch ml-3 mt-1">
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
							<div class="col-md-6">
								<div class="mt-10">
									<label class="label_form" for="name"> Prenom et nom</label>
									<input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Votre prenom et nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre prenom et nom'" required class="single-input">
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="email">Votre Adresse E-mail</label>
									<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre Adresse E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Adresse Email'" required class="single-input">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="phone">Votre Numero De Telephone</label>
									<input type="number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Votre Numero de telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Numero de telephone'" required class="single-input">
									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="date">Votre date de naissance</label>
									<input type="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="Votre date de naissance" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre date de naissance'" required class="single-input">
									@error('date')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="lieu">Votre lieu de naissance</label>
									<input type="lieu" value="{{ old('lieu') }}" class="form-control @error('lieu') is-invalid @enderror" name="lieu" placeholder="Votre lieu de naissance" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre lieu de naissance'" required class="single-input">
									@error('lieu')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="input-group-icon mt-10">
									<label class="label_form" for="commune">Votre commune</label>
									<div class="form-select">
										<select value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" name="commune">
											<option desable>Choisissez votre commune</option>
											@foreach($departements as $dep)
											<optgroup label="{{ $dep->name }}">
												@foreach($dep->communes as $dep_com)
													<option style="margin-left: 20px;" value="{{$dep_com->id}}"> {{$dep_com->name}}</option>
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

								<div class="input-group-icon mt-10">
									<label class="label_form" for="niveau">Votre niveau d'etude</label>
									<div class="form-select">
										<select value="{{ old('niveau') }}" class="form-control @error('niveau') is-invalid @enderror" name="niveau">
											<option value="licence 1">licence 1</option>
											<option value="licence 2">licence 2</option>
											<option value="licence 3">licence 3</option>
											<option value="master 1">master 1</option>
											<option value="master 2">master 2</option>
											<option value="autres">autres</option>
										</select>
										@error('niveau')
											<span class="invalid-feedback" role="alert">
												<strong class="message_error">{{ $message }}</strong>
											</span>
										@enderror
									</div>
									
								</div>

							</div>
							<div class="col-md-6">
								<div class="mt-10">
									<label class="label_form" for="etablissement"> Votre etablissement</label>
									<input type="text"  value="{{ old('etablissement') }}" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" placeholder="Votre etablissement" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre etablissement'" required class="single-input">
									@error('etablissement')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form"> Type de votre etablissement (publique/privee)</label>
									<div class="row" style="border: 1px solid rgba(177, 171, 171, 0.301);margin-left:1px;margin-right:2px;padding-top:6px;">
										<div class="col-sm-4 d-flex justify-content-between" >
											<div class="switch-wrap d-flex justify-content-between">
												<p class="label_form">Publique</p>
												<div class="primary-switch ml-3 mr-2 mt-1">
													<input type="radio" name="status" value="{{old('status') ?? 0}}" class=" @error('status') is-invalid @enderror" id="default-switch">
													<label class="label_form" for="default-switch"></label>
												</div>
											</div>
											<div class="switch-wrap d-flex justify-content-between">
												<p class="ml-2 label_form">Privee</p>
												<div class="confirm-switch ml-2 mt-1">
													<input type="radio" value="{{old('status') ?? 1}}" class=" @error('status') is-invalid @enderror" name="status" id="primary-switch">
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

								<div class="mt-10">
									<label class="label_form" for="filliere"> Votre filliere</label>
									<input type="text"  value="{{ old('filliere') }}" class="form-control @error('filliere') is-invalid @enderror" name="filliere" placeholder="Votre filliere" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre filliere'" required class="single-input">
									@error('filliere')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								

								<div class="mt-10">
									<label class="label_form" for="cni">Photocopie de votre carte d'identite national en pdf</label>
									<input type="file" name="cni" value="{{ old('cni') }}" class="form-control @error('cni') is-invalid @enderror" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									@error('cni')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							
								<div class="mt-10">
									<label class="label_form" for="curiculum">Photocopie de votre Curriculum Vitae en pdf</label>
									<input type="file" name="curiculum" value="{{ old('curiculum') }}" class="form-control @error('curiculum') is-invalid @enderror" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									@error('curiculum')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="diplome">Votre dernier diplome ou attestation obtenu en pdf</label>
									<input type="file" name="diplome" value="{{ old('diplome') }}" class="form-control @error('diplome') is-invalid @enderror" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									@error('diplome')
										<span class="invalid-feedback" role="alert">
											<strong class="message_error">{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="mt-10">
									<label class="label_form" for="image">Votre image en Format (CNI)</label>
									<input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									@error('image')
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
			</section>
			<!-- End info Area -->

			<!-- Start info Area -->
			{{-- <section class="popular-course-area section-gap" style="margin-bottom: -150px;">
				<div class="container">
					<div class="row" style="background-color:#fff;padding:20px;margin:3px;border-radius:8px;">
						<div class="col-lg-5 info-area-left text-center">
							<img style="width:350px;height:350px;border-radius:100%;margin-top:-3px;" class="img-fluid" src="{{asset('user/img/about-img.jpg')}}" alt="">
						</div>
						<div class="col-lg-7 info-area-right">
							<h3>Vous etes ancien</h3>
							<p class="text-justify">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
							<br>
							<p class="text-justify">
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<p class="text-center">
								<a href="" class="btn btn-primary"> <span> <i class="fa fa-user-plus"></i></span> S'inscrire</a>
							</p>
						</div>
					</div>
				</div>	
			</section> --}}
			<!-- End info Area -->
			

		
			
	
			
	@section('footersection')
	<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script>
	$(document).ready(function(){
	$('.select2').select2();
	});

	</script>
	@endsection

@endsection