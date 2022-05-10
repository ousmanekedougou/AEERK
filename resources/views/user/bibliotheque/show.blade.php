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
  </style>
@endsection
 @section('main-content')


<!-- Start blog Area -->
			<section class="blog-area section-gap mb-50 mt-80" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h2 class="mb-10">Faculte : {{$faculty->name}}</h2>
							</div>
						</div>
					</div>					
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

