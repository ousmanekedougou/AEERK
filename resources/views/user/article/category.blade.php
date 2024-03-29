 @extends('user.layouts.app',['title' => 'categories'])
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
								Nos Articles
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('article.index') }}"> Artcle</a></p>
						</div>	
					</div>
				</div>
			</section>
	  	<!-- End banner Area -->	
	  

	  		<!-- Start top-category-widget Area -->
				<!-- <section class="top-category-widget-area pt-90 pb-90 ">
					<div class="container">
						<div class="row">		
							<div class="col-lg-4">
								<div class="single-cat-widget">
									<div class="content relative">
										<div class="overlay overlay-bg"></div>
										<a href="#" target="_blank">
										<div class="thumb">
											<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/cat-widget1.jpg')}}" alt="">
										</div>
										<div class="content-details">
											<h4 class="content-title mx-auto text-uppercase">Social life</h4>
											<span></span>								        
											<p>Enjoy your social life together</p>
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
											<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/cat-widget2.jpg')}}" alt="">
										</div>
										<div class="content-details">
											<h4 class="content-title mx-auto text-uppercase">Politics</h4>
											<span></span>								        
											<p>Be a part of politics</p>
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
											<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/cat-widget3.jpg')}}" alt="">
										</div>
										<div class="content-details">
											<h4 class="content-title mx-auto text-uppercase">Food</h4>
											<span></span>
											<p>Let the food be finished</p>
										</div>
										</a>
									</div>
								</div>
							</div>												
						</div>
					</div>	
				</section> -->
			<!-- End top-category-widget Area -->
			
			<!-- Start post-content Area -->
			<section class="post-content-area pt-90 pb-90">
				<div class="container">
					<div class="row">
						<!-- debut du col-lg-8 -->
						<div class="col-lg-8 posts-list">
							@foreach($category_post->posts as $post)
								<div class="single-post row">
									<div class="col-lg-3  col-md-3 meta-details">
										<ul class="tags">
											@foreach($post->tags as $post_tag)
											<li><a href="#">{{ $post_tag->name }},</a></li>
											@endforeach
										</ul>
										<div class="user-details row">
											<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
											<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $post->created_at->toFormattedDateString() }}</a> <span class="lnr lnr-calendar-full"></span></p>
											<p class="view col-lg-12 col-md-12 col-6"><a href="#">{{ $post->view }} Vue</a> <span class="lnr lnr-eye"></span></p>
											<p class="comments col-lg-12 col-md-12 col-6"><a href="#">{{ $post->comments->count() }} Comments</a> <span class="lnr lnr-bubble"></span></p>						
										</div>
									</div>
									<div class="col-lg-9 col-md-9 ">
										<div class="feature-img">
											<img class="img-fluid" src="{{ Storage::url($post->image) }}" alt="">
										</div>
										<a class="posts-title" href="{{ route('article.show',$post->slug) }}"><h3>{{ $post->title }}</h3></a>
										<p class="excert">
											{!! $post->resume !!}
										</p>
										<a href="{{ route('article.show',$post->slug) }}" class="genric-btn primary">Details de l'article</a>
									</div>
									
								</div>
							@endforeach
							<!-- Sera utiliser pour la pagination  -->
								<!-- <nav class="blog-pagination justify-content-center d-flex">
									<ul class="pagination">
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Previous">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-left"></span>
												</span>
											</a>
										</li>
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Next">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-right"></span>
												</span>
											</a>
										</li>
									</ul>
								</nav> -->
							<!-- Fin des chevero pour la pagination -->
						</div>
						<!-- findu col lg-8 -->
						<!-- Le col lg-4 -->
						<div class="col-lg-4 sidebar-widgets">
							@include('user/article/sidebar')
						</div>
						<!-- fin du col-lg-4 -->
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

