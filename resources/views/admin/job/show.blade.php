@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <section class="content">
   <!-- Debut de la div -->
   <div class="box-body">
          <div class="">
              <h3 class="text-center btn btn-primary btn-block text-bold">Toutes specialite pour le domaine {{$domaine->name}}</h3>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>Nom des specialite</th>
                  <th>Demande emplois</th>
                  <th>Demande de stages</th>
                </tr>
                </thead>
                  <tbody>
                    @foreach($specialites as $speciality)
                      <tr>
                        <td>{{ $speciality->name }}</td>
                        <td><a href="{{ route('admin.emplois.emploi',$speciality->id) }}" class="mr-5 btn btn-xs btn-primary">Voire les postulants <i class="fa fa-eye"></i></a></td>
                        <td><a href="{{ route('admin.emplois.stage',$speciality->id) }}" class="mr-5 btn btn-xs btn-success"> Voire les postulants <i class="fa fa-eye"></i></a></td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              {{$specialites->links()}}
            </div>
            <!-- fin de la table -->
            <!-- /.box-body -->
          </div>
        </div>
        <!-- Fin de la div  -->



    </section>
    <!-- /.content -->
  </div>
  <!-- Fin de la div -->
  <!-- /.content-wrapper -->






@endsection


@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection

