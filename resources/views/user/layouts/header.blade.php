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
					<li class="{{ set_active_roote('index') }}"><a href="/"><i class="fa fa-home fa_ajout"></i> Accueil</a></li>
					{{--<li class="{{ set_active_roote('about.index') }}"><a href="{{ route('about.index') }}"><i class="fa fa-eject fa_ajout"></i> A Propos</a></li>--}} 
					{{--<li class="{{ set_active_roote('systeme.index') }}"><a href="{{ route('systeme.index') }}"><i class="fa fa-cog fa_ajout"></i> Comment ça  marche</a></li>--}}
					<li class="menu-has-children"><a href=""><i class="fa fa-flag fa_ajout"></i> Codification</a>
						<ul>
						<li><a href="{{ route('nouveau.index') }}"><i class="fa fa-graduation-cap"></i> Inscription Nouveau</a></li>
						<li><a href="{{ route('ancien.index') }}"><i class="fa fa-graduation-cap"></i> Inscription Ancien</a></li>
						</ul>
					</li>	
					<li class="menu-has-children"><a href=""><i class="fa fa-graduation-cap fa_ajout"></i> Espace Etudiant</a>
						<ul class="">
							<li class="menu-has-children"><a href="{{ route('bourse.index') }}">Offres de Bourses </a></li>						                						                		
							<li class="menu-has-children"><a href="{{ route('emploi.index') }}">Offres d'emplois </a></li>						                						                		
							<li class="menu-has-children"><a href="{{ route('stage.index') }}">Offres de Stages </a></li>						                						                		
							<li class="menu-has-children"><a href="{{ route('formation.index') }}">Offres de Formations </a></li>						                						                		
							<li class="menu-has-children"><a href="{{ route('concour.index') }}">Concours </a></li>				                							                		
						</ul>
					</li>
					<li class="{{ set_active_roote('article.index') }}"><a href="{{ route('article.index') }}"><i class="fa fa-blog fa_ajout"></i>Actualites</a></li>
					<li class="{{ set_active_roote('contact.index') }}"><a href="{{ route('contact.index') }}"><i class="fa fa-address-book fa_ajout"></i> Contact</a></li>
				</ul>
			</nav><!-- #nav-menu-container -->		    		
			</div>
		</div>
	</div>
</header><!-- #header -->
