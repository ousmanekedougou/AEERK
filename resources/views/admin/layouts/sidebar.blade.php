  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            @if(Auth::guard('admin')->user()->image != null)
              <img src="{{ Storage::url(Auth::guard('admin')->user()->image)}}" class="img-circle" alt="User Image">
            @else
              <img src="{{ asset('admin/dist/img/profil.gif')}}" class="user-image" alt="User Image">
            @endif
          
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      {{--
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      --}}
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">PARAMETRES</li> -->
        @if (admin()->is_admin == 1 || admin()->is_admin == 5)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Administration</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.info.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Paramettre</span></a></li>
            <li><a href="{{ route ('admin.team.index') }}"><i class="fa fa-circle-o"></i> <span>Personnelle</span></a></li>
            <li><a href="{{ route ('admin.admin.index') }}"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li class=""><a href="{{route('admin.temoignage.index')}}"><i class="fa fa-circle-o"></i> Temoignage</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Mailbox</span>
            <span class="pull-right-container">
            <span class="label label-success pull-right">6</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.contact.index') }}"><i class="fa fa-circle-o"></i> Contacts</a></li>
            <li><a href="{{ route('admin.contact.create') }}"><i class="fa fa-circle-o"></i> Composer</a></li>
          </ul>
        </li>
        @endif

        {{--
        @if (admin()->is_admin == 4 || admin()->is_admin == 1 || admin()->is_admin == 5)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-rss"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.post.index') }}"><i class="fa fa-circle-o"></i>Artcles</a></li>
            <li><a href="{{ route ('admin.category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
            <li><a href="{{ route ('admin.tag.index') }}"><i class="fa fa-circle-o"></i>Etiquettes</a></li>
          </ul>
        </li>
        @endif
        --}}

        @if (admin()->is_admin == 2 || admin()->is_admin == 1 || admin()->is_admin == 5)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Inscription Codification</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.nouveau.index') }}"><i class="fa fa-circle-o"></i> Nouveaux</a></li>
            <li><a href="{{ route ('admin.ancien.index') }}"><i class="fa fa-circle-o"></i> Anciens </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Etudiant Codifier</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach( all_immeuble() as $immeuble )
              <li><a href="{{ route ('admin.codification.show',$immeuble->id) }}"><i class="fa fa-building"></i> {{$immeuble->name}} </a></li>
            @endforeach
          </ul>
        </li>

        {{--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Carte Membres</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.carte.recto') }}"><i class="fa fa-id-card"></i> Carte Récto </a></li> 
            <li><a href="{{ route ('admin.carte.verso') }}"><i class="fa fa-id-card"></i> Cartes Vérso </a></li> 
          </ul>
        </li>
        --}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Recasement</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.recasement.index') }}"><i class="fa fa-circle-o"></i> Etudiant Incrits</a></li>
            @foreach( all_immeuble() as $immeuble )
              <li><a href="{{ route ('admin.recasement.edit',$immeuble->id) }}"><i class="fa fa-circle-o"></i>Recaser {{$immeuble->name}} </a></li>
            @endforeach
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Poste & Habitat</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.comission.index') }}"><i class="fa fa-circle-o"></i> Commissions</a></li>
            <li><a href="{{ route ('admin.localite.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Localite</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Logements</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.logement.index') }}"><i class=" fa fa-building text-primary"></i> <span>Les immeubles</span></a></li>
            @foreach( all_immeuble() as $immeuble )
              <li><a href="{{ route ('admin.chambre.show',$immeuble->id) }}"><i class="fa fa-circle-o"></i>Chambres {{$immeuble->name}} </a></li>
            @endforeach
          </ul>
        </li>
        @endif

        @if (admin()->is_admin == 3 || admin()->is_admin == 1 || admin()->is_admin == 5)
        {{--
          <li class="treeview">
            <a href="#">
              <i class="fa fa-building"></i> <span>Education</span>
              <span class="pull-right-container">
              <span class="label label-warning pull-right">4</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route ('admin.emploi.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Empois</span></a></li>
              <li><a href="{{ route ('admin.formation.index') }}"><i class="fa fa-circle-o"></i>Formation</a></li>
              <li><a href="{{ route('admin.bourse.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Bourses D'etude</span></a></li>
              <li><a href="{{ route('admin.concour.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Concours</span></a></li>
              <li><a href="{{ route('admin.stage.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Stage</span></a></li>
              <li><a href="{{ route('admin.realisation.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Recrutement</span></a></li>
            </ul>
          </li>
        --}}
          <li class="treeview">
            <a href="#">
              <i class="fa fa-building"></i> <span>Bibliothèque</span>
              <span class="pull-right-container">
              <span class="label label-warning pull-right">4</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o text-primary"></i> <span>Bibliothèque</span></a></li>
              <li><a href="{{ route('admin.filliere.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Fillieres</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-building"></i> <span>Fillieres</span>
              <span class="pull-right-container">
              <span class="label label-warning pull-right">4</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.filliere.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Université Publiques</span></a></li>
              <li><a href="{{ route('admin.filliere.create') }}"><i class="fa fa-circle-o text-primary"></i> <span>Université Privés</span></a></li>
            </ul>
          </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

