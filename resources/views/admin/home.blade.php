@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Tableau de bord
        <small>Appercue des informations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <h3 class="text-center btn btn-warning btn-block text-bold">D'un cout d'oeuil</h3>
      <br>
      <div class="row">
      <a href="{{ route('admin.contact.index') }}">
        <div class="col-lg-3">
          <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nouveaux messages</span>
                <span class="info-box-number">
                  @foreach($contact_all as $contact)
                    @if($contact->status == 0)
                      {{$contact->count()}}
                    @endif
                  @endforeach
                </span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                @foreach($contact_all as $contact)
                    @if($contact->status == 1)
                      {{$contact->count()}} 
                    @endif
                  @endforeach
                  message lue
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
        </a>

       <a href="{{ route('admin.admin.index') }}">
       <div class="col-lg-3">
          <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nombre Administrateurs</span>
                <span class="info-box-number">{{ $admin_all->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
       </a>

        <a href="{{ route('admin.team.index') }}">
        <div class="col-lg-3">
          <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Les Membres</span>
                <span class="info-box-number">{{$team_all->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
        </a>

        <a href="{{ route('admin.info.index') }}">
          <div class="col-lg-3">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="glyphicon glyphicon-flag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Partenaires</span>
                  <span class="info-box-number">{{$partenaire_all->count()}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                  </div>
                  <span class="progress-description">
                        Total non Codifier
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
          </div>
        </a>

      </div>

     
      <h3 class="text-center btn btn-success btn-block text-bold">Information des nouveaux <span class=""><i class="fa fa-graduation-cap"></i></span></h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inscrits</span>
                <span class="info-box-number">{{ $nouveau_total_inscrit->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      50% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Valider</span>
                <span class="info-box-number">{{ $nouveau_total_valider->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-close "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Ommis</span>
                <span class="info-box-number">{{$nouveau_total_ommis->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Codifier</span>
                <span class="info-box-number">{{$nouveau_total_codifier->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      Total non Codifier
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>


      </div>


      <h3 class="text-center btn bg-blue btn-block text-bold">Information des Anciens <span class=""><i class="fa fa-graduation-cap"></i></span></h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inscrits</span>
                <span class="info-box-number">{{ $ancien_total_inscrit->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      50% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Valider</span>
                <span class="info-box-number">{{ $ancien_total_valider->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-close "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Ommis</span>
                <span class="info-box-number">{{$ancien_total_ommis->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Codifier</span>
                <span class="info-box-number">{{$ancien_total_codifier->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      Total non Codifier
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>


      </div>


      <h3 class="text-center btn btn-info btn-block text-bold">Information les recasements des etudiants</h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="info-box" style="background-color: #00c0ef;border-color: #00acd6;">
              <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inscrits</span>
                <span class="info-box-number">{{ $ancien_total_inscrit->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      50% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box "style="background-color: #00c0ef;border-color: #00acd6;">
              <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Valider</span>
                <span class="info-box-number">{{ $ancien_total_valider->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box " style="background-color: #00c0ef;border-color: #00acd6;">
              <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Ommis</span>
                <span class="info-box-number">{{$ancien_total_ommis->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3">
          <div class="info-box " style="background-color: #00c0ef;border-color: #00acd6;">
              <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Codifier</span>
                <span class="info-box-number">{{$ancien_total_codifier->count()}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      Total non Codifier
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection