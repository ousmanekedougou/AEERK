@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

  @section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">
        <h4 class="btn btn-primary mb-5">{{$immeubles->name}} :
          @if($immeubles->status == 2)
            pour les anciens
          @else 
            pour les nouveaux
          @endif
        </h4>
        @if($immeubles->status == 1)
            @can('codifier.create', Auth::guard('admin')->user())
              <div class="text-right">
                    <form id="migration_nouveau" method="get" action="{{ route('admin.migret_nouveau') }}" style="display:none">
                      
                    </form>
                    <a class="btn btn-primary" onclick="
                      if(confirm('Etes vous sure de vouloire migret tous les etudiants ?')){

                      event.preventDefault();document.getElementById('migration_nouveau').submit();

                      }else{

                        event.preventDefault();

                      }
                      
                      "><i class="fa fa-share"> Migration des etudiants</i></a>
              </div>
            @endcan
        @endif
        <br>

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
                  @foreach($ancien_bac as $ancien)
                    <tr>
                      <td><img class="img-thumbnail" src="{{ Storage::url($ancien->image) }}" style="width:45px;height:45px; border-radius:100%;" alt="" srcset=""></td>
                      <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                      <td>{{ $ancien->phone }}</td>

                      <td>
                        @foreach($ancien->chambre->immeubles as $ac_imb)
                        {{$ac_imb->name}} : 
                        @endforeach
                        
                        {{$ancien->chambre->nom }}</td>
                      <td>{{ $ancien->prix }}</td>
                      <td>
                        <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.codification.edit',$ancien->id) }}">pdf <i class="fa fa-file-pdf"></i></a></span>
                      </td>
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
               <span class="pull-rigth"> {{ $ancien_bac->links() }}</span>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>  







        

          

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
      'autoWidth'   : false
    })
  })
</script>

@endsection