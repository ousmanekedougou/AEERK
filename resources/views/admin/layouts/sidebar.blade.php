  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url(Auth::user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ousmane Diallo</p>
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
        <li class="header">PARAMETRES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Paramettres</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route ('admin.info.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Infos_part_reseau</span></a></li>
        <li><a href="{{ route ('admin.gallery.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Galleries_slider</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Admins</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route ('admin.personnel.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Personnele</span></a></li>
            <li><a href="{{ route ('admin.admin.index') }}"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li class=""><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li class=""><a href="{{route('admin.permission.index')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.post.index') }}"><i class="fa fa-circle-o"></i>post</a></li>
            <li><a href="{{ route ('admin.category.index') }}"><i class="fa fa-circle-o"></i>Categorie</a></li>
            <li><a href="{{ route ('admin.tag.index') }}"><i class="fa fa-circle-o"></i>tags</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Informations Utile</span>
            <span class="pull-right-container">
            <span class="label label-danger pull-right">6</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.activite.index') }}"><i class="fa fa-circle-o"></i> Activites</a></li>
            <li><a href="{{ route ('admin.service.index') }}"><i class="fa fa-circle-o"></i> Services</a></li>
            <li><a href="{{ route ('admin.realisation.index') }}"><i class="fa fa-circle-o"></i> Realisations</a></li>
            <li><a href="{{ route ('admin.historique.index') }}"><i class="fa fa-circle-o"></i> Historique</a></li>
            <li><a href="{{ route ('admin.document.index') }}"><i class="fa fa-circle-o"></i> Documents</a></li>
            <li><a href="{{ route ('admin.contact.index') }}"><i class="fa fa-circle-o"></i> Contacts</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Codifications</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.nouveau.index') }}"><i class="fa fa-circle-o"></i> Nouveaux</a></li>
            <li><a href="{{ route ('admin.ancien.index') }}"><i class="fa fa-circle-o"></i> Anciens</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Recasements</span>
            <span class="pull-right-container">
            <span class="label label-warning pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.recasement.index') }}"><i class="fa fa-circle-o"></i> Nouveaux</a></li>
            <li><a href="{{ route ('admin.recasement.create') }}"><i class="fa fa-circle-o"></i> Anciens</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Etudes</span>
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>