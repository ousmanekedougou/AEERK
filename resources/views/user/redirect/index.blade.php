 @extends('user.layouts.app')
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
								Inscription des Anciens		
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.html"> Elements</a></p>
						</div>	
					</div>
				</div>
			</section>
      <!-- End banner Area -->	
      

      	<!-- Start info Area -->
			<section class="info-area pb-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-4 no-padding info-area-left">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-8 info-area-right">
							<h1>Who we are
							to Serave the nation</h1>
							<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
							<br>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->	

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

