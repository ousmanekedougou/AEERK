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

  		<!-- start banner Area -->
		  {{--
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
		--}}
	  	<!-- End banner Area -->	
	  

	  		<!-- Start top-category-widget Area -->
				<section class="top-category-widget-area pb-90 " style="padding-top: 160px;">
					<div class="container">
						<div class="row">		
							<div class="col-lg-4">
								<div class="single-cat-widget">
									<div class="content relative">
										<div class="overlay overlay-bg"></div>
										<a href="#" target="_blank">
										<div class="thumb">
											<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/economie.jpeg')}}" style="width: 360px;height:220px;" alt="">
										</div>
										<div class="content-details">
											<h4 class="content-title mx-auto text-uppercase">Economie</h4>
											<span></span>								        
											<p>Le Sénégal est l'une des économies les plus performantes d'Afrique subsaharienne. Depuis plusieurs années maintenant, l'économie enregistre une croissance </p>
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
											<img class="content-image img-fluid d-block mx-auto" src="{{asset('user/img/blog/politique.jpg')}}" style="width: 360px;height:220px;" alt="">
										</div>
										<div class="content-details">
											<h4 class="content-title mx-auto text-uppercase">Politique</h4>
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
											<h4 class="content-title mx-auto text-uppercase">Education</h4>
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
			
			<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row">
						<!-- debut du col-lg-8 -->
						<div class="col-lg-8 posts-list">
							@foreach($posts as $post)
								<div class="single-post row">
									<div class="col-lg-3  col-md-3 meta-details">
										<ul class="tags">
											@foreach($post->tags as $post_tag)
											<li><a href="#">{{ $post_tag->name }},</a></li>
											@endforeach
										</ul>
										<div class="user-details row">
											<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $post->created_at->toFormattedDateString() }}</a> <span class="lnr lnr-calendar-full"></span></p>
											<p class="view col-lg-12 col-md-12 col-6"><a href="#">{{ $post->view }} Vue</a> <span class="lnr lnr-eye"></span></p>
											<p class="comments col-lg-12 col-md-12 col-6"><a href="#">{{ $post->comments->count() }} Comments</a> <span class="lnr lnr-bubble"></span></p>						
											<p class="user-name col-lg-12 col-md-12 col-6">
												<a href="#">0 <span class="fa fa-thumbs-down"></span></a>
												<a href="#">0 <span class="fa fa-thumbs-up"></span></a>
											</p>
											{{--
											<p class="comments col-lg-12 col-md-12 col-6">
												<button class="btn btn-primary btn-xs button share_facebook" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-facebook-square"></i></button>
												<button class="btn btn-primary btn-xs button share_twitter" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-twitter"></i></button>
												<button class="btn btn-primary btn-xs button share_youtube" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-youtube"></i></button>
												<button class="btn btn-primary btn-xs button share_whatsapp" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-whatsapp"></i></button>
												<button class="btn btn-primary btn-xs button share_gplus" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-google-plus"></i></button>
												<button class="btn btn-primary btn-xs button share_linkedin" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-linkedin"></i></button>
											</p>
											--}}
										</div>
									</div>
									<div class="col-lg-9 col-md-9 ">
										<div class="feature-img">
											<img class="img-fluid" src="{{ Storage::url($post->image) }}" alt="" style="width: 555px;height:auto;" >
										</div>
										<a class="posts-title" href="#" onclick="document.getElementById('update-form-{{$post->id}}').submit();"><h3>{{ $post->title }}</h3></a>
										<p class="excert">
											{!! $post->resume !!}
										</p>
										<div class="row">
 											<div class="col-sm-3">
												<form id="update-form-{{$post->id}}" method="post" action="{{ route('article.update',$post->id) }}" style="display:none">
													{{csrf_field()}}
													{{method_field('PUT')}}
												</form>  
												<a onclick="document.getElementById('update-form-{{$post->id}}').submit();"> <span class="genric-btn primary">Details</span> </a>
											 </div>
 											<div class="col-sm-9 text-right"> 
												<button class=" genric-btn primary share_facebook" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-facebook-square"></i></button>
												<button class=" genric-btn primary share_twitter" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-twitter"></i></button>
												<button class=" genric-btn primary share_gplus" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-google-plus"></i></button>
												<button class=" genric-btn primary share_linkedin" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-linkedin"></i></button>
											</div>
										</div>
										
									</div>
									
								</div>
							@endforeach													
		                    <nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <!-- <span class="lnr lnr-chevron-left"></span> -->
		                                    </span>
		                                </a>
		                            </li>
		                          {{ $posts->links() }}
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <!-- <span class="lnr lnr-chevron-right"></span> -->
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav>
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

