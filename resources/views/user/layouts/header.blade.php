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
                      <li><a href="">Gallery</a></li>
                      <li class="menu-has-children text-white"><a href="#">Inscription</a>
			            <ul style="z-index:2;border-radius:5px;">
			              <li><a href="{{ route('nouveau.index') }}"> <i class="fa fa-chevron-right"></i> Nouveau</a></li>
			              <li><a href="{{ route('ancien.index') }}"> <i class="fa fa-chevron-right"></i> Anciens</a></li>
			              <li><a href="{{ route('recasement.index') }}"> <i class="fa fa-chevron-right"></i> Recasement</a></li>
			            </ul>
					  </li>	
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