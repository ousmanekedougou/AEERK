                            <div class="widget-wrap">
								{{--
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
									<img src="img/blog/user-info.png" alt="">
									<a href="#"><h4>Charlie Barber</h4></a>
									<p>
										Senior blog writer
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
										Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.
									</p>
								</div>
								--}}
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Articles Pupulaires</h4>
									<div class="popular-post-list">
										@if(all_article_populaire()->count() > 0)
											@foreach(all_article_populaire() as $article_pop)
												<div class="single-post-list d-flex flex-row align-items-center">
													<div class="thumb">
														<img class="img-fluid" src="{{ Storage::url($article_pop->image) }}" alt="" style="width:100px;height:60px;" >
													</div>
													<div class="details">
														<a href="#" onclick="document.getElementById('update-form-{{$article_pop->id}}').submit();"><h6>{{$article_pop->title}}</h6></a>
														<p>{{$article_pop->created_at->toFormattedDateString()}}</p>
													</div>
													<form id="update-form-{{$article_pop->id}}" method="post" action="{{ route('article.update',$article_pop->id) }}" style="display:none">
														{{csrf_field()}}
														{{method_field('PUT')}}
													</form> 
												</div>
											@endforeach
										@else
											<p>Pas d'articles disponible pour cette categorie</p>
										@endif													
									</div>
								</div>
								{{--
								<div class="single-sidebar-widget ads-widget">
									<a href="#"><img class="img-fluid" src="{{asset('user/img/blog/ads-banner.jpg')}}" alt=""></a>
								</div>
								--}}
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Toutes Les Catgories </h4>
									<ul class="cat-list">
										@foreach(all_category() as $category)
											<li>
												<a href="{{ route('article.category',$category->id) }}" class="d-flex justify-content-between">
													<p>{{$category->name}}</p>
													<p>{{ $category->posts->count() }}</p>
												</a>
											</li>
										@endforeach
									</ul>
								</div>	
								<div class="single-sidebar-widget newsletter-widget">
									<h4 class="newsletter-title">Newsletter</h4>
									<p>
										Recevez une notification de toutes nos mise ajour.Et soyez informer en reel de nos activites
									</p>
									<div class="form-group d-flex flex-row">
									   	<div class="col-autos">
									      <div class="input-group">
											<form id="add-form-news-1" method="post" action="{{ route('article.store') }}">
												@csrf
									        	<input type="email" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre email'" >
											</form>
										  </div>
									    </div>
									    <a href="" onclick="document.getElementById('add-form-news-1').submit();" class="bbtns">S'inscrire</a>
									</div>	
									<p class="text-bottom">
										Vous pouvez vous désabonner à tout moment
									</p>								
								</div>
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Les Etiquettes</h4>
									<ul>
										@foreach(all_tag() as $tag)
										<li><a href="{{ route('article.etiquette',$tag->id) }}">{{ $tag->name }}</a></li>
										@endforeach
								
									</ul>
								</div>								
							</div>