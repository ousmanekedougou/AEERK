 @extends('user.layouts.app',['title' => 'detail'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Clean Blog')
@section('sub-heding','Bootstrap Template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
	header{
		background-color: #000;
	}
  </style>
@endsection
 @section('main-content')

  	<!-- start banner Area -->
	<!-- <section class="banner-area relative about-banner" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						{{ $slugs->title }}
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('article.index') }}"> Artcle</a></p>
				</div>	
			</div>
		</div>
	</section> -->
	  <!-- End banner Area -->	
	  
		<!-- Start post-content Area -->
		<section class="post-content-area single-post-area" style="margin-top: 60px;">
				<div class="container">
		<a class="genric-btn primary btn-xs mb-2" href="{{ route('article.index') }}"> <i class="fa fa-arrow-left"></i> Actualite</a>
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="{{ Storage::url($slugs->image) }}" alt="">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
								<ul class="tags">
										@foreach($slugs->tags as $post_tag)
										<li><a href="#">{{ $post_tag->name }},</a></li>
										@endforeach
										
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $slugs->created_at->toFormattedDateString() }}</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">{{ $slugs->view }} Vue</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">{{ $slugs->comments->count() }} Comments</a> <span class="lnr lnr-bubble"></span></p>
										<ul class="social-links col-lg-12 col-md-12 col-6">
											<li><a href="#"><i class="lnr lnr-facebook"></i></a></li>
											<li><a href="#"><i class="lnr lnr-twitter"></i></a></li>
											<li><a href="#"><i class="lnr lnr-github"></i></a></li>
											<li><a href="#"><i class="lnr lnr-behance"></i></a></li>
										</ul>																				
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20">{{ $slugs->title }}</h3>
									<p class="excert">
										{!! $slugs->body !!}
									</p>
									<div class="row">
										<div class="col-sm-12 text-center"> 
											<button class=" genric-btn primary button share_facebook" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-facebook-square"></i></button>
											<button class=" genric-btn primary button share_twitter" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-twitter"></i></button>
											<button class=" genric-btn primary button share_gplus" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-google-plus"></i></button>
											<button class=" genric-btn primary button share_linkedin" data-url="https://www.youtube.com/watch?v=EUrmQkd8RsM"><i class="fa fa-linkedin"></i></button>
										</div>
									</div>
								</div>
							</div>
							
							<div class="comments-area">
								<h4>{{ $slugs->comments->count() }} Commentaires</h4>
								@foreach($slugs->comments as $post_com)
								<div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{ $post_com->name }}</a></h5>
                                                <p class="date">{{ $post_com->created_at->toFormattedDateString() }} </p>
                                                <p class="comment">
                                                    {!! $post_com->comment !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                               <a href="" class="btn-reply text-uppercase">reply</a> 
                                        </div>
                                    </div>
                                </div>	
								@endforeach
							</div>
							<div class="comment-form">
								<h4>Votre Commentaire</h4>
								<form action="{{ route('comment.store') }}" method="Post">
									@csrf
									<input type="hidden" name="post_id" value="{{ $slugs->id }}">
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Prenom & Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required="">
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong class="message_error">{{ $message }}</strong>
											</span>
										@enderror  
									</div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email"  id="email" placeholder="Adresse E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong class="message_error">{{ $message }}</strong>
											</span>
										@enderror  
									</div>										
									</div>
									<!-- <div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
									</div> -->
									<div class="form-group">
										<textarea value="{{ old('comment') }}" class="form-control @error('comment') is-invalid @enderror mb-10" name="comment" rows="5" name="message" placeholder="Commentaire" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										@error('comment')
											<span class="invalid-feedback" role="alert">
												<strong class="message_error">{{ $message }}</strong>
											</span>
										@enderror 
									</div>
									<button type="submit" class="primary-btn text-uppercase">Envoyer</button>	
								</form>
							</div>
						</div>
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

