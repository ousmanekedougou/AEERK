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
					<img class="img-fluid" src="{{asset('user/img/about-img.jpg')}}" alt="">
				</div>
				<div class="col-lg-7 info-area-right">
					<h1 class="text-center">Mot Du President</h1>
					<p class="text-justify">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
					<p class="text-justify">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
					
					<p class="text-justify">
						inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
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
								Usage of the Internet is becoming more common due to rapid advancement
								of technology.
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
								For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
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
								If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
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
						“Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking” 
					</blockquote>
				</div>
			</div>		

			<div class="row">
				<div class="col-md-6 accordion-left">
					<!-- accordion 2 start-->
					<dl class="accordion">
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Social</a>
						</dt>
						<dd>
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
						</dd>
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Pedagogique</a>
						</dt>
						<dd>
							Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
						</dd>
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Sportive</a>
						</dt>
						<dd>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
						</dd>                                
					</dl>
					<!-- accordion 2 end-->
				</div>
				<div class="col-md-6 accordion-right">
					<dl class="accordion">
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Organisation</a>
						</dt>
						<dd>
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
							Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
						</dd>
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Culturelle</a>
						</dt>
						<dd>
							Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
						</dd>
						<dt>
							<a href="" class="text-uppercase" style="font-weight: 700;">Commission Femminine</a>
						</dt>
						<dd>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
						</dd>                                  
					</dl>
					
				</div>
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

