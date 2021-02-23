<header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a href=""><span class="lnr lnr-phone-handset"></span> <span class="text">{{ all_info()->phone  ?? '+221 78 287 59 71' }}</span></a>
			  				<a href=""><span class="lnr lnr-envelope"></span> <span class="text">{{ all_info()->email ?? 'ousmanelaravel@gmail.com'}}</span></a>			
			  				<a href=""><span class="lnr lnr-location"></span> <span class="text">{{ all_info()->adresse ?? 'Medina-(Dakar),30x32'}}</span></a>			
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
			          <li class="{{ set_active_roote('index') }}"><a href="/"><i class="fa fa-home fa_ajout"></i> Home</a></li>
			          {{-- <li class="{{ set_active_roote('about.index') }}"><a href="{{ route('about.index') }}"><i class="fa fa-eject fa_ajout"></i> A Propos</a></li> --}}
			          <li class="{{ set_active_roote('systeme.index') }}"><a href="{{ route('systeme.index') }}"><i class="fa fa-eject fa_ajout"></i> Systeme Educatif</a></li>
			          <li class="{{ set_active_roote('education.index') }}"><a href="{{ route('education.index') }}"><i class="fa fa-eject fa_ajout"></i> Examen & Concours</a></li>
				
					<li class=""><a href=""><i class="fa fa-hiking fa_ajout"></i>Activites</a></li> 
					  <li class="{{ set_active_roote('article.index') }}"><a href="{{ route('article.index') }}"><i class="fa fa-blog fa_ajout"></i>Actualites</a></li> 
						@if(all_option()->register == 1)
							<li class="menu-has-children text-white"><a href=""><i class="fa fa-user-plus fa_ajout"></i> Inscription</a>
							@if(all_option()->register == 1 && all_option()->register_nouveau == 1 && all_option()->register_ancien == 1)
								<ul style="z-index:2;border-radius:5px;">
								@elseif(all_option()->register == 1 && all_option()->register_recasement == 1)
								<ul style="z-index:2;border-radius:5px;">
								@else
								<ul style="opacity:0;">
								@endif
								@if(all_option()->register == 1 && all_option()->register_nouveau == 1 && all_option()->register_ancien == 1)
								<li><a href="{{ route('nouveau.index') }}"> <i class="fa fa-chevron-right"></i> Nouveau Etudiants</a></li>
								<li><a href="{{ route('ancien.index') }}"> <i class="fa fa-chevron-right"></i> Ancien Etudiants</a></li>
								@elseif(all_option()->register == 1 && all_option()->register_recasement == 1)
								<li><a href="{{ route('recasement.index') }}"><i class="fa fa-chevron-right"></i>Inscription Recasement</a></li>
								@endif
								</ul>
							</li>	
						@endif
						<!-- Fin de la gestion de l'inscription -->
			
						<!-- Gestion de la codification  -->
						@if(all_option()->codification == 1)
						<li class="menu-has-children text-white"><a href=""><i class="fa fa-user-plus fa_ajout"></i> Codifications</a>
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

			          <!-- <li class="menu-has-children"><a href="">Articles</a>
			            <ul>
			              <li><a href="">Article Video</a></li>
			              <li><a href="">Article Image</a></li>
			            </ul>
			          </li>	 -->
			       
					  {{-- <li class="menu-has-children"><a href=""><i class="fa fa-graduation-cap fa_ajout"></i> Orientation</a>
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
			          </li>				          					          		           --}}
			          <li class="{{ set_active_roote('contact.index') }}"><a href="{{ route('contact.index') }}"><i class="fa fa-address-book fa_ajout"></i> Contact</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		   </div>
		  </header><!-- #header -->
