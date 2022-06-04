 @extends('user.layouts.app',['title' => 'A Propos'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Clean Blog')
@section('sub-heding','Bootstrap Template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.banner-area{background:url('user/img/img_10.jpg') right;background-size:cover}
  </style>
@endsection
 @section('main-content')

	<!-- start banner Area -->
	<section class="banner-area relative about-banner" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white text-uppercase">
						A Propos de AEERK				
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('about.index') }}"> A Propos</a></p>
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start feature Area -->
	<section class="feature-area pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4>Qui sommes nous ?</h4>
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
	</section>
	<!-- End feature Area -->		

	<!-- Start info Area -->
	<section class="feature-area pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 no-padding info-area-left">
					<img class="img-fluid" src="{{asset('user/img/presi.jpg')}}" alt="" style="width: 400px;height:400px;">
				</div>
				<div class="col-lg-7 info-area-right">
					<h3 class="text-left pt-2">Younoussa Diallo</h3>
					<h5 class="pt-3">Actuelle president de l'AEERK</h5>
					<p class="text-justify pt-3">
						Chers camarades élèves et étudiants de la région de Kédougou, je tiens à vous souhaiter la bienvenue sur notre site internet qui désormais nous permet d’être informer des activités de l’AEERK, de nous documenter, de pouvoir s’orienter et de s’intégrer dans le monde universitaire.
					</p>
					<p class="text-justify">
						La création de ce site entre effectivement dans le cadre de la politique de numérisation de la structure et pour se faire nous demandons à tout membre de l’AEERK de s’approprier du site et de s’en servir positivement.
					</p> 
					<p class="text-justify">
						Cordialement Younoussa DIALLO président de l’Association des Élèves et Étudiants Ressortissants de Kédougou (AEERK)
					</p>
				</div>
			</div>
		</div>	
	</section>
	<!-- End info Area -->	


<section class="feature-area pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title" style="background-color: #3753db;">
							<h4>Missions</h4>
						</div>
						<div class="desc-wrap">
							<p>
								L’Association Étudiante (AEERK) a pour mission de se donner des moyens humains de rassemblement, de représentation, de revendication et d’offres de sérvices par et pour les éleves et étudiants de la région de kédougou.
							</p>
							<a href="#">Join Now</a>									
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title" style="background-color: #3753db;">
							<h4>Visions</h4>
						</div>
						<div class="desc-wrap">
							<p>
								L’AEERK a pour vision de s’assurer de répondre à l’épanouissement et aux aspirations académiques, culturels, sociaux, spirituels, environnementaux et économiques des éleves et étudiants de la région de kédougou.
							</p>
							<a href="#">Join Now</a>									
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title" style="background-color: #3753db;">
							<h4>Objectifs</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Objectif de l'AEERK <br>
								Elle s'est fixée comme objectif d'inciter les lycéens issus de milieux modestes à oser se lancer dans des études post-bac, en les poussant à approfondir prioritairement les matières scientifiques
							</p>
							<a href="#">Join Now</a>									
						</div>
					</div>
				</div>												
			</div>
		</div>	
	</section>



	<!-- Start course-mission Area -->
	<section class="course-mission-area pb-120">
		<div class="container">
			<h3 class="mb-30 text-center">Nos activites</h3>
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<blockquote class="generic-blockquote text-justify">
					

						<p>
							L’Association Étudiante de la region de kedougou (AEERK) vous propose une foule d’activités, dont, des activités organisées pour les étudiants par des étudiants.
						</p>
						
						<p>
							L’AEER organise tout au long de l’année académique des activités culturelles ,sportives et sociales en toute genre qui sont de nature à profiter à l’ensemble de ses membres et accentuent l’esprit d’appartenance à l’Association Étudiante.
						</p>
						<p>
							L’AEERK donne l’occasion aux eleves et etudiants membres de se rencontrer, de s’exprimer librement, de se divertir et de faire valoir leurs talents.
						</p>
						<p>
							Elle est au cœur d’une vie étudiante trépidante avec une variété d’activités socioculturelles entre autres des rencontres sociales, des réunions amicales, des activités de groupe.
						</p>
 
					</blockquote>
				</div>
			</div>		

			<div class="row">
			</div>
		</div>	
	</section>
	<!-- End course-mission Area -->


	<!-- Start course-mission Area -->
	<section class="course-mission-area pb-120">
		<div class="container">
			<h3 class="mb-30 text-center">Nos domaines d'interventions</h3>	
			<div class="row">
				@foreach($commissions as $com)
				<div class="col-md-6 accordion-left">
					<!-- accordion 2 start-->
					<dl class="accordion">
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">{{$com->name}}</a>
						</dt>
						<dd>
							{!! $com->desc !!}
						</dd>                               
					</dl>
					<!-- accordion 2 end-->
				</div>
				@endforeach
				
			</div>
		</div>	
	</section>
	<!-- End course-mission Area -->

	<!-- Start popular-course Area -->
	<section class="upcoming-event-area section-gap" style="margin-top: -150px;">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Notre Personnelle</h1>
						<p>If you are a serious astronomy fanatic like a lot of us</p>
					</div>
				</div>
			</div>								
			<div class="row">
				<div class="active-upcoming-event-carusel">
					@foreach($teams as $team)
					<div class="single-carusel row align-items-center">
						<div class="col-12 col-md-6 thumb">
							<img class="img-fluid" src="{{ Storage::url($team->image) }}" alt="">
						</div>
						<div class="detials col-12 col-md-6">
							<a href="#"><h4>{{ $team->nom }}</h4></a>
							<p>
								Etudiant et membre du bureau
							</p>
							<p>Commission : 
								@foreach($team->poste->commissions as $post_com)
									{{$post_com->name}} 
								@endforeach
							</p>
							<p>
								Poste : {{$team->poste->name}} 
							</p>
							<p>
								<span class="text-bold" style="font-weight:600;">Profile:</span> <br>
								{!! $team->profile !!}
							</p>
						</div>
					</div>	
					@endforeach																				
				</div>
			</div>
		</div>	
	</section> 
	<!-- End popular-course Area -->

	<!-- Start search-course Area -->
	{{--
		<section class="search-course-area relative" style="margin-bottom:100px;">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-8 col-md-8 search-course-left">
						<h1 class="text-white">
							Obtenez des frais réduits <br> durant cet été !
						</h1>
						<div class="row details-content">
							<div class="col single-detials">
								<span class="lnr lnr-graduation-hat"></span>
								<a href="{{ route('education.index', [ 'type' =>  1 ])}}"><h4>Offres d'emplois & statges</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>
							<div class="col single-detials">
								<span class="lnr lnr-license"></span>
								<a href="{{ route('education.index', [ 'type' =>  3 ])}}"><h4>Bourses D'etudes</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>								
						</div>

						<div class="row details-content">
							<div class="col single-detials">
								<span class="lnr lnr-graduation-hat"></span>
								<a href="{{ route('education.index', [ 'type' =>  5 ])}}"><h4>Formations</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>
							<div class="col single-detials">
								<span class="lnr lnr-license"></span>
								<a href="{{ route('education.index', [ 'type' =>  4 ])}}"><h4>Examan & Concours</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>								
						</div>
					</div>
					<div class="col-lg-4 col-md-4 search-course-right section-gap">
						<form class="form-wrap"  method="POST" action="{{ route('temoignage.post') }}">
							@csrf
							<h4 class="text-white pb-20 text-center mb-30">Faites nous part de votre avis</h4>		
							<div class="mt-10">
								<input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Votre prenom et nom" onfocus="this.placeholder = 'Votre prenom et nom'" onblur="this.placeholder = 'Votre prenom et nom'" required class="single-input">
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong class="message_error">{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<div class="mt-10">
								<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse email" onfocus="this.placeholder = 'Votre adresse email'" onblur="this.placeholder = 'Votre adresse email'" required class="single-input">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong class="message_error">{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="mt-10">
								<textarea class="textarea" name="message" id="" value="{{ old('message') }}" class="form-control @error('message') is-invalid @enderror" required placeholder="Votre message"  style="width: 100%;height:200px;outline:none;"></textarea>								
								@error('message')
									<span class="invalid-feedback" role="alert">
										<strong class="message_error">{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<button type="submit" class="primary-btn text-uppercase">Envoyer</button>
						</form>
					</div>
				</div>
			</div>	
		</section>
	--}}
	<!-- End search-course Area -->


	<!--  les temoignages -->
		<section class="review-area section-gap relative">
			<h3 class="text-center" style="margin-top:-100px;margin-bottom: 15px;">Les Temoignages</h3>		
			<div class="overlay overlay-bg"></div>
			<div class="container">		
				<div class="row">
					<div class="active-review-carusel" >
					@foreach(all_temoignage() as $temoignage)
						<div class="single-review item">
							<div class="title justify-content-start d-flex">
								<a href="#"><h4>{{$temoignage->nom}}</h4></a>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
							<p>
								{{$temoignage->message}}
							</p>
						</div>
					@endforeach																													
					</div>
				</div>
			</div>	
		</section>
	<!--  les temoignages -->		

	

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

