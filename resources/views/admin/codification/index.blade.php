@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

  @section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">

          <div class="nav-tabs-custom">
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
                  <tbody>
                  @foreach($nouveau_bac as $nouveau)
                    <tr>
                      <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                      <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                      <td>{{ $nouveau->phone }}</td>
                      <td>
                        @foreach($nouveau->chambre->immeubles as $ac_imb)
                        {{$ac_imb->name}} : 
                        @endforeach
                        {{$nouveau->chambre->nom }}</td>
                      <td>{{ $nouveau->prix }}</td>
                    </tr>
                  @endforeach
                  </tbody>
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
               {{-- <span class="pull-rigth"> {{ $nouveau_bac->links() }}</span> --}}
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

@endsection