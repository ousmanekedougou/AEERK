 @extends('user.layouts.app',['title' => 'Bourse'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
@section('head')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.fa-thumbs-up:hover{
			color:red;
		}
	</style>
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
                        {{$show->titre}}				
                    </h1>	
                    <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('bourse.index') }}">Offre Bourse</a></p>
                </div>	
            </div>
        </div>
    </section>
    <!-- End banner Area -->	

    <!-- Start course-details Area -->
        <section class="course-details-area pt-120">
            <div class="container">
                <div class="row">
                     <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 left-contents">
                        <div class="main-image">
                            <img class="img-fluid" src="{{Storage::url($show->image)}}" alt="">
                        </div>
                        <div class="jq-tab-wrapper" id="horizontalTab">
                            <div class="jq-tab-menu">
                                <div class="jq-tab-title active" data-tab="1">Description</div>
                                <div class="jq-tab-title" data-tab="2">Detail Complet</div>
                                <div class="jq-tab-title" data-tab="3">Pour Postuler</div>
                                {{--
                                <div class="jq-tab-title" data-tab="4">Comments</div>
                                <div class="jq-tab-title" data-tab="5">Reviews</div>
                                --}}
                            </div>
                            <div class="jq-tab-content-wrapper">
                                <div class="jq-tab-content active" data-tab="1">
                                    {{$show->desc}}
                                </div>
                                <div class="jq-tab-content" data-tab="2">
                                    {!!$show->content!!}
                                </div>
                                <div class="jq-tab-content" data-tab="3">
                                   <a href="{{$show->lien}}" target="_blank">Cliquer ici pour postuler</a>
                                </div>
                                {{--
                                <div class="jq-tab-content" data-tab="3">
                                    <ul class="course-list">
                                        <li class="justify-content-between d-flex">
                                            <p>Introduction Lesson</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Basics of HTML</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Getting Know about HTML</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Tags and Attributes</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Basics of CSS</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Getting Familiar with CSS</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Introduction to Bootstrap</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>																		
                                        <li class="justify-content-between d-flex">
                                            <p>Responsive Design</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>
                                        <li class="justify-content-between d-flex">
                                            <p>Canvas in HTML 5</p>
                                            <a class="primary-btn text-uppercase" href="#">View Details</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="jq-tab-content comment-wrap" data-tab="4">
                                    <div class="comments-area">
                                        <h4>05 Comments</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c1.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Emilly Blunt</a></h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                                        <p class="comment">
                                                            Never say goodbye till the end comes!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a> 
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="comment-list left-padding">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c2.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Elsie Cunningham</a></h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                                        <p class="comment">
                                                            Never say goodbye till the end comes!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a> 
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c4.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Maria Luna</a></h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                                        <p class="comment">
                                                            Never say goodbye till the end comes!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a> 
                                                </div>
                                            </div>
                                        </div>                                                    
                                    </div>
                                    <div class="comment-form">
                                        <h4>Leave a Comment</h4>
                                        <form>
                                            <div class="form-group form-inline">
                                                <div class="form-group col-lg-6 col-md-12 name">
                                                <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 email">
                                                <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                                </div>                                        
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                            </div>
                                            <a href="#" class="mt-40 text-uppercase genric-btn primary text-center">Post Comment</a> 
                                        </form>
                                    </div>     						                
                                </div>
                                <div class="jq-tab-content" data-tab="5">	
                                    <div class="review-top row pt-40">
                                        <div class="col-lg-3">
                                            <div class="avg-review">
                                                Average <br>
                                                <span>5.0</span> <br>
                                                (3 Ratings)
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <h4 class="mb-20">Provide Your Rating</h4>
                                            <div class="d-flex flex-row reviews">
                                                <span>Quality</span>
                                                <div class="star">
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span>Outstanding</span>
                                            </div>
                                            <div class="d-flex flex-row reviews">
                                                <span>Puncuality</span>
                                                <div class="star">
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span>Outstanding</span>
                                            </div>
                                            <div class="d-flex flex-row reviews">
                                                <span>Quality</span>
                                                <div class="star">
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star checked"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span>Outstanding</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feedeback">
                                        <h4 class="pb-20">Your Feedback</h4>
                                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                                        <a href="#" class="mt-20 primary-btn text-right text-uppercase">Submit</a>
                                    </div>
                                    <div class="comments-area mb-30">
                                        <div class="comment-list">
                                            <div class="single-comment single-reviews justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c1.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Emilly Blunt</a>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                        </h5>
                                                        <p class="comment">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="comment-list">
                                            <div class="single-comment single-reviews justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c2.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Elsie Cunningham</a>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                        </h5>
                                                        <p class="comment">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="comment-list">
                                            <div class="single-comment single-reviews justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c3.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Maria Luna</a>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                        </h5>
                                                        <p class="comment">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="comment-list">
                                            <div class="single-comment single-reviews justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c4.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">Maria Luna</a>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                        </h5>
                                                        <p class="comment">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  						                                                                      
                                    </div>	                                	
                                </div>
                                --}}                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>	
        </section>
    <!-- End course-details Area -->
			

    <!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Autres offres de bourse de la memme categorie	</h1>
							</div>
						</div>
					</div>	
					<div class="row align-items-center">
						@foreach($bourses as $bourse)
						<div class="col-lg-6 pb-30">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<a href="{{route('bourse.show',$bourse->id)}}"><img class="img-fluid" src="{{Storage::url($bourse->image)}}" alt=""></a>
								</div>
								<div class="detials col-12 col-md-6">
									<p>{{$bourse->created_at->diffForHumans()}}</p>
									<a href="{{route('bourse.show',$bourse->id)}}"><h4>{{ $bourse->titre }}</h4></a>
									<p>
										{{$bourse->desc}}
									</p>
								</div>
							</div>
						</div>
						@endforeach																			
					</div>
				</div>	
			</section>
			<!-- End events-list Area -->
				
 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
  <script src="{{asset('user/build/js/intlTelInput.js')}}"></script>
 @endsection

