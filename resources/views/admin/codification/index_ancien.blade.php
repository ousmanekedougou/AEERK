@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
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
              <div  style="float:right;">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal-default-migraion"><i class="fa fa-share"> Migration des etudiants</i></a>

                      <div class="modal fade" id="modal-default-migraion">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-left">Migration d'etudiants</h4>
                            </div>
                            <div class="modal-body">
                              <p class="text-left">
                                Etes vous sure de vouloire migret tous les etudiants
                              </p>
                            <form action="{{ route('admin.migret_nouveau') }}" method="get" style="display:none;">
                             
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                              <button type="submit" class="btn btn-primary">Valider le migration</button>
                            </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
            @endcan
        @endif
        <br>

            <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                    <th>Place</th>
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
                        @if($ancien->chambre->position == 1)
                          {{ $ancien->chambre->position }} ere
                        @else 
                          {{ $ancien->chambre->position }} em
                        @endif
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
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
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
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