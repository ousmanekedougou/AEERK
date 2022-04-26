 @extends('user.layouts.app',['title' => 'Bibliotheque'])
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	.prefix{
		font-weight: 500;
		color: black;
		text-decoration: underline;
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
						bibliothèque numérique AEERK			
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('bibliotheque.index') }}"> bibliothèque</a></p>
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start feature Area -->
	<section class="feature-area pb-120">
		<div class="container">
			<div class="row mt-4">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="desc-wrap">
							<div class="row" style="padding-top:10px;">
								<div class="col-lg-3 text-center">
									<div class="single-element-widget">
										<h6 class="text-left">Categories</h6>
										<div class="default-select" id="default-select">
											<select>
												<option value="1">English</option>
												<option value="1">Spanish</option>
												<option value="1">Arabic</option>
												<option value="1">Portuguise</option>
												<option value="1">Bengali</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-9">
									<form action="#">
										<div class="row">
											<div class="col-lg-9"><input type="text"  name="search" placeholder="Rechercher votre documents" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rechercher votre documents'" required class="single-input-primary" style="border: 1px solid blue;"></div>
											<div class="col-lg-3" style="padding:0px;margin-left:-53px;"><button style="" type="submit" class="genric-btn primary-border radius arrow">Rechercher <span class="lnr lnr-search"></span></button></div>
										</div>
									</form>
								</div>									
							</div>									
						</div>
					</div>
				</div>										
			</div>
		</div>	
	</section>
	<!-- End feature Area -->	

	
	<section class="" style="margin-top: -100px;">
		<div class="container">
			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						
						<div class="row">
							<div class="col-lg-3">
								<img src="{{ asset('user/img/3ccs.jpg') }}" style="width: 100%;height:auto;" alt="" srcset="">
							</div>
							<div class="col-lg-9" style="padding-top: 5px;">
								<h6 class="mb-30 text-uppercase" style="margin-bottom: -2px;">Titre du documets</h6>
								<div> <span class="prefix">Auteur : </span> Ousmane Diallo </div>
								<div> <span class="prefix">Suject : </span> Sur l'emmigration des jeunnes </div>
								<div> <span class="prefix">Date de publication : </span> le 20/12/1900 </div>
								<div> <span class="prefix"> Resume : </span> 
									<div>
										Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore corrupti maxime provident! Velit, rem voluptatibus. Excepturi quasi enim porro ipsam, magni recusandae, totam quidem dolorum, ut consequuntur perferendis illum voluptate.
										<div class="button-group-area">
											<a href="#" class="genric-btn primary-border radius arrow small">Voire le documet<span class="lnr lnr-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
		</div>
	</section>

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

