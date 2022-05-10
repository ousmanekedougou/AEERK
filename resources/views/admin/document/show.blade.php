@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <span class="btn btn-primary btn-block mtn-sm">
      {{$type->documents->count()}}  Documents de la categorie {{$type->name}}
      </span>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="nav-tabs-custom">

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                  <!-- .user-block -->
                  <div class="user-block">
                          <!-- /.box-body -->
                    <div class="box-footer">
                      @foreach($documents as $doc)
                      <div class="row">
                        <div class="col-md-3">
                          <a href="{{Storage::url($doc->file)}}" class="mailbox-attachment-name">
                          <span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($doc->image)}}" alt="Attachment" style="width: 100%;height:auto"></span>
                          </a>
                           <span class="mailbox-attachment-size">
                                   Image du document
                                  <a data-toggle="modal" data-id="{{$doc->id}}" data-name="{{$doc->image}}" data-target="#modal-default-update-file-{{ $doc->id }}" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                        </div>
                        <div class="col-md-9">
                            <p class="text-bold">{{ $doc->title }}</p>
                            <p> <span class="text-bold">Date de publication : </span>{{ $doc->pub_at }}</p>
                            <p> <span class="text-bold">Auteur : </span> {{ $doc->auteur }}</p>
                            <p> <span class="text-bold">Status : </span> @if($doc->status == 1) <span class="text-success">Publique</span> @else <span class="text-danger">Non Publique</span> @endif</p>
                            <span class="text-bold">Resume : </span>
                            {!! $doc->desc !!}
                            <a style="margin-top: -5px;" href="" class="btn btn-xs btn-danger" data-toggle="modal" data-id="{{$doc->id}}" data-name="{{$doc->name}}" data-target="#modal-documentDelete-{{ $doc->id }}"><i class="fa fa-trash"></i> supprimer</a>
                            <div class="modal fade" id="modal-documentDelete-{{$doc->id}}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Suppression du document</h4>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Etes vous sure de voloire supprimer ce document
                                </p>
                              <form action="{{ route('admin.document.destroy',$doc->id) }}" method="post" style="display:none;">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="forme" value="2">
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
                        </div>
                      </div>
                      <br>
                      @endforeach
                    </div>
                    <div class="box-footer text-center">
                      {{ $documents->links() }}
                    </div>
                  </div>
                  <!-- /.user-block -->

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <div class="col-md-2"></div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


    @foreach($documents as $document)
          <div class="modal fade" id="modal-default-update-file-{{ $document->id }}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Modifier un document</h4>
                </div>
                <form action="{{ route('admin.document.update',$document->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="type" value="{{ $type->id }}">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <p>
                        <label for="title">Le titre du document</label>
                        <input type="text"  value="{{ old('title') ?? $document->title}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="sujet">le sujet du document</label>
                        <input type="text"  value="{{ old('sujet') ?? $document->subject}}" class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet" placeholder="">
                        @error('sujet')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="auteur">L'auteur du document</label>
                        <input type="text"  value="{{ old('auteur') ?? $document->auteur}}" class="form-control @error('auteur') is-invalid @enderror" id="auteur" name="auteur" placeholder="">
                        @error('auteur')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                       <p>
                         <label for="date">La date de publication</label>
                        <input type="date"  value="{{ old('date') ?? $document->date}}" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="">
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
                        <input type="file" name="image" value="{{ old('image') ?? $document->image }}" class="@error('image') is-invalid @enderror" id="exampleInputFile">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <label for="file">Votre fichier pdf</label>
                        <input type="file" name="file" value="{{ old('file') ?? $document->file}}" class="@error('file') is-invalid @enderror" id="exampleInputFile">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="1" @if($document->status == 1) checked @endif name="status"> Publier
                          </label>
                        </div>
                      </p>
                    </div>
                    <div class="col-md-12">
                      <p>
                        <label for="resume">Le resume de votre document</label>
                        <textarea class="textarea" name="resume" placeholder="{{ $document->desc}}" value="{{ old('resume')  }}" class="@error('resume') is-invalid @enderror"
                        style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          {{ $document->desc}}
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


<!-- on s'est arreter a la 7eme minine de la 6eme video -->