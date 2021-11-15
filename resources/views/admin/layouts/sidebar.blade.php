  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url(Auth::guard('admin')->user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">PARAMETRES</li> -->
        @if (Auth::guard('admin')->user()->can('admins.index'))
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
            <li><a href="{{ route ('admin.gallery.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Slider</span></a></li>
            <li><a href="{{ route ('admin.team.index') }}"><i class="fa fa-circle-o"></i> <span>Personnelle</span></a></li>
            <li><a href="{{ route ('admin.admin.index') }}"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li class=""><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li class=""><a href="{{route('admin.permission.index')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
            <li class=""><a href="{{route('admin.temoignage.index')}}"><i class="fa fa-circle-o"></i> Temoignage</a></li>
          </ul>
        </li>
        @endif

        @if (Auth::guard('admin')->user()->can('posts.viewAny'))
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
        
        @if (Auth::guard('admin')->user()->can('admins.index'))
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

        @if (Auth::guard('admin')->user()->can('codifier.index'))
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
            <!-- <li><a href="{{ route ('admin.codification.index') }}"><i class="fa fa-circle-o"></i>Nouveaux</a></li>
            <li><a href="{{ route ('admin.codification.create') }}"><i class="fa fa-circle-o"></i> Anciens </a></li> -->
            @foreach( all_immeuble() as $immeuble )
              <li><a href="{{ route ('admin.codification.show',$immeuble->id) }}"><i class="fa fa-circle-o"></i> {{$immeuble->name}} </a></li>
            @endforeach
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Recasement</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.recasement.index') }}"><i class="fa fa-circle-o"></i> Etudiant Incrits</a></li>
            <li><a href="{{ route ('admin.recasement.create') }}"><i class="fa fa-circle-o"></i> Etudiant Recaser</a></li>
          </ul>
        </li>

        @endif

        @if (Auth::guard('admin')->user()->can('logement.index'))
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
            <li><a href="{{ route ('admin.logement.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Logements</span></a></li>
          </ul>
        </li>
        @endif


        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Education</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.education.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Education</span></a></li>
            <li><a href="{{ route ('admin.systeme.index') }}"><i class="fa fa-circle-o"></i> Syeteme Educatif</a></li>
            <li><a href=""><i class="fa fa-circle-o text-primary"></i> <span>Bourses D'etude</span></a></li>
            <li><a href=""><i class="fa fa-circle-o text-primary"></i> <span>Emploi & Stage</span></a></li>
            <li><a href="{{ route('admin.realisation.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Recrutement</span></a></li>
          </ul>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

