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
        <h3 class="text-center btn btn-primary btn-block text-bold"> {{$employes->count()}} candidats pour la spacialite {{$speciality->name}} </h3>
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
                <th>Niveau</th>
                <th>Type de demande</th>
                <th>Options</th>
              </tr>
              </thead>
              <tbody>
              @foreach($employes as $emploi)
                <tr>
                  <td><img class="img-thumbnail" src="{{ Storage::url($emploi->image) }}" style="width:45px;height:45px;border-radius:100%;" alt="" srcset=""></td>
                  <td>{{ $emploi->name}}</td>
                  <td>{{ $emploi->email }}</td>
                  <td>{{ $emploi->phone }}</td>
                  <td>{{ $emploi->commune->name }}</td>
                  <td>
                    @if($emploi->niveau_id == 1)
                      Licence 1
                    @elseif($emploi->niveau_id == 2)
                      Licence 2
                    @elseif($emploi->niveau_id == 3)
                      Licence 3
                    @elseif($emploi->niveau_id == 4)
                      Masters 1
                    @elseif($emploi->niveau_id == 5)
                      Masters 2
                    @endif
                  </td>
                  <td>
                    @if($emploi->status == 1)
                      <span class="btn btn-primary btn-xs"> <i class=""></i> Emploi</span>
                    @elseif($emploi->status == 2) 
                      <span class="btn btn-success btn-xs"> <i class=""></i> Stage</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-danger btn-xs text-center"data-toggle="modal" data-target="#modal-default-{{$emploi->id}}"><i class="fa fa-trash"></i></a></span>
                    <div class="modal fade" id="modal-default-{{$emploi->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Suppression d'un etudiant</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              Etes vous sure de voloire supprimer {{$emploi->name}}
                            </p>
                          <form action="{{ route('admin.domaine.delete_emploi',$emploi->id) }}" method="post" style="display:none;">
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
             {{$employes->links()}} 
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <!-- Fin de la div  -->
   </section>
    <!-- /.content -->
</div>
  <!-- Fin de la div -->
  <!-- /.content-wrapper -->


@foreach($employes as $emploi)
<div class="modal fade" id="modal-default-delete-{{$emploi->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Suppression de candidats</h4>
      </div>
      <div class="modal-body">
        <p>
          Etes vous sure de voloire supprimer ce candidats
        </p>
      <form action="{{ route('admin.domaine.delete_emploi',$emploi->id) }}" method="post" style="display:none;">
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
@endforeach

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

