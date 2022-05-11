 @extends('user.layouts.app',['title' => 'article'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Clean Blog')
@section('sub-heding','Bootstrap Template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
	 header .section-menu{
		 background-color: #04091e;
	 }
	 .single-feature .title{
		 background-color: #3753db;
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

  	<section class="feature-area" style="margin-top: 130px;margin-bottom:-130px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-feature">
						<div class="title">
							<h4 class="mb-10">Faculte : {{$faculty->name}}</h4>
						</div>
						<div class="desc-wrap">
							<p class="text-justify">
								<div class="row text-center">
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
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 recherche_bibliotheque" style="padding:0px;margin-left:-53px;"><button type="submit" class="genric-btn primary-border radius arrow">Rechercher <span class="lnr lnr-search"></span></button></div>
										</div>
									</form>
								</div>									
							</div>									
							</p>									
						</div>
					</div>
				</div>											
			</div>
		</div>	
	</section>


<!-- Start blog Area -->
			<section class="blog-area section-gap mb-50 mt-80" id="blog">
				<div class="container">				
					<div class="row">
						@foreach($documents as $doc)
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="{{Storage::url($doc->image)}}" alt="">								
							</div>
							<p class="meta">{{ $doc->pub_at }}  |  Auteur <a href="#">{{$doc->auteur}}</a></p>
							<a href="{{Storage::url($doc->file)}}" target="_blank">
								<h5>{{$doc->title}}</h5>
							</a>
							<p>
								{!! $doc->subject !!}
							</p>
							<a href="{{Storage::url($doc->file)}}" target="_blank" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Ovrir</span><span class="lnr lnr-arrow-right"></span></a>		
						</div>
						@endforeach							
					</div>
				</div>	
			</section>
			<!-- End blog Area -->	
	  
{{--
	<!-- Start top-category-widget Area -->
		<section class="top-category-widget-area pt-120 pb-120 mb-50">
			<div class="container">
				<div class="row">
					@foreach($documents as $doc)		
					<div class="col-lg-4">
						<div class="single-cat-widget">
							<div class="content relative">
								<div class="overlay overlay-bg"></div>
								<a href="#" target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{Storage::url($doc->image)}}" style="width: 360px;height:220px;" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">{{$doc->title}}</h4>
									<span></span>								        
									<p>
										<a  target="_blank" href="{{Storage::url($doc->file)}}" class="genric-btn success circle arrow text-bold">Ouvrir le livre</a>
									</p>
								</div>
								</a>
							</div>
						</div>
					</div>
					@endforeach										
				</div>
			</div>	
		</section>
	<!-- End top-category-widget Area -->
--}}

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

