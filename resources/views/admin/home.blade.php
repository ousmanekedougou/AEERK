@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-uppercase">
        Tableau de bord
        <small>Appérçue des informations</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @if (admin()->is_admin == 1)
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
                          {{$contact_nomLue->count()}}
                    </span>

                    <div class="progress">
                      <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                          {{$contact_lue->count()}} 
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
                    <span class="info-box-text">Autres Options</span>
                    <span class="info-box-number"></span>

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
      @endif
     
      <h3 class="text-center btn btn-success btn-block text-bold">Information des nouveaux <span class=""><i class="fa fa-graduation-cap"></i></span></h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <a href="{{ route('admin.nouveau.index') }}">
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
          </a>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Validés</span>
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
                <span class="info-box-text">Total Rejetés</span>
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
          <a href="{{ route ('admin.codification.show',$immeuble_nouveau->id) }}">
          <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Codifiés</span>
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
          </a>
        </div>


      </div>


      <h3 class="text-center btn bg-blue btn-block text-bold">Information des Anciens <span class=""><i class="fa fa-graduation-cap"></i></span></h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <a href="{{ route('admin.ancien.index') }}">
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
          </a>
        </div>

        <div class="col-lg-3">
          <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Validés</span>
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
              <span class="info-box-text">Total Rejetés</span>
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
              <span class="info-box-text">Total Codifiés</span>
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
        <div class="col-lg-6">
          <div class="info-box" style="background-color: #00c0ef;border-color: #00acd6;">
          <a href="{{ route('admin.recasement.index') }}" style="color:white;">
              <span class="info-box-icon" style="color: white;"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inscrits</span>
                <span class="info-box-number">{{ $inscription_recasement->count() }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      50% Increase in 30 Days
                    </span>
              </div>
               </a>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-6">
            <div class="info-box "style="background-color: #00c0ef;border-color: #00acd6;color:white;">
            
              <span class="info-box-icon" style="color: white;"><i class="fa fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Recasés</span>
                <span class="info-box-number">{{ $recaser->count() }}</span>

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


      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection