@extends('admin.layouts.app')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <section class="content">
            <a  data-toggle="modal" data-id="#systeme" data-name="systeme" data-target="#modal-systeme-add" class="col-lg-offset-5 btn btn-success" href="">Ajouter</a>
            <br><br>

            @foreach ($all_systeme as $systeme)
              @if ($systeme->type == 1)
              <h2 class="text-center">Le systeme Formelle</h2>
                <div class="row">
                    
                  <div class="col-sm-3">
                    <img src="{{ Storage::url($systeme->image) }}" style="width:700%;" class="card-img-top img-responsive img-thumbnail" alt="" srcset="">
                    <p>{{ $systeme->titre }}</p>
                    <p>
                      @if ($systeme->type == 1)
                          Formelle
                      @endif
                      {{ $systeme->type }}
                    </p>
                    <p>{{ $systeme->content }}</p>
                    <span class="d-flex">
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-id="{{$systeme->id}}" data-name="{{$systeme->name}}" data-target="#modal-default-update-systeme-{{ $systeme->id }}"><i class="glyphicon glyphicon-edit"></i> Modifier</a>

                      <form id="delete-form-{{$systeme->id}}" method="post" action="{{ route('admin.systeme.destroy',$systeme->id) }}" style="display:none">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        </form>
                      <a href="" class="btn btn-danger btn-xs" onclick="
                        if(confirm('Etes Vous Sur De Supprimer Ce contenu ?')){
    
                        event.preventDefault();document.getElementById('delete-form-{{$systeme->id}}').submit();
    
                        }else{
    
                          event.preventDefault();
    
                        }
                        
                        "><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
                    </span>
                  </div>
                  
                </div>

              @elseif($systeme->type == 2)
              <h2 class="text-center">Le systeme EBJA</h2>
              <div class="row">
                  
                <div class="col-sm-3">
                  <img src="{{ Storage::url($systeme->image) }}" style="width:700%;" class="card-img-top img-responsive img-thumbnail" alt="" srcset="">
                  <p>{{ $systeme->titre }}</p>
                  <p>
                    @if($systeme->type == 2)
                        EBJA
                    @endif
                  </p>
                  <p>{{ $systeme->content }}</p>
                  <span class="d-flex">
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-id="{{$systeme->id}}" data-name="{{$systeme->name}}" data-target="#modal-default-update-systeme-{{ $systeme->id }}"><i class="glyphicon glyphicon-edit"></i> Modifier</a>

                    <form id="delete-form-{{$systeme->id}}" method="post" action="{{ route('admin.systeme.destroy',$systeme->id) }}" style="display:none">
                      {{csrf_field()}}
                      {{method_field('delete')}}
                      </form>
                    <a href="" class="btn btn-danger btn-xs" onclick="
                      if(confirm('Etes Vous Sur De Supprimer Ce contenu ?')){
  
                      event.preventDefault();document.getElementById('delete-form-{{$systeme->id}}').submit();
  
                      }else{
  
                        event.preventDefault();
  
                      }
                      
                      "><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
                  </span>
                </div>
                
              </div>
              @endif
            @endforeach

          </section>
        </div>
      <!-- /.content-wrapper -->


          <!-- Debut du modal des ajouts -->
        <!-- Modal Departement -->
        <div class="modal fade" id="modal-systeme-add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">systeme Educatif</h4>
              </div>
              <form action="{{ route('admin.systeme.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <p>
                      <label for="systeme">Type</label>
                      <select  value="{{ old('type')  }}" class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="1">Formelle</option>
                        <option value="2">EBJA</option>
                      </select>
                        @error('type')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                  </div>

                  <div class="col-sm-6">
                    <p>
                      <label for="titre">Titre du contenu</label>
                      <input type="text"  value="{{ old('titre')  }}" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" placeholder="">
                        @error('titre')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                  </div>
              </div>
              <p>
                <div class="">
                  <label for="image">Image</label>
                  <input type="file" value="{{ old('image')  }}" class=" @error('image') is-invalid @enderror" id="image" name="image">
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong class="message_error">{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </p>
                <p>
                  <div class="box-body pad">
                    <label for="detail">Details</label>
                    <textarea value="{{ old('content')  }}" class="@error('content') is-invalid @enderror"  name="content" id="editor1"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
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
      <!-- Fin du modal Departement -->


             <!-- Modal D'eddition -->
             @foreach ($all_systeme as $sys)
             <div class="modal fade" id="modal-default-update-systeme-{{ $sys->id }}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">systeme Educatif</h4>
                  </div>
                  <form action="{{ route('admin.systeme.update',$sys->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{ method_field('PUT') }}
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <p>
                          <label for="systeme">Type</label>
                          <select  value="{{ old('type')  }}" class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                            <option value="formelle">Formelle</option>
                            <option value="ebja">EBJA</option>
                          </select>
                            @error('type')
                              <span class="invalid-feedback" role="alert">
                                  <strong class="message_error">{{ $message }}</strong>
                              </span>
                            @enderror
                          </p>
                      </div>
    
                      <div class="col-sm-6">
                        <p>
                          <label for="titre">Titre du contenu</label>
                          <input type="text"  value="{{ old('titre') ?? $sys->titre  }}" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" placeholder="">
                            @error('titre')
                              <span class="invalid-feedback" role="alert">
                                  <strong class="message_error">{{ $message }}</strong>
                              </span>
                            @enderror
                          </p>
                      </div>
                  </div>
                  <p>
                    <div class="">
                      <label for="image">Image</label>
                      <input type="file" value="{{ old('image')  }}" class=" @error('image') is-invalid @enderror" id="image" name="image">
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                  </p>
                    <p>
                      <div class="box-body pad">
                        <label for="detail">Details</label>
                        <textarea value="{{ old('content')  }}" class="@error('content') is-invalid @enderror"  name="content" id="editor1"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          {{ $sys->content }}
                        </textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
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
          <!-- Fin du modal d'eddition -->

@endsection

  @section('footersection')
  <script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>  
  
@endsection