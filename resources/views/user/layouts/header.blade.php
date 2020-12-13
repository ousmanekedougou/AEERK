<header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a href=""><span class="lnr lnr-phone-handset"></span> <span class="text">{{ all_info()->phone  ?? '+953 012 3654 896' }}</span></a>
			  				<a href=""><span class="lnr lnr-envelope"></span> <span class="text">{{ all_info()->email ?? 'support@colorlib.com'}}</span></a>			
			  				<a href=""><span class="lnr lnr-location"></span> <span class="text">{{ all_info()->adresse ?? 'support@colorlib.com'}}</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		   <div class="section-menu">
		   <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="/"><img src="{{asset('user/img/accueil.png')}}" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="/">Home</a></li>
			          <li><a href="{{ route('about.index') }}">A Propos</a></li>
			          <!-- <li><a href="courses.html"></a></li>
			          <li><a href="events.html"></a></li> -->
					  <!-- gestion de l'inscription -->
                      <li><a href="">Gallery</a></li>
						@if(all_option()->register == 1)
							<li class="menu-has-children text-white"><a href="#">Inscription</a>
							@if(all_option()->register == 1 && all_option()->register_nouveau == 1 && all_option()->register_ancien == 1)
								<ul style="z-index:2;border-radius:5px;">
								@elseif(all_option()->register == 1 && all_option()->register_recasement == 1)
								<ul style="z-index:2;border-radius:5px;">
								@else
								<ul style="opacity:0;">
								@endif
								@if(all_option()->register == 1 && all_option()->register_nouveau == 1 && all_option()->register_ancien == 1)
								<li><a href="{{ route('nouveau.index') }}"> <i class="fa fa-chevron-right"></i> Vous etes Nouveau</a></li>
								<li><a href="{{ route('ancien.index') }}"> <i class="fa fa-chevron-right"></i> Vous etes  Anciens</a></li>
								@elseif(all_option()->register == 1 && all_option()->register_recasement == 1)
								<li><a href="{{ route('recasement.index') }}"> <i class="fa fa-chevron-right"></i>Inscription Recasement</a></li>
								@endif
								</ul>
							</li>	
						@endif
						<!-- Fin de la gestion de l'inscription -->
			
						<!-- Gestion de la codification  -->
						@if(all_option()->codification == 1)
						<li class="menu-has-children text-white"><a href="#">Codifications</a>
							@if(all_option()->codification == 1 && all_option()->codification_nouveau == 1 && all_option()->codification_ancien == 1)
								<ul style="z-index:2;border-radius:5px;">
							@elseif(all_option()->codification == 1 && all_option()->recasement == 1)
								<ul style="z-index:2;border-radius:5px;">
							@else
								<ul style="opacity:0;">
							@endif
							@if(all_option()->codification == 1 && all_option()->codification_nouveau == 1 && all_option()->codification_ancien == 1)
								<li><a href="{{ route('nouveau.index') }}"> <i class="fa fa-chevron-right"></i> Vous etes Nouveau</a></li>
								<li><a href="{{ route('ancien.index') }}"> <i class="fa fa-chevron-right"></i> Vous etes  Anciens</a></li>
							@elseif(all_option()->codification == 1 && all_option()->recasement == 1)
								<li><a href="{{ route('recasement.index') }}"> <i class="fa fa-chevron-right"></i> Recasement</a></li>
							@endif
								</ul>
						</li>	
						@endif
						<!-- Fin de la gestion de la codification -->
					  <li><a href="{{ route('article.index') }}">Articles</a></li> 
			          <!-- <li class="menu-has-children"><a href="">Articles</a>
			            <ul>
			              <li><a href="">Article Video</a></li>
			              <li><a href="">Article Image</a></li>
			            </ul>
			          </li>	 -->
			          <li class="menu-has-children"><a href="">Pages</a>
			            <ul>
		              		<li><a href=""> <i class="fa fa-chevron-right"></i> Documentation</a></li>		
		              		<li><a href=""> <i class="fa fa-chevron-right"></i> Activite</a></li>		
			                <li><a href=""> <i class="fa fa-chevron-right"></i> Services</a></li>
			                <li><a href=""> <i class="fa fa-chevron-right"></i> Realisations</a></li>
			                <li><a href=""> <i class="fa fa-chevron-right"></i> Historique</a></li>
					          <!-- <li class="menu-has-children"><za href="">Level 2 </a>
					            <ul>
					              <li><a href="#">Item One</a></li>
					              <li><a href="#">Item Two</a></li>
					            </ul>
					          </li>					                		 -->
			            </ul>
					  </li>		
					  <li class="menu-has-children"><a href="">Orientation</a>
			            <ul>
					          <li class="menu-has-children"><a href="">UCAD </a>
					            <ul>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item One</a></li>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item Two</a></li>
					            </ul>
							  </li>	
							  <li class="menu-has-children"><a href="">UGB </a>
					            <ul>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item One</a></li>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item Two</a></li>
					            </ul>
					          </li>
							  <li class="menu-has-children"><a href="">UNIVERSITE DE BAMBEY </a>
					            <ul>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item One</a></li>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item Two</a></li>
					            </ul>
					          </li>	
							  <li class="menu-has-children"><a href="">UNIVERSITE DE ZIGUINCHORE </a>
					            <ul>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item One</a></li>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item Two</a></li>
					            </ul>
					          </li>					                						                		
							  <li class="menu-has-children"><a href="">PRIVEE </a>
					            <ul>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item One</a></li>
					              <li><a href="#"> <i class="fa fa-chevron-right"></i> Item Two</a></li>
					            </ul>
					          </li>					                							                		
			            </ul>
			          </li>				          					          		          
			          <li><a href="{{ route('contact.index') }}">Contact</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		   </div>
		  </header><!-- #header -->
