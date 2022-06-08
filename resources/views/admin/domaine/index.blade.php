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
              <div class="form-group pull-right">
                  <a  data-toggle="modal" data-id="#commission" data-name="commission" data-target="#modal-default-add-commission" class="col-lg-offset-5 btn btn-primary" href="">Ajouter un domaine</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>Image</th>
                  <th>Nom Domaine</th>
                  <th>Specialites</th>
                  <th>Options</th>
                </tr>
                </thead>
                  <tbody>
                    @foreach($add_commission as $com)
                      <tr>
                        <td> <img src="{{ Storage::url($com->image) }}" style="width: 30px;height:30px; border-radius:100%;" alt="" srcset=""> </td>
                        <td>{{ $com->name }}</td>
                        <td>
                          <a class="btn btn-xs btn-success" href="{{ route('admin.domaine.show',$com->id) }}" class="mr-5"><i class="fa fa-eye"> {{$com->specialities->count()}} Voire</i></a>
                          <a class="btn btn-xs btn-primary" style="margin-left: 10px;" data-toggle="modal" data-id="{{$com->id}}" data-name="{{$com->name}}" data-target="#modal-default-poste-{{ $com->id }}" class="mr-5"><i class="fa fa-plus"> Ajouter</i></a>
                        </td>
                        <td>
                          <a data-toggle="modal" data-id="{{$com->id}}" data-name="{{$com->name}}" data-target="#modal-default-{{ $com->id }}" class="mr-5"><i class="glyphicon glyphicon-edit"></i></a>
                          <a data-toggle="modal" data-target="#modal-default-delete-{{$com->id}}" style="margin-left:15px;"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                          <div class="modal fade" id="modal-default-delete-{{$com->id}}">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Suppression de domaine</h4>
                                </div>
                                <div class="modal-body">
                                  <p>
                                    Etes vous sure de voloire supprimer ce domaine
                                  </p>
                                <form action="{{ route('admin.domaine.destroy',$com->id) }}" method="post" style="display:none;">
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



  <!-- Debut des modal de commissions -->

      <div class="modal fade" id="modal-default-add-commission">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ajouter un domaine</h4>
            </div>
            <form action="{{ route('admin.domaine.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <p>
                <label for="">Nom du domaine</label>
                <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong class="message_error">{{ $message }}</strong>
                  </span>
                @enderror
              </p>
              <p>
                <label for="">Image de votre domaine</label>
              <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong class="message_error">{{ $message }}</strong>
                  </span>
                @enderror
              </p>

              <p>
                <label for="">Description de votre domaine</label>
                  <textarea id="editor1" class="textarea @error('desc') is-invalid @enderror" value="{{ old('desc')}}" name="desc" placeholder=""
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  @error('desc')
                        <span class="invalid-feedback" role="alert">
                          <strong class="message_error text-danger">{{ $message }}</strong>
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
                <h4 class="modal-title">Editer Votre Domaine</h4>
              </div>
              <form action="{{ route('admin.domaine.update',$modal_com->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                  <label for="">Nom de votre domaine</label>
                <input type="text"  value="{{ old('name') ?? $modal_com->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                  <label for="">Image de votre domaine</label>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                 <p>
                  <label for="">Description de votre domaine</label>
                   <textarea id="editor1" class="textarea @error('desc') is-invalid @enderror" value="{{ old('desc') ?? $modal_com->desc}}" name="desc" placeholder=""
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {!! $modal_com->body !!}
                  </textarea>
                    @error('desc')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
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


     @foreach($add_commission as $modal_poste)
        <div class="modal fade" id="modal-default-poste-{{ $modal_poste->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter une  specialite pour {{ $modal_poste->name }}</h4>
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

