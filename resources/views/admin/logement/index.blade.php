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
      <!-- Debut de la div -->
      <div class="box-body">
      <div class="">
        <div class="box-header">
        <a class="col-lg-offset-5 pull-right btn btn-primary mr-5" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-ajouter-immeuble">Ajouter un Immeuble</a>
        </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table text-center responsive-table table-bordered table-striped">
              <thead>
              <tr class="bg-primary">
                <th>S.No</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Reserve</th>
                <th>Chambres</th>
                <th>Etudiants</th>
                <th>Options</th>
              </tr>
              </thead>
              {{ $i = '' }}
                <tbody>
                  @foreach($immeuble as $all_immeuble)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td><img class="img-thumbnail" style="width:50px; height:50px;border-radius:100%;" class="" src="{{ Storage::url($all_immeuble->image) }}" alt="" srcset=""></td>
                      <td>{{ $all_immeuble->name }}</td>
                      <td>{{ $all_immeuble->address }}</td>
                      <td>
                        @if($all_immeuble->status == 1)
                        Pour les nouveaux
                        @else 
                        Pour les anciens
                        @endif
                      </td>
                      <td><a href="{{ route('admin.chambre.show',$all_immeuble->id) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Chambres</a></td>
                      <td><a href="{{ route('admin.codification.show',$all_immeuble->id) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Etudiants</a></td>
                      <td>
                        <a style="margin-right:5px;" data-toggle="modal" data-id="{{$all_immeuble->id}}" data-name="{{$all_immeuble->name}}" data-target="#modal-default-{{ $all_immeuble->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                      
                        <a data-toggle="modal" data-target="#modal-default-immeuble-{{$all_immeuble->id}}" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                      <div class="modal fade" id="modal-default-immeuble-{{$all_immeuble->id}}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Suppression d'immeuble</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                                Etes vous sure de voloire supprimer cette immeuble
                              </p>
                            <form action="{{ route('admin.immeuble.destroy',$all_immeuble->id) }}" method="post" style="display:none;">
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
                        <input type="radio"  value="{{ old('status') ?? 1 }}" class="@error('status') is-invalid @enderror" id="status"  name="status" 
                          @if ($modal_immeuble->status == 1) {{ 'checked' }} @endif > 
                          Nouveau
                      </label>
                      <label style="margin-left: 14px;font-weight:bold;">
                        <input type="radio"  value="{{ old('status') ?? 2 }}" class="@error('status') is-invalid @enderror" id="status"  name="status" 
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






  <!-- Fin du modal Immeuble -->
@endsection
@section('footersection')
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection

