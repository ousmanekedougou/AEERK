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
              <h3 class="text-center btn btn-primary btn-block text-bold">Toutes specialite du domaine {{$domaine->name}}</h3>
            <br>
            <div class="col-lg-6 col-lg-offset-5">
              <div class="form-group pull-right">
                  <a  data-toggle="modal" data-id="#commission" data-name="commission" data-target="#modal-default-add-spaciality" class="col-lg-offset-5 btn btn-primary" href="">Ajouter une spacialite</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>Nom des specialite</th>
                  <th>Demande emplois</th>
                  <th>Demande de stages</th>
                  <th>Options</th>
                </tr>
                </thead>
                  <tbody>
                    @foreach($speciality as $com)
                      <tr>
                        <td>{{ $com->name }}</td>
                        <td><a href="{{ route('admin.domaine.edit',$com->id) }}" class="mr-5 btn btn-xs btn-primary">Voire les postulants <i class="fa fa-eye"></i></a></td>
                        <td><a href="{{ route('admin.domaine.emploi',$com->id) }}" class="mr-5 btn btn-xs btn-success"> Voire les postulants <i class="fa fa-eye"></i></a></td>
                        <td>
                          <a data-toggle="modal" data-id="{{$com->id}}" data-name="{{$com->name}}" data-target="#modal-default-poste-{{ $com->id }}" class="mr-5"><i class="glyphicon glyphicon-edit"></i></a>
                          <a data-toggle="modal" data-target="#modal-default-delete-{{$com->id}}" style="margin-left:15px;"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                          <div class="modal fade" id="modal-default-delete-{{$com->id}}">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Suppression de specialite</h4>
                                </div>
                                <div class="modal-body">
                                  <p>
                                    Etes vous sure de voloire supprimer cette specialite
                                  </p>
                                <form action="{{ route('admin.domaine.delete',$com->id) }}" method="post" style="display:none;">
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

  <div class="modal fade" id="modal-default-add-spaciality">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ajouter une  specialite pour {{ $domaine->name }}</h4>
        </div>
        <form action="{{ route('admin.domaine.post') }}" method="post">
        @csrf
        <div class="modal-body">
          <p>
            <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong class="message_error">{{ $message }}</strong>
              </span>
            @enderror
          </p>
          <p>
            <input type="hidden" name="domaine" value="{{$domaine->id}}">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



     @foreach($speciality as $modal_poste)
        <div class="modal fade" id="modal-default-poste-{{ $modal_poste->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer une  specialite</h4>
              </div>
              <form action="{{ route('admin.domaine.update_post',$modal_poste->id) }}" method="post">
              @csrf
               {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                  <input type="text"  value="{{ old('name') ?? $modal_poste->name}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                  <select type="text"  value="{{ old('domaine') }}" class="form-control @error('domaine') is-invalid @enderror" id="domaine" name="domaine" placeholder="">
                    @foreach($add_commission as $comm)
                        <option value="{{ $comm->id }}">{{ $comm->name }}</option>
                    @endforeach
                  </select>
                  @error('domaine')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
  <!-- Fin du modal de gestion des postes -->





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

