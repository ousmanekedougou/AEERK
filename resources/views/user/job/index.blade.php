 @extends('user.layouts.app',['title' => 'Emplois & Stages'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.banner-area{background:url('user/img/img_6.jpg') right;background-size:cover}
  </style>
  	{{--<link rel="stylesheet" href="{{asset('user/build/css/demo.css')}}">--}}
	<link rel="stylesheet" href="{{asset('user/build/css/intlTelInput.min.css')}}">
@endsection
 @section('main-content')

    <!-- start banner Area -->
        <section class="banner-area relative about-banner" id="home">	
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Offres d'emploi	
                        </h1>	
                        <p class="text-white link-nav"><a href="/">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('ancien.create') }}"> Emplois & Stages</a></p>
                    </div>	
                </div>
            </div>
        </section>
    <!-- End banner Area -->


	<!-- Start feature Area -->
	<section class="feature-area pb-80">
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




    <!-- Start top-category-widget Area -->
		<section class="top-category-widget-area pb-90 ">
			<div class="container">
				<div class="row">		
					<div class="col-lg-4">
						<div class="single-cat-widget">
							<div class="content relative">
								<div class="overlay overlay-bg"></div>
								<div>
									<div class="thumb">
										<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/economie.jpeg')}}" style="width: 360px;height:220px;" alt="">
									</div>
									<div class="content-details">
										<h4 class="content-title mx-auto text-uppercase">Informatique</h4>
										<span></span>								        
										<p>Le Sénégal est l'une des économies les plus performantes d'Afrique subsaharienne. </p>
										<a href="http://" target="_blank" rel="noopener noreferrer">S'inscrire</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-cat-widget">
							<div class="content relative">
								<div class="overlay overlay-bg"></div>
								<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/politique.jpg')}}" style="width: 360px;height:220px;" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Gestion</h4>
									<span></span>								        
									<p>Le Sénégal est une république à régime présidentiel multipartite où le Président exerce la charge de chef de l'État et le Premier ministre, la fonction de chef du gouvernement.</p>
								</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-cat-widget">
							<div class="content relative">
								<div class="overlay overlay-bg"></div>
								<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/education.jpg')}}" style="width: 360px;height:220px;" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Economie</h4>
									<span></span>
									<p>Au Sénégal, l'éducation formelle est structurée en six sous-secteurs à l'intérieur desquels interviennent une offre d'enseignement publique et privée.</p>
								</div>
								</a>
							</div>
						</div>
					</div>												
				</div>
			</div>	
		</section>
	<!-- End top-category-widget Area -->	

	

 @endsection


