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
	 .single-feature .title{
		 background-color: #3753db;
	 }
	.banner-area{background:url('user/img/bibl.jpg') right;background-size:cover}
	@media (max-width: 768px) {
		form .row .recherche_bibliotheque{
			visibility: hidden;
			opacity: 0;
			width: 0px;
			height: 0px;
		}
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
	<section class="feature-area pb-120" >
		<div class="container">
			<div class="row mt-4">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4 class="text-uppercase">Des livres pour toutes les facultes</h4>
						</div>
						<div class="desc-wrap">
							<div class="row" style="padding-top:10px;">
								<div class="col-lg-12">
									<form action="{{ route('bibliotheque.search') }}" method="post">
										@csrf
										<div class="row">
											<div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
												<input type="text" value="{{ old('q') }}" class="single-input-primary form-control @error('q') is-invalid @enderror"  name="q" placeholder="Rechercher votre documents" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rechercher votre documents'" required style="border: 1px solid blue;">
												@error('q')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error">{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="col-lg-3 recherche_bibliotheque" style="padding:0px;margin-left:-53px;"><button type="submit" class="genric-btn primary-border radius arrow">Rechercher <span class="lnr lnr-search"></span></button></div>
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



	<!-- Start feature Area -->
	<section class="feature-area pb-70">
		<div class="container">
			
			<div class="row">
				@foreach($facultes as $faculty)
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="desc-wrap">
							<h4>{{$faculty->name}}</h4>
							<br>
							<a href="{{ route('bibliotheque.show',$faculty->slug) }}">Voir les livres</a>									
						</div>
					</div>
				<br>
				</div>
				@endforeach											
			</div>
				<div class="text-center">{{$facultes->links()}}</div>
		</div>	
	</section>
	<!-- End feature Area -->



	{{--
	<section class="" style="margin-top: -100px;">
		<div class="container">
			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						@foreach($documents as $doc)
						<div class="row">
							<div class="col-lg-3">
								<img src="{{Storage::url($doc->image)}}" style="width: 100%;height:auto;" alt="" srcset="">
							</div>
							<div class="col-lg-9" style="padding-top: 5px;">
								<h6 class="mb-30 text-uppercase" style="margin-bottom: -2px;">{{$doc->title}}</h6>
								<div> <span class="prefix">Auteur : </span> {{$doc->auteur}} </div>
								<div> <span class="prefix">Suject : </span> {{$doc->subject}} </div>
								<div> <span class="prefix">Date de publication : </span> {{$doc->pub_at}} </div>
								<div>
									<span class="prefix"> Resume : </span> 
									{!! $doc->desc !!}
									<div class="button-group-area">
										<a href="{{Storage::url($doc->file)}}" target="_blank" class="genric-btn primary-border radius arrow small">Voire le documet<span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
							</div>
						</div>
						<br>
						@endforeach
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
		</div>
	</section>
	--}}

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

