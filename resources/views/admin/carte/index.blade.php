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
    </section>

    <!-- Main content -->
    <section class="content">
      <h3 class="text-center btn btn-info btn-block text-bold">Information les recasements des etudiants</h3>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <div class="info-box" style="background-color: #00c0ef;border-color: #00acd6;">
              <a href="{{ route ('admin.recto') }}"><span class="info-box-icon" style="color: white;"><i class="fa fa-print"></i></span></a>

              <div class="info-box-content">
                <span class="info-box-text">Total Inscrits</span>
                <span class="info-box-number">dfdf</span>

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

        <div class="col-lg-6">
          <div class="info-box "style="background-color: #00c0ef;border-color: #00acd6;">
              <span class="info-box-icon" style="color: white;"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Recaser</span>
                <span class="info-box-number">ffs</span>

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