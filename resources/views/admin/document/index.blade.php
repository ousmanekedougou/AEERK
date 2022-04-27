@extends('admin.layouts.app')

@section('main-content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
        <!-- Debut de la div -->
        <div class="box-body">
        <div class="">
          <div class="box-header">
          <a class="col-lg-offset-5 pull-right btn btn-primary mr-5" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-ajouter-immeuble">Ajouter une categorie</a>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Nom</th>
                  <th>Livres</th>
                  <th>Options</th>
                </tr>
                </thead>
                {{ $i = '' }}
                  <tbody>
                    @foreach($document_all as $document)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $document->name }}</td>
                        <td><a href="{{ route('admin.document.show',$document->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Voir livres</a>
                        <a href="" class="btn btn-xs btn-success" data-toggle="modal" data-id="{{$document->id}}" data-name="{{$document->name}}" data-target="#modal-documentAdd-{{ $document->id }}"><i class="fa fa-plus"></i> Ajouter un livre</a></td>
                        <td>
                          <a style="margin-right:5px;" data-toggle="modal" data-id="{{$document->id}}" data-name="{{$document->name}}" data-target="#modal-default-{{ $document->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                        
                          <a data-toggle="modal" data-target="#modal-default-immeuble-{{$document->id}}" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                        <div class="modal fade" id="modal-default-immeuble-{{$document->id}}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Suppression d'immeuble</h4>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Etes vous sure de voloire supprimer cette categorie
                                </p>
                              <form action="{{ route('admin.document.destroy',$document->id) }}" method="post" style="display:none;">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="forme" value="1">
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


     {{-- Ajouter un categorie --}}
          <div class="modal fade" id="modal-default-ajouter-immeuble">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter une categorie</h4>
                </div>
                <form action="{{ route('admin.document.store') }}" method="post">
                @csrf
                <input type="hidden" name="forme" value="1">
                <div class="modal-body">
                  <p>
                  <label for="name">Nom de votre categorie</label>
                  <input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                  {{--
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
                  --}}
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
    {{-- Fin D'ajout de categorie --}}


        
        @foreach($document_all as $modal_immeuble)
          <div class="modal fade" id="modal-default-{{ $modal_immeuble->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Editer Votre categorie</h4>
                </div>
                <form action="{{ route('admin.document.update',$modal_immeuble->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                  <p>
                    <input type="hidden" name="forme" value="1">
                  <input type="text"  value="{{ old('name') ?? $modal_immeuble->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
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


         @foreach($document_all as $document)
          <div class="modal fade" id="modal-documentAdd-{{ $document->id }}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter un document</h4>
                </div>
                <form action="{{ route('admin.document.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <input type="hidden" name="forme" value="2">
                  <input type="hidden" name="type" value="{{ $document->id }}">
                  <div class="row">
                    <div class="col-md-6">
                      <p>
                        <label for="title">Le titre du document</label>
                        <input type="text"  value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="sujet">le sujet du document</label>
                        <input type="text"  value="{{ old('sujet')}}" class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet" placeholder="">
                        @error('sujet')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="auteur">L'auteur du document</label>
                        <input type="text"  value="{{ old('auteur')}}" class="form-control @error('auteur') is-invalid @enderror" id="auteur" name="auteur" placeholder="">
                        @error('auteur')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                       <p>
                         <label for="date">La date de publication</label>
                        <input type="date"  value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="">
                        @error('date')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p>
                        <label for="image">Votre Image</label>
                        <input type="file" name="image" value="{{ old('image')  }}" class="@error('image') is-invalid @enderror" id="exampleInputFile">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <label for="file">Votre fichier pdf</label>
                        <input type="file" name="file" value="{{ old('file')}}" class="@error('file') is-invalid @enderror" id="exampleInputFile">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="1" name="status"> Publier
                          </label>
                        </div>
                      </p>
                    </div>
                    <div class="col-md-12">
                      <p>
                        <label for="resume">Le resume de votre document</label>
                        <textarea class="textarea" name="resume" placeholder="" value="{{ old('resume')  }}" class="@error('resume') is-invalid @enderror"
                        style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                        @error('resume')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                    </div>
                  </div>
                  
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



@endsection