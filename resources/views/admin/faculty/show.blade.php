@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection

  @section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">
        <span class="btn btn-primary btn-block">{{ $count }} etudiants de la filliere {{$filliere->name}} :
          @if($niveau == 1)
            Licence 1
          @elseif($niveau == 2)
            Licence 2
          @elseif($niveau == 3)
            Licence 3
          @elseif($niveau == 4)
            Masters 1
          @elseif($niveau == 5)
            Masters 2
          @endif
        </span>
        <br>

            <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Commune</th>
                    <th>option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ancien_bac as $ancien)
                    <tr>
                      <td><img class="img-thumbnail" src="{{ Storage::url($ancien->image) }}" style="width:45px;height:45px; border-radius:100%;" alt="" srcset=""></td>
                      <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                      <td>{{ $ancien->email }}</td>
                      <td>{{ $ancien->phone }}</td>
                      <td>
                        {{$ancien->commune->name}}
                      </td>
                      <td>
                      <a href="{{ route('admin.codification.edit',$ancien->id) }}" class="btn btn-warning btn-xs text-center"><i class="fa fa-eye"></i></a></span>
                      <a class="btn btn-danger btn-xs text-center" data-toggle="modal" data-target="#modal-default-{{$ancien->id}}"><i class="fa fa-trash"></i></a></span>
                      <div class="modal fade" id="modal-default-{{$ancien->id}}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Suppression d'un etidiant</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                                Etes vous sure de voloire supprimer {{$ancien->prenom}} {{$ancien->nom}}
                              </p>
                            <form action="{{ route('admin.ancien.destroy',$ancien->id) }}" method="post" style="display:none;">
                              @csrf
                              {{ method_field('DELETE') }}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                              <button type="submit" class="btn btn-danger">Supprimer</button>
                            </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
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