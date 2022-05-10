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
				<div class="banner-content col-lg-12 col-md-12 text-center">
					<h1 class="text-uppercase text-center" style="width: 100%;">
					PORTAILLE DE L'AEERK DE KEDOUGOU
					</h1>
					<h3 class="text-uppercase text-white">Toujours aus services des etudiants</h3>
					<p class="pt-10 pb-10 text-white text-center text-uppercase text-bold">
						(Association des eleves et etudiants ressortissants de kedougou)
					</p>
					{{--<a href="{{ route('systeme.index') }}" class="primary-btn text-uppercase text-center" style="border-radius: 5px;"> <i class="fa fa-cog fa_ajout"></i>  Comment ça  marche</a>--}}
				</div>										
			</div>
		</div>					
	</section>

	@include('user.message.index')
	<!-- End banner Area -->

	<section class="feature-area" style="margin-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<img src="{{ asset('user/img/3ccs.jpg') }}" style="width: 100%;height:auto;" alt="" srcset="">
				</div>
				<div class="col-lg-9">
					<div class="single-feature">
						<div class="title">
							<h4>AEERK (Association des Eleves et Etudiants Ressortissants de Kedougou)</h4>
						</div>
						<div class="desc-wrap">
							<p class="text-justify">
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem placeat necessitatibus impedit itaque doloremque laudantium iusto sequi veritatis inventore a hic nulla dolore aperiam aut, fugit reprehenderit earum esse temporibus expedita doloribus alias cum autem ad sint. Dolores labore saepe quidem sed aspernatur numquam illum iure duuj hjjjjj rjjjr jrjjkr 
							</p>									
						</div>
					</div>
				</div>											
			</div>
		</div>	
	</section>


	<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap" style="margin-top: -60px;">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Nos Derniers Articles</h1>
								<p>Decouvrez toute l'actualite du pays</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
							@foreach(all_article() as $article)
								<div class="single-popular-carusel single-blog">
									<div class="thumb relative">
										<img class="img-fluid" src="{{ Storage::url($article->image) }}" alt="">								
									</div>
									<p class="meta">25 April, 2018  |  Auteur <a href="#">Bureau</a></p>
									<a href="#"  onclick="document.getElementById('update-forms-{{$article->id}}').submit();">
										<h5>{{$article->title}}</h5>
									</a>
									<form id="update-forms-{{$article->id}}" method="post" action="{{ route('article.update',$article->id) }}" style="display:none">
										{{csrf_field()}}
										{{method_field('PUT')}}
									</form>  
									<p>
										{!! $article->resume !!}
									</p>
									<form id="update-form-{{$article->id}}" method="post" action="{{ route('article.update',$article->id) }}" style="display:none">
										{{csrf_field()}}
										{{method_field('PUT')}}
									</form>  
									<a href="#" onclick="document.getElementById('update-form-{{$article->id}}').submit();" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>	
								</div>
							@endforeach							
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->
	

	
	<!-- Nos activites officiell-->
		<section class="popular-course-area section-gap" style="margin-top: -100px;">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-70 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">Quelques documents</h1>
							<p>Une bibliotheque a votre disposition</p>
						</div>
					</div>
				</div>						
				<div class="row">
					<div class="active-popular-carusel">
						@foreach($documents as $doc)
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<img class="img-fluid" src="{{Storage::url($doc->image)}}" alt="">
									</div>								
								</div>
								<div class="details">
									<a href="#">
										<h4>
											<a style="width:100px;height:100px;" href="{{Storage::url($doc->file)}}" target="_blank" rel="noopener noreferrer">{{$doc->title}}</a>
										</h4>
									</a>
									<p>
										{!! $doc->desc !!}										
									</p>
								</div>
							</div>
						@endforeach						
					</div>
				</div>
			</div>	
		</section>
	<!-- Fin de nos activite officielle-->

	
				

	

	<!-- Start search-course Area -->
	<section class="search-course-area relative">
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
									<a href="#"><h4>Expert Instructors</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Certification</h4></a>		
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
	<!-- End search-course Area -->



		<!--  les temoignages -->
	<section class="review-area section-gap relative" style="margin-top:50px;">
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

	<!-- Start cta-one Area -->
			<section class="cta-one-area relative section-gap">
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
			</section>
			<!-- End cta-one Area -->

	

		

@endsection

@section('js')

<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
@endsection


