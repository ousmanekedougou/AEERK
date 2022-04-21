@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection
@section('main-content')

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        


        {{-- Debut pour la gestion de l'immeuble Zone A --}}
            <!-- Debut de la div -->
            <div class="box-body">
              <div class="">
                <h4 class="btn btn-primary text-center pull-center" style="margin-left:10px;">{{ $immeuble->name }}</h4>
                <!-- /.box-header -->
                <a class="col-lg-offset-5 pull-right btn btn-primary" data-toggle="modal" data-id="add-chambre" data-name="add-chambre" data-target="#modal-default-add-chambre" style="margin-right: 10px;margin-bottom:-20px;">Ajouter une chambre</a>
                <div class="box-body">
                  <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                    <thead>
                    <tr class="bg-primary">
                      <th>S.No</th>
                      <th>Nom</th>
                      <th>Nombre</th>
                      <th>Status</th>
                      <th>Pour</th>
                      <th>Genre</th>
                      <th>Etudiants</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    {{ $i = '' }}
                      <tbody>
                        @foreach($immeuble->chambres as $chm)
                          <tr @if($chm->genre == 1) class="bg-warning" @endif>
                            <td>{{ ++$i }}</td>
                            <td>{{ $chm->nom }}</td>
                            <td >{{ $chm->nombre }}</td>
                            <td>
                              @if($chm->is_pleine == 1)
                                <span class="badge btn btn-danger btn-xs"> Chambre Pleine </span>
                              @else 
                              <span class="badge btn btn-success btn-xs"> Disponible </span>
                                
                              @endif
                            </td>
                            <td>
                              @if($chm->status == 0)
                                <span class="badge btn btn-info btn-xs"> Masters 1 et moins </span>
                              @else 
                              <span class="badge btn btn-success btn-xs"> Msaters 2 </span>
                                
                              @endif
                            </td>
                             <td>
                              @if($chm->genre == 1)
                                <span class="badge btn btn-warning btn-xs"> Femme </span>
                              @else 
                              <span class="badge btn btn-primary btn-xs"> Homme </span>
                                
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('admin.chambre.edit',$chm->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"> </i> Voire</a>
                            </td>
                            <td>
                              <a style="margin-right:5px;" data-toggle="modal" data-id="{{$chm->id}}" data-name="{{$chm->name}}" data-target="#modal-default-chambre-{{ $chm->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                           
                              <a data-toggle="modal" data-target="#modal-default-chambre-delete-{{$chm->id}}" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              <div class="modal fade" id="modal-default-chambre-delete-{{$chm->id}}">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Suppression de cahmbre</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>
                                        Etes vous sure de voloire supprimer cette chambre
                                      </p>
                                    <form action="{{ route('admin.chambre.destroy',$chm->id) }}" method="post" style="display:none;">
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
        {{-- Fin de la gestion de l'immeuble Zone A --}}




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




    <!-- Modal des chambre -->


        {{-- Ajouter une chambre a immeuble  --}}
          <div class="modal fade" id="modal-default-add-chambre">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter Votre Chambre</h4>
                </div>
                <form action="{{ route('admin.chambre.store') }}" method="post">
                @csrf
                <div class="modal-body">
                  <p><input type="hidden" value="{{ $immeuble->id }}" name="immeuble"></p>
                <p>
                  <label for="slug">Nom de la chambre</label>
                  <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                    
                  </p>
                  {{--
                  <p>
                    <label for="slug">Immeubles</label>
                    <div class="row" style="margin-bottom:15px;">
                      @foreach($immeuble as $imb)
                        <div class="col-lg-3">
                          <label class="col-form-label text-md-right " for="role"> <input type="radio" name="immeuble" value="{{ old('immeuble') ?? $imb->id }}" class="@error('immeuble') is-invalid @enderror" id="" 
                          > <span style="font-size:12px;">{{ $imb->name }}</span> </label>
                          @error('immeuble')
                            <span class="invalid-feedback" role="alert">
                                <strong class="message_error">{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      @endforeach
                    </div>
                  </p>
                  --}}
                  <p>
                    <label for="slug">Nombre de place</label>
                    <input type="number"  value="{{ old('nombre')}}" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="">
                    @error('nombre')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                    <div class="row">
                      <div class="radio">
                            <div class="col-lg-2">
                              <label class="col-form-label text-md-right" for="role"> <input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class="@error('genre') is-invalid @enderror" id=""> Femme </label>
                              @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="message_error">{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="col-lg-2">
                              <label class="col-form-label text-md-right" for="role"> <input type="radio" name="genre" value="{{ old('genre') ?? 2 }}" class="@error('genre') is-invalid @enderror" id=""> Homme </label>
                              @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="message_error">{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                        </div>
                    </div>
                  </p>
                   <p>
                      <div class="row">
                        <div class="radio pull-left">
                          <label style="margin-right:5px;">
                              <input type="radio" value="{{ old('status') ?? 0 }}" class="@error('status') is-invalid @enderror"  name="status"  > 
                                Master 1 et moins
                          </label>
                          <label style="margin-left:5px;">
                            <input type="radio" value="{{ old('status') ?? 1 }}" class="@error('status') is-invalid @enderror"  name="status"   > 
                              Masters 2
                          </label>
                          @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong class="message_error">{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      </div>
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
        {{-- Fin d'ajout de chambre a l'immeuble 39 --}}

        {{-- Modifier une chambre a l'immeble 39 --}}
          @foreach($immeuble->chambres as $modal_chambre)
            <div class="modal fade" id="modal-default-chambre-{{ $modal_chambre->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editer Votre Chambre</h4>
                  </div>
                  <form action="{{ route('admin.chambre.update',$modal_chambre->id) }}" method="post">
                  @csrf
                  {{ method_field('PUT') }}
                  <div class="modal-body">
                    <p>
                      <input type="hidden" value="{{$modal_chambre->immeuble->id}}" name="immeuble">
                    </p>
                    <p>
                    <label for="slug">Nom de la chambre</label>
                    <input type="text"  value="{{ old('name') ?? $modal_chambre->nom }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                    </p>
                    <p>
                    <label for="slug">Nombre de place</label>
                    <input type="number"  value="{{ old('nombre') ?? $modal_chambre->nombre }}" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="">
                      @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                    </p>
                    <p>
                      <label for="slug">Le genre de la chambre</label>
                      <div class="row">
                        <div class="radio">
                              <div class="col-lg-2">
                                <label class="col-form-label text-md-right" for="role"> <input type="radio" name="genre" value="{{ old('genre') ?? 1 }}" class="@error('genre') is-invalid @enderror" id="" @if ($modal_chambre->genre == 1) {{ 'checked' }} @endif> Femme </label>
                                @error('genre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong class="message_error">{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <div class="col-lg-2">
                                <label class="col-form-label text-md-right" for="role"> <input type="radio" name="genre" value="{{ old('genre') ?? 2 }}" class="@error('genre') is-invalid @enderror" id="" @if ($modal_chambre->genre == 2) {{ 'checked' }} @endif> Homme </label>
                                @error('genre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong class="message_error">{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>
                      </div>
                    </p>
                    
                    <p>
                      <div class="row">
                        <div class="radio pull-left">
                        <label style="margin-right:5px;">
                          
                            <input type="radio" name="status" value="{{ old('status') ?? 0 }}" class="@error('status') is-invalid @enderror" 
                            @if ($modal_chambre->status == 0) {{ 'checked' }} @endif > 
                              Masters 1 et moins
                        </label>
                        <label style="margin-left:5px;">
                          
                          <input type="radio"  name="status" value="{{ old('status') ?? 1 }}" class="@error('status') is-invalid @enderror" 
                          @if ($modal_chambre->status == 1) {{ 'checked' }} @endif > 
                            Masters 2
                        </label>
                        @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      </div>
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
        {{-- Fin de modification de chambre a l'immeuble 39 --}}




  <!-- Fin du modal Immeuble -->
@endsection
@section('footersection')
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection

