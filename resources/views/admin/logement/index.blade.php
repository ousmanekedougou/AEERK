@extends('admin.layouts.app')

@section('main-content')

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
          <!-- Debut de la div -->
          <div class="box-body">
          <div class="">
            <div class="box-header">
            @can('logement.create', Auth::guard('admin')->user())
            <a class="col-lg-offset-5 pull-right btn btn-primary mr-5" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-ajouter-immeuble">Ajouter un Immeuble</a>
            @endcan
            </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr class="bg-primary">
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Reserve</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  {{ $i = '' }}
                    <tbody>
                    @foreach($immeuble as $all_immeuble)
                            <tr>
                            <td>{{ ++$i }}</td>
                            <td><img style="width:70px; height:auto;" class="" src="{{ Storage::url($all_immeuble->image) }}" alt="" srcset=""></td>
                              <td>{{ $all_immeuble->name }}</td>
                              <td>{{ $all_immeuble->address }}</td>
                              <td>
                                @if($all_immeuble->status == 1)
                                Pour les nouveaux
                                @else 
                                Pour les anciens
                                @endif
                              </td>
                              <td>
                              @can('logement.update', Auth::guard('admin')->user())
                                <a style="margin-right:5px;" data-toggle="modal" data-id="{{$all_immeuble->id}}" data-name="{{$all_immeuble->name}}" data-target="#modal-default-{{ $all_immeuble->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                              @endcan
                              @can('logement.delete', Auth::guard('admin')->user())
                                <form id="delete-form-{{$all_immeuble->id}}" method="post" action="{{ route('admin.immeuble.destroy',$all_immeuble->id) }}" style="display:none">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                </form>
                              <a style="margin-left:8px;" href="" onclick="
                                if(confirm('Etes Vous Sure De Supprimer Cette Immeuble ?')){

                                event.preventDefault();document.getElementById('delete-form-{{$all_immeuble->id}}').submit();

                                }else{

                                  event.preventDefault();

                                }
                                
                                "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              @endcan
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                  <tfoot>
                  <tr class="bg-primary">
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Reserve</th>
                    <th>Options</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- fin de la table -->
              <!-- /.box-body -->
          </div>
        </div>
        <!-- Fin de la div  -->
        


        {{-- Debut pour la gestion de l'immeuble Zone A --}}
            <!-- Debut de la div -->
            <div class="box-body">
              <div class="">
              @can('logement.create', Auth::guard('admin')->user())
                <a class="col-lg-offset-5 pull-right btn btn-primary" data-toggle="modal" data-id="add-chambre" data-name="add-chambre" data-target="#modal-default-add-chambre" style="margin-right: 10px">Ajouter une chambre</a>
              @endcan
                <!-- /.box-header -->
                @foreach($immeuble as $all_immeuble)
                <h4 class="btn btn-primary text-center pull-center" style="margin-left:10px;">{{ $all_immeuble->name }}</h4>
                <div class="box-body">
                  <table id="example1" class="table text-center table-bordered table-striped">
                    <thead>
                    <tr class="bg-primary">
                      <th>S.No</th>
                      <th>Nom</th>
                      <th>Nombre</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    {{ $i = '' }}
                      <tbody>
                        @foreach($all_immeuble->chambres as $chm)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $chm->nom }}</td>
                            <td >{{ $chm->nombre }}</td>
                            <td>
                              @if($chm->status == 1)
                                Codifiable
                                @else 
                                Non Codifiable
                                @endif
                            </td>
                            <td>
                            @can('logement.update', Auth::guard('admin')->user())
                            <a style="margin-right:5px;" data-toggle="modal" data-id="{{$chm->id}}" data-name="{{$chm->name}}" data-target="#modal-default-chambre-{{ $chm->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                            @endcan
                            @can('logement.delete', Auth::guard('admin')->user())
                            <form id="delete-form-{{$chm->id}}" method="post" action="{{ route('admin.chambre.destroy',$chm->id) }}" style="display:none">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            </form>
                            <a style="margin-left:8px;" href="" onclick="
                            if(confirm('Etes Vous Sure Supprimer Cette Chambre ?')){
  
                            event.preventDefault();document.getElementById('delete-form-{{$chm->id}}').submit();
  
                            }else{
  
                              event.preventDefault();
  
                            }
                            
                            "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                            @endcan
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    <tfoot>
                    <tr class="bg-primary">
                      <th>S.No</th>
                      <th>Nom</th>   
                      <th>Nombre</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                @endforeach
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


  <!-- Modal Immeuble -->

        {{-- Ajouter un immeuble --}}
          <div class="modal fade" id="modal-default-ajouter-immeuble">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter Un Immeuble</h4>
                </div>
                <form action="{{ route('admin.immeuble.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <p>
                  <label for="name">Nom de votre Immeuble</label>
                  <input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                  <label for="addresse">Addresse de votre immeuble</label>
                  <input type="text"  value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="">
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                  <input type="file"  value="{{ old('image') }}" class=" @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                    <div class="pull-left radio">
                      <label  style="font-weight:bold; margin-right:14px">
                          <input type="radio"  value="1" class="@error('status') is-invalid @enderror" id="status"  name="status"> 
                          Nouveau
                          @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </label>

                      <label style="font-weight:bold;margin-left:14px;">
                           <input type="radio"  value="2" class="@error('status') is-invalid @enderror" id="status"  name="status"> 
                        Anciens
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                      </label>
                    </div>
                  <br>
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
        {{-- Fin D'ajout d'immeuble --}}

      {{-- Modifier un immeuble --}}
        @foreach($immeuble as $modal_immeuble)
          <div class="modal fade" id="modal-default-{{ $modal_immeuble->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Editer Votre Immeuble</h4>
                </div>
                <form action="{{ route('admin.immeuble.update',$modal_immeuble->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                  <p>
                  <input type="text"  value="{{ old('name') ?? $modal_immeuble->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                  <input type="text"  value="{{ old('address') ?? $modal_immeuble->address }}" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="">
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                  <input type="file"  value="{{ old('image') ?? $modal_immeuble->image }}" class=" @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                    <div class="radio pull-left">
                      <label style="margin-right: 14px;font-weight:bold;">
                        <input type="radio"  value="{{ old('status') ?? $modal_immeuble->status }}" class="@error('status') is-invalid @enderror" id="status"  name="status" 
                          @if ($modal_immeuble->status == 1) {{ 'checked' }} @endif > 
                          Nouveau
                      </label>
                      <label style="margin-left: 14px;font-weight:bold;">
                        <input type="radio"  value="{{ old('status') ?? $modal_immeuble->status }}" class="@error('status') is-invalid @enderror" id="status"  name="status" 
                        @if ($modal_immeuble->status == 2) {{ 'checked' }} @endif > 
                        Anciens
                    </label>
                    </div>
                    <br>
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
      {{-- Fin de Modifier un immeuble --}}
  <!-- Fin du modal Immeuble -->



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
                  <p><input type="hidden" value="39" name="numero"></p>
                  <p>
                  <label for="slug">Nom de la chambre</label>
                  <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  <p>
                    <input type="hidden" value="1" name="immeuble">
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
                  <p>
                  <label for="slug">Nombre de place</label>
                  <input type="number"  value="{{ old('nombre')}}" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="">
                    @error('nombre')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                    </p>
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
          @foreach($chambre as $modal_chambre)
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
                    <p><input type="hidden" value="39" name="numero"></p>
                    <p>
                    <label for="slug">Nom de la chambre</label>
                    <input type="text"  value="{{ old('name') ?? $modal_chambre->nom }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                    </p>
                    <label for="slug">Nombre de place</label>
                    <input type="number"  value="{{ old('nombre') ?? $modal_chambre->nombre }}" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="">
                      @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                    </p>
                    </p>
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
                      <div class="radio pull-left">
                        <label style="margin-right:5px;">
                          
                            <input type="radio" value="0"  name="status"  
                            @if ($modal_chambre->status == 0) {{ 'checked' }} @endif > 
                              Non Codifiable
                        </label>
                        <label style="margin-left:5px;">
                          
                          <input type="radio" value="1"  name="status"  
                          @if ($modal_chambre->status == 1) {{ 'checked' }} @endif > 
                            Codifiable
                      </label>
                      </div>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button> -->
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


