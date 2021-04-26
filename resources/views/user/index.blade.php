@extends('user.layouts.app',['title' => 'acceuil'])
@section('main-content')
    		<!-- start banner Area -->
            <section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									@include('user.message.index')
								</div>
							</div>
							<h1 class="text-uppercase">
							Plateforme de codification
								<!-- CODIFIER EN TOUTE SECURITE		 -->
							</h1>
							<p class="pt-10 pb-10">
								In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
							</p>
							<a href="{{ route('systeme.index') }}" class="primary-btn text-uppercase" style="border-radius: 5px;">Get Started</a>
							
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Codification</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Examen & Concours</h4>
								</div>
								<div class="desc-wrap">
									<p>
										For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Etudes & Bourse</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
									<a href="#">Voire</a>									
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- Start info Area -->
			<section class="popular-course-area section-gap" style="margin-bottom: -150px;">
				<div class="container">
					<div class="row" style="background-color:#fff;padding:20px;margin:3px;border-radius:8px;">
						<div class="col-lg-5 info-area-left text-center">
							<img style="width:350px;height:350px;border-radius:100%;margin-top:-3px;" class="img-fluid" src="{{asset('user/img/about-img.jpg')}}" alt="">
						</div>
						<div class="col-lg-7 info-area-right">
							<h3>Vous etes nouveau</h3>
							<p class="text-justify">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
							<br>
							<p class="text-justify">
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<p class="text-center">
								<a href="{{ route('nouveau.index') }}" class="btn btn-primary"> <span> <i class="fa fa-user-plus"></i></span> S'inscrire</a>
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->

			<!-- Start info Area -->
			<section class="popular-course-area section-gap" style="margin-bottom: -150px;">
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
								<a href="{{ route('ancien.index') }}" class="btn btn-primary"> <span> <i class="fa fa-user-plus"></i></span> S'inscrire</a>
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->

			<!-- Start info Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row" style="background-color:#fff;padding:20px;margin:3px;border-radius:8px;">
						<div class="col-lg-5 info-area-left text-center">
							<img style="width:350px;height:350px;border-radius:100%;margin-top:-3px;" class="img-fluid" src="{{asset('user/img/about-img.jpg')}}" alt="">
						</div>
						<div class="col-lg-7 info-area-right">
							<h3>Les recasement</h3>
							<p class="text-justify">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
							<br>
							<p class="text-justify">
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<p class="text-center">
								<a href="{{ route('recasement.index') }}" class="btn btn-primary"> <span> <i class="fa fa-user-plus"></i></span> S'inscrire </a>
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->
					
			<!-- Start popular-course Area -->
			<!-- <section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Examens et Concours</h1>
								<p>Les examens de l'annee et les concours mixtes</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p1.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Designing
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p2.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn React js beginners
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p3.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Photography
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p4.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Surveying
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p1.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Designing
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p2.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn React js beginners
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p3.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Photography
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
								<img class="img-fluid" src="{{asset('user/img/p4.jpg')}}" alt="">
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
										<h4>$150</h4>
									</div>									
								</div>
								<div class="details">
									<a href="#">
										<h4>
											Learn Surveying
										</h4>
									</a>
									<p>
										When television was young, there was a hugely popular show based on the still popular fictional characte										
									</p>
								</div>
							</div>							
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End popular-course Area -->
			

		
			
		
			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap" style="margin-top: -150px;">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">
									Nos Partenaires</h1>
								<p>Si vous etes un membre de l'association ou un natif de la region</p>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="active-upcoming-event-carusel">
						@foreach(all_part() as $partenaire)
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{ Storage::url($partenaire->image) }}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>Depuis Mars, 2018</p>
									<a href="{{ $partenaire->lien }}"><h4>{{ $partenaire->nom }}</h4></a>
									<p>{!! $partenaire->mot !!}</p>
								</div>
							</div>
						@endforeach
							<!-- <div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{asset('user/img/e2.jpg')}}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{asset('user/img/e1.jpg')}}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{asset('user/img/e1.jpg')}}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{asset('user/img/e2.jpg')}}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{asset('user/img/e1.jpg')}}" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>																						 -->
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
						
			<!-- Start review Area -->
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
			<!-- End review Area -->	
			

			<!-- Start search-course Area -->
			<section class="search-course-area relative" style="margin-bottom:100px;">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-white">
								Get reduced fee <br>
								during this Summer!
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-graduation-hat"></span>
									<a href="#"><h4>Offres d'emplois</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Offres de stages</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-6 col-md-6 search-course-right section-gap">
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
			<!-- End search-course Area -->


			
			<!-- Start cta-one Area -->
			<!-- <section class="cta-one-area relative section-gap">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Become an instructor</h1>
							<p>
								There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck.
							</p>
							<a class="primary-btn wh" href="#">Apply for the post</a>								
						</div>					
					</div>
				</div>	
			</section> -->
			<!-- End cta-one Area -->

			
			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Nos Derniers Articles</h1>
								<p>In the history of modern astronomy there is.</p>
							</div>
						</div>
					</div>					
					<div class="row">
					@foreach(all_article() as $article)
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="{{ Storage::url($article->image) }}" alt="">								
							</div>
							<p class="meta">25 April, 2018  |  By <a href="#">Mark Wiens</a></p>
							<a  onclick="document.getElementById('update-forms-{{$article->id}}').submit();">
								<h5>{{$article->title}}</h5>
							</a>
							<form id="update-forms-{{$article->id}}" method="post" action="{{ route('article.update',$article->id) }}" style="display:none">
								{{csrf_field()}}
								{{method_field('PUT')}}
							</form>  
							<p>
								<!-- Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their. -->
							</p>
							<form id="update-form-{{$article->id}}" method="post" action="{{ route('article.update',$article->id) }}" style="display:none">
								{{csrf_field()}}
								{{method_field('PUT')}}
							</form>  
							<a onclick="document.getElementById('update-form-{{$article->id}}').submit();" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>		
						</div>
					@endforeach	
					</div>
				</div>	
			</section>
			<!-- End blog Area -->			




@endsection