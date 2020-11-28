@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                      <!-- /.col -->
        <div class="">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </thead>
                @foreach($ancien_bac as $ancien)
                  <tbody>
                    <tr>
                      <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                      <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                      <td>{{ $ancien->phone }}</td>
                      <td>
                        @foreach($ancien->chambre->immeubles as $ac_imb)
                        {{$ac_imb->name}} : 
                        @endforeach
                        
                        {{$ancien->chambre->nom }}</td>
                      <td>{{ $ancien->prix }}</td>
                    </tr>
                  </tbody>
                  @endforeach
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </tfoot>
                </table>
                  {{ $ancien_bac->links() }}
                
              </div>
              <!-- /.tab-pane -->

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
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection