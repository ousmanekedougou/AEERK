 @extends('user.layouts.app',['title' => 'Comment ca marche'])
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
						Comment ça  marche			
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('systeme.index') }}"> Comment ça  marche</a></p>
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start feature Area -->
	<!-- <section class="feature-area pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
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
				<div class="col-lg-4">
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
				</div>												
			</div>
		</div>	
	</section> -->
	<!-- End feature Area -->	

	<section class="mt-5">
		<div class="container">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<h3 class="text-heading text-center text-uppercase">Comment s'inscrire pour les codifications</h3>
						<p class="sample-text text-justify">
							“Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking” 
						</p>
					</div>
					<div class="col-lg-2"></div>
				</div>
		</div>
	</section>	
	
	<section class="" >
		<div class="container">
			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<h3 class="mb-30 text-uppercase text-center">Pour les nouveaux</h3>
						<p class="text-justify">
							“Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking” 
						</p>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>


			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<h3 class="mb-30 text-uppercase text-center">Pour les anciens</h3>
						<p class="text-justify">
							“Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking” 
						</p>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>

			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
							<h3 class="mb-30 text-uppercase text-center">Consernant les recasements</h3>
							<p class="text-justify">
								“Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking” 
							</p>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
		</div>
	</section>

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

