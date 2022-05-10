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

	  

	<!-- Start top-category-widget Area -->
		<section class="top-category-widget-area pb-120 mb-50" style="padding-top: 160px;">
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
			

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

