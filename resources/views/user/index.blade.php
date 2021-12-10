@extends('user.layouts.app',['title' => 'acceuil'])
@section('head')
		<style type="text/css">
						
			#myModal {
				position:fixed; 
				display : none; 
				top : 25%; 
				
			}
			.logo-slider .item{
			background-color: #fff;
			box-shadow: 0 4px 5px #cacaca;
			border: 1px solid blue;
			border-radius: 8px;
			padding: 15px;
			}
			.logo-slider .item img{
				width: 100%;
			}
				.logo-slider .slick-slide{
				margin: 15px;
			}
			.slick-dots li.slick-active button:before{
				color: #ff5722;
			}
			.slick-dots li button:before{
				font-size: 12px;
			}
			.slick-next:before,.slick-prev:before{
				color: #ff8159;
				font-size: 24px;
			}
			.item:hover{
				display: block;
				transition: all ease 0,3s;
				transform: scale(1.1) translateY(-5px);
			}

			@media (max-width: 768px) {
				.slick-next,.slick-prev {
					width: 1rem;
					height: 1rem;
					margin: 0 10px 0 5px;
				}
				.logo-slider .slick-slide{
					margin: 4px;
				}
				.logo-slider .item{
					padding: 5px;
				}
			}

		</style>

@endsection
@section('main-content')
    		<!-- start banner Area -->
            <section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
							Plateforme de codification
								<!-- CODIFIER EN TOUTE SECURITE		 -->
							</h1>
							<p class="pt-10 pb-10">
								In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
							</p>
							<a href="{{ route('education.index') }}" class="primary-btn text-uppercase" style="border-radius: 5px;">Documentation</a>
							
						</div>										
					</div>
				</div>					
			</section>

			@include('user.message.index')
			<!-- End banner Area -->

			<section class="feature-area" style="margin-bottom: 50px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="desc-wrap">
									<p>
										<img src="{{ asset('user/img/3ccs.jpg') }}" alt="" srcset="">
									</p>								
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Présentation de la plateforme</h4>
								</div>
								<div class="desc-wrap">
									<p class="text-justify">
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem placeat necessitatibus impedit itaque doloremque laudantium iusto sequi veritatis inventore a hic nulla dolore aperiam aut, fugit reprehenderit earum esse temporibus expedita doloribus alias cum autem ad sint. Dolores labore saepe quidem sed aspernatur numquam illum iure duuj hjjjjj rjjjr jrjjkr 
									</p>
									<a href="{{ route('education.index', [ 'type' =>  4 ])}}">Voire</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Instructions</h4>
								</div>
								<div class="desc-wrap">
									<p class="text-justify">
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem placeat necessitatibus impedit itaque doloremque laudantium iusto sequi veritatis inventore a hic nulla dolore aperiam aut, fugit reprehenderit earum esse temporibus expedita doloribus alias cum autem ad sint. Dolores labore saepe quidem sed aspernatur numquam illum iure duuj hjjjjj rjjjr jrjjkr 
									</p>
									<a href="{{ route('education.index', [ 'type' =>  4 ])}}">Voire</a>									
								</div>
							</div>
						</div>											
					</div>
				</div>	
			</section>

			

			
			<!-- Nos activites officiell-->
			{{-- <section class="upcoming-event-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Nos Activites</h1>
								<p>If you are a serious astronomy fanatic like a lot of us</p>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="active-upcoming-event-carusel">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="{{ asset('user/img/e1.jpg') }}" alt="">
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
							</div>																						
						</div>
					</div>
				</div>	
			</section> --}}
			<!-- Fin de nos activite officielle-->

			
						
		
			

			<!-- Start search-course Area -->
			{{-- <section class="search-course-area relative" style="margin-bottom:100px;">
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
			</section> --}}
			<!-- End search-course Area -->


			
			

			
			<!-- Start blog Area -->
			{{-- <section class="blog-area section-gap" id="blog" style="margin-top: -150px;">
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
			</section> --}}
			<!-- End blog Area -->	


			<!-- Nos partenaire -->
			{{-- <section class="upcoming-event-area section-gap" style="margin-top: -150px;">

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
					<div class="logo-slider" style="margin-top: -50px;">
						@foreach(all_part() as $partenaire)
							<div class="item"><a href="#"><img src="{{ Storage::url($partenaire->image) }}" alt="" srcset=""></a></div>
						@endforeach
					</div>
				</div>
			</section> --}}


				<!--  les temoignages -->
			{{-- <section class="review-area section-gap relative" style="margin-top: -100px;">
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
			</section> --}}
			<!--  les temoignages -->	

	

		

@endsection

@section('js')

<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
@endsection


