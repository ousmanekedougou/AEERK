
	<!-- Start cta-two Area -->
	<!-- <section class="cta-two-area">
		<div class="slider_container">
				<h1 class="slider_h1">Nos Partenaires</h1>
				<div class="logo-slider">
					<div class="item"><a href=""><img src="{{ asset('user/img/part/1.png') }}" alt=""></a></div>
					<div class="item"><a href=""><img src="{{ asset('user/img/part/2.png') }}" alt=""></a></div>
					<div class="item"><a href=""><img src="{{ asset('user/img/part/3.png') }}" alt=""></a></div>
					<div class="item"><a href=""><img src="{{ asset('user/img/part/5.png') }}" alt=""></a></div>
					<div class="item"><a href=""><img src="{{ asset('user/img/part/6.png') }}" alt=""></a></div>
					<div class="item"><a href=""><img src="{{ asset('user/img/part/7.png') }}" alt=""></a></div>
				</div>
		</div>	
	</section> -->
			<!-- End cta-two Area -->
@include('flashy::message')
	
<!-- start footer Area -->		
        <footer class="footer-area ">
				<div class="container">
					<!-- <div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Top Products</h4>
								<ul>
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Quick links</h4>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Features</h4>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Resources</h4>
								<ul>
									<li><a href="#">Guides</a></li>
									<li><a href="#">Research</a></li>
									<li><a href="#">Experts</a></li>
									<li><a href="#">Agencies</a></li>
								</ul>								
							</div>
						</div>																		
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Newsletter</h4>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info"></div>  
									  </div>
									</form> 
								</div>
							</div>
						</div>											
					</div> -->
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12 text-center">
							Copyright &copy; 2020-{{ Carbon\carbon::now()->year }} | Plateforme de codification de <span class="text-primary"> L'AEERK</span> <a style="opacity: 0;" href="{{ route('admin.admin.login') }}" target="_blank">L'AEERK</a>
						</p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
						</div>
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->	

			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
			<script>
			$('.logo-slider').slick({
				slidesToShow: 5,
				slidesToScroll:1,
				dots:true,
				arrows:true,
				autoplay:true,
				autoplaySpeed:3000,
				infinite:true,
			});
			</script>


			<script src="{{asset('user/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  			<script src="{{asset('user/js/pooper.js')}}"></script>			
			<script src="{{asset('user/js/vendor/bootstrap.min.js')}}"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('user/js/easing.min.js')}}"></script>			
			<script src="{{asset('user/js/hoverIntent.js')}}"></script>
			<script src="{{asset('user/js/superfish.min.js')}}"></script>	
			<script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>	
    		<script src="{{asset('user/js/jquery.tabs.min.js')}}"></script>						
			<script src="{{asset('user/js/jquery.nice-select.min.js')}}"></script>	
			<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>									
			<script src="{{asset('user/js/mail-script.js')}}"></script>	
			<script src="{{asset('user/js/main.js')}}"></script>
			<script src="{{asset('user/js/dropzone/dropzone.js')}}"></script>
			<script src="{{asset('user/js/social.js')}}"></script>

			@if(Session::has('flashy_notification.message'))
				<script id="flashy-template" type="text/template">
					<div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
						<i class="material-icons">speaker_notes</i>
						<a href="#" class="flashy__body" target="_blank"></a>
					</div>
				</script>

				<script>
					flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
				</script>
			@endif

			

			@section('footersection')
			
			@show