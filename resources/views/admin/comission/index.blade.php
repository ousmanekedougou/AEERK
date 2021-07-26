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
            <div class="col-lg-6 col-lg-offset-5">
              @can('logement.create', Auth::guard('admin')->user())
              <div class="form-group pull-right">
                  <a  data-toggle="modal" data-id="#commission" data-name="commission" data-target="#modal-default-add-commission" class="col-lg-offset-5 btn btn-primary" href="">Ajouter une commission</a>
              </div>
              @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Commission</th>
                  <th>Options</th>
                </tr>
                </thead>
                  <tbody>
                          @foreach($add_commission as $com)
                          <tr>
                          <td>1</td>
                            <td>{{ $com->name }}</td>
                            <td>
                            @can('logement.update', Auth::guard('admin')->user())
                              <a data-toggle="modal" data-id="{{$com->id}}" data-name="{{$com->name}}" data-target="#modal-default-{{ $com->id }}" class="mr-5"><i class="glyphicon glyphicon-edit"></i></a>
                            @endcan
                            @can('logement.delete', Auth::guard('admin')->user())
                              <a data-toggle="modal" data-target="#modal-default-{{$com->id}}" style="margin-left:15px;"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              <div class="modal fade" id="modal-default-{{$com->id}}">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Suppression de commission</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>
                                        Etes vous sure de voloire supprimer cette commission
                                      </p>
                                    <form action="{{ route('admin.comission.destroy',$com->id) }}" method="post" style="display:none;">
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
                              @endcan
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

                <!-- Debut de la div -->
   <div class="box-body">
          <div class="">
          <div class="col-lg-6 col-lg-offset-5">
            @can('logement.create', Auth::guard('admin')->user())
            <div class="form-group pull-right">
            <a  data-toggle="modal" data-id="#commission" data-name="commission" data-target="#modal-default-poste-add" class="col-lg-offset-5 btn btn-primary" href="">Ajouter un Poste</a>
              </div>
            </div>
            @endcan
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Postes</th>
                  <th>Commission</th>
                  <th>Options</th>
                </tr>
                </thead>
                  <tbody>
                          @foreach($add_poste as $poste)
                          <tr>
                          <td>1</td>
                            <td>{{ $poste->name }}</td>
                            <td>
                            @foreach($poste->commissions as $poste_com)
                            {{ $poste_com->name }}
                            @endforeach
                            </td>
                            <td>
                            @can('logement.update', Auth::guard('admin')->user())
                              <a data-toggle="modal" data-id="{{$poste->id}}" data-name="{{$poste->name}}" data-target="#modal-default-poste-{{ $poste->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                            @endcan
                            @can('logement.delete', Auth::guard('admin')->user())
                               <a data-toggle="modal" data-target="#modal-default-poste-{{$poste->id}}" style="margin-left:15px;"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              <div class="modal fade" id="modal-default-poste-{{$poste->id}}">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Suppression de poste</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>
                                        Etes vous sure de voloire supprimer ce poste
                                      </p>
                                    <form action="{{ route('admin.posteCommission.destroy',$poste->id) }}" method="post" style="display:none;">
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
                            @endcan
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



  <!-- Debut des modal de commissions -->

        <div class="modal fade" id="modal-default-add-commission">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter une Commision</h4>
              </div>
              <form action="{{ route('admin.comission.store') }}" method="post">
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
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistre</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  @foreach($add_commission as $modal_com)
        <div class="modal fade" id="modal-default-{{ $modal_com->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Commision</h4>
              </div>
              <form action="{{ route('admin.comission.update',$modal_com->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') ?? $modal_com->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
  <!-- Fin du modal des commissions -->



  <!-- Modal de gestion des postes -->


        <div class="modal fade" id="modal-default-poste-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un Poste</h4>
              </div>
              <form action="{{ route('admin.posteCommission.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                <select type="text"  value="{{ old('commission') }}" class="form-control @error('commission') is-invalid @enderror" id="commission" name="commission" placeholder="">
                    @foreach($add_commission as $comm)
                        <option value="{{ $comm->id }}">{{ $comm->name }}</option>
                    @endforeach
                </select>
                  @error('commission')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



      @foreach($add_poste as $modal_poste)
        <div class="modal fade" id="modal-default-poste-{{ $modal_poste->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Postes</h4>
              </div>
              <form action="{{ route('admin.posteCommission.update',$modal_poste->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') ?? $modal_poste->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                <select type="text"  value="{{ old('commission') }}" class="form-control @error('commission') is-invalid @enderror" id="commission" name="commission" placeholder="">
                    @foreach($add_commission as $comm)
                        <option value="{{ $comm->id }}">{{ $comm->name }}</option>
                    @endforeach
                </select>
                  @error('commission')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
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