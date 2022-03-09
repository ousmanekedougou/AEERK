@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                      <!-- Default box -->
      <div class="box-header">
        <h3 class="box-title btn btn-primary btn-block">Les etudiants qui ont etes recase a {{ $immeuble->name }}</h3>
      </div>
                      <!-- /.col -->
        <div class="">
          <div class="nav-tabs-custom">
       
            <div class="tab-content">
              <div class="active tab-pane" id="">
                <table id="example1" class="table responsive-table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Recaser A</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($recaser as $rec)
                    <tr>
                      <td><img class="img-thumbnail" style="width:45px; height:45px;border-radius:100%;" src="{{ Storage::url($rec->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                      <td>{{ $rec->prenom .' '.$rec->nom }}</td>
                      <td>{{ $rec->email }}</td>
                      <td>{{ $rec->phone }}</td>
                      <td>
                        {{$rec->immeuble->name}} : 
                        
                        {{$rec->chambre->nom }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $recaser->links() }}
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

                  </section>
                  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


@section('footersection')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection