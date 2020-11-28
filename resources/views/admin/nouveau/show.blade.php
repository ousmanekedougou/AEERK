@extends('admin.layouts.app')

@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
@endsection


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($show_nouveau->image) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $show_nouveau->prenom.' '.$show_nouveau->nom }}</h3>

              <p class="text-muted text-center">Nouveau</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->email }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->phone }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_nouveau->commune->name }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $show_nouveau->immeuble->name }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->

          <!-- <div class="box box-primary">
            <div class="box-body">
              <strong><i class="fa  fa-institution margin-r-5"></i> Etablissement</strong>

              <p class="text-muted">
                 AFI L'UE (Universite de L'entreprise)
              </p>

              <hr>

              <strong><i class="fa  fa-education margin-r-5"></i> Filliere</strong>

              <p class="text-muted">
                Informatique et reseau 
              </p>

              <hr>

              <strong><i class="fa fa-graduation-cap margin-r-5"></i> Niveau</strong>

              <p class="text-muted">Master I</p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Obtention du Bac</strong>

              <p class="text-muted">
                Le 29/03/2020
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Commune</strong>

              <p>fongolimbi</p>
            </div>
          </div> -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Les documents et images poster </a></li>
              <li class="pull-right"><a href="#settings" data-toggle="tab">Modifier </a></li>
          
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                  <!-- .user-block -->
                  <div class="user-block">
                          <!-- /.box-body -->
                    <div class="box-footer">
                      <ul class="mailbox-attachments clearfix">

                        <li>
                            <a href="{{ Storage::url($show_nouveau->extrait) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Extrait de naissance
                                  <a data-toggle="modal" data-id="{{$show_nouveau->id}}" data-name="{{$show_nouveau->extrait}}" data-target="#modal-default-update-extrait" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_nouveau->attestation) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Attestation Du Bac
                                  <a data-toggle="modal" data-id="{{$show_nouveau->id}}" data-name="{{$show_nouveau->attestation}}" data-target="#modal-default-update-attestation" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_nouveau->photocopie) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Photocopie CNI
                                  <a data-toggle="modal" data-id="{{$show_nouveau->id}}" data-name="{{$show_nouveau->photocopie}}" data-target="#modal-default-update-photocopie" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{Storage::url($show_nouveau->image)}}" class="mailbox-attachment-name">
                          <span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($show_nouveau->image)}}" alt="Attachment"></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Image Format CNI
                                  <a data-toggle="modal" data-id="{{$show_nouveau->id}}" data-name="{{$show_nouveau->image}}" data-target="#modal-default-update-image" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                      </ul>
                    </div>
                    <div class="box-footer">
                    @if($show_nouveau->codifier == 0)
                      <div class="pull-right">
                      <form action="{{ route('admin.nouveau.update',$show_nouveau->id) }}" method="post">
                        @csrf 
                        {{ method_field('PUT') }}
                      <label>
                          <input type="radio" value="1" name="status" class="flat-red"
                            @if($show_nouveau->status == 1)
                            checked
                            @endif
                          >
                          @if($show_nouveau->status == 1)
                          <span class="text-success"> Deja Valider</span>
                          @else 
                          <span class="text-warning"> Valider</span>
                          @endif
                        </label>
                        <label>
                          <input type="radio" value="2" name="status" class="flat-red"
                          @if($show_nouveau->status == 2)
                            checked
                            @endif
                          >
                          @if($show_nouveau->status == 2)
                          <span class="text-success">Deja Ommis</span>
                          @else 
                          <span class="text-warning">Ommetre</span>
                          @endif
                        </label>
                        <button type="submit"> Appliquer</button>
                      </form>
                      </div>
                      @endif
                  <div class="pull-left">
                  <a style="margin-right:5px;" href="{{ route('admin.nouveau.index') }}" class="btn btn-warning btn-xs"><i class="fa fa-share"></i> Retoure</a>
                      @if($show_nouveau->status == 1)
                      <a style="margin-right:5px;"  class="btn btn-success btn-xs" href="{{ route ('admin.nouveau.edit',$show_nouveau->id) }}">Codifier <i class="fa fa-edit"></i></a>
                      @endif
                  </div>
                      <!-- <a href="#"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                      <a href="#"  class="btn btn-default btn-xs"><i class="fa fa-print"></i> Print</a> -->
                    </div>
                  </div>
                  <!-- /.user-block -->

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->



              <div class="tab-pane" id="settings">
                <form class="form-horizontal" methode="post" action="{{ route('admin.update_nouveau',$show_nouveau->id) }}">
                  @csrf 
                  {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{ $show_nouveau->nom ?? old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="inputName" name="nom" placeholder="">
                      @error('nom')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prenom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{$show_nouveau->prenom ?? old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror" id="inputName" name="prenom" placeholder="">
                      @error('prenom')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" value="{{$show_nouveau->email ?? old('email')}}" class="form-control @error('email') is-invalid @enderror" id="inputName" name="email" placeholder="">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" name="phone" value="{{ $show_nouveau->phone ?? old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="">
                      @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Commune</label>

                    <div class="col-sm-10">
                      <select name="commune"   value="{{  old('commune')}}" class="form-control @error('commune') is-invalid @enderror" id="">
                         @foreach($departement as $dep)
														<p>{{ $dep->name }}</p>
														@foreach($dep->communes as $dep_com)
														<option value="{{ $dep_com->id }}">{{$dep_com->name}}</option>
														@endforeach
													@endforeach
                        @error('commune')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Modifier</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Debut du modal pour l'eddition de l'extrait -->
      
        <div class="modal fade" id="modal-default-update-extrait">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Extrait </h4>
              </div>
              <form action="{{ route('admin.nouveau.update',$show_nouveau->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('extrait')}}" class="form-control @error('extrait') is-invalid @enderror" id="extrait" name="extrait" placeholder="">
                  @error('extrait')
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
<!-- Fin du modal de l'eddition de l'extrait -->


<!-- Debut du modal pour l'eddition de l'attestation -->

<div class="modal fade" id="modal-default-update-attestation">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Attestation </h4>
              </div>
              <form action="{{ route('admin.nouveau.update',$show_nouveau->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('attestation')}}" class="form-control @error('attestation') is-invalid @enderror" id="attestation" name="attestation" placeholder="">
                  @error('attestation')
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
<!-- Fin du modal de l'eddition de l'attestation -->


<!-- Debut du modal pour l'eddition de la photocopie -->

<div class="modal fade" id="modal-default-update-photocopie">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Photocopie </h4>
              </div>
              <form action="{{ route('admin.nouveau.update',$show_nouveau->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('photocopie')}}" class="form-control @error('photocopie') is-invalid @enderror" id="photocopie" name="photocopie" placeholder="">
                  @error('photocopie')
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
<!-- Fin du modal de l'eddition de la photocopie -->


<!-- Debut du modal pour l'eddition de l'image -->

<div class="modal fade" id="modal-default-update-image">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Image </h4>
              </div>
              <form action="{{ route('admin.nouveau.update',$show_nouveau->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
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
<!-- Fin du modal de l'eddition de l'image -->

@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->