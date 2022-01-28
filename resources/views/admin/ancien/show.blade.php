@extends('admin.layouts.app')

@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
              <img class="profile-user-img img-responsive" src="{{ Storage::url($show_ancien->image) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $show_ancien->prenom.' '.$show_ancien->nom }}</h3>

              <p class="text-muted text-center">Ancien</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_ancien->email }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_ancien->phone }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_ancien->commune->name }} ({{$show_ancien->commune->departement->name}})</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $show_ancien->immeuble->name }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->


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
                            <a href="{{ Storage::url($show_ancien->bac) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Attestation Du Bac
                                  <a data-toggle="modal" data-id="{{$show_ancien->id}}" data-name="{{$show_ancien->bac}}" data-target="#modal-default-update-bac" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_ancien->certificat) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Certificat D'inscription
                                  <a data-toggle="modal" data-id="{{$show_ancien->id}}" data-name="{{$show_ancien->certificat}}" data-target="#modal-default-update-attestation" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_ancien->photocopie) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                  Photocopie CNI
                                  <a data-toggle="modal" data-id="{{$show_ancien->id}}" data-name="{{$show_ancien->photocopie}}" data-target="#modal-default-update-photocopie" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{Storage::url($show_ancien->image)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($show_ancien->image)}}" alt="Attachment" style="width: 100%;height:auto"></span>
                          </a>
                          <div class="mailbox-attachment-info" style="margin-top: 5px;">
                                <span class="mailbox-attachment-size">
                                   Image Format CNI
                                  <a data-toggle="modal" data-id="{{$show_ancien->id}}" data-name="{{$show_ancien->image}}" data-target="#modal-default-update-image" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                      </ul>
                    </div>
                    <div class="box-footer">
                    @if($show_ancien->codifier == 0 )
                      <div class="pull-right">
                        <form id="delete-form-{{$show_ancien->id}}" action="{{ route('admin.valider_ancien',$show_ancien->id) }}" method="post">
                          @csrf 
                          {{ method_field('PUT') }}
                          <input type="hidden" name="token" value="{{csrf_token()}}">
                          <label style="margin-right: 20px;">
                            <input type="radio" value="1" name="status" class="flat-red"
                              @if($show_ancien->status == 1)
                              checked
                              @endif
                            >
                            @if($show_ancien->status == 1)
                            <span class="text-success"> A ete Valider</span>
                            @else 
                            <span class="text-warning"> Valider</span>
                            @endif
                          </label>
                          <label>
                            <input type="radio" value="2" name="status" class="flat-red" style="margin-left:20px;" 
                            @if($show_ancien->status == 2)
                              checked
                              @endif
                            >
                            @if($show_ancien->status == 2)
                            <span class="text-success">A ete Ommis</span>
                            @else 
                            <span class="text-warning">Ommetre</span>
                            @endif
                          </label>
                          <button  onclick="
                          if(confirm('Etes Vous Sur de cette option ?')){

                          event.preventDefault();document.getElementById('delete-form-{{$show_ancien->id}}').submit();

                          }else{

                            event.preventDefault();

                          }"
                          type="submit" class="btn btn-success btn-xs" style=" margin-left:20px;"> Appliquer</button>
                        </form>
                      </div>
                      @endif
                    <div class="pull-left">
                    <a style="margin-right:5px;" href="{{ route('admin.ancien.index') }}" class="btn btn-warning btn-xs"><i class="fa fa-share"></i> Retoure</a>
                      @if($show_ancien->status == 1 && $show_ancien->codifier == 0)
                        <!-- <a style="margin-right:5px;" class="btn btn-success btn-xs" href="{{ route ('admin.ancien.edit',$show_ancien->id) }}">Codifier <i class="fa fa-edit"></i></a> -->
                        <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$show_ancien->id}}" data-name="{{$show_ancien->name}}" data-target="#modal-default-edit-show_ancien{{ $show_ancien->id }}">Codifier <i class="fa fa-edit"></i></a></a>
                      @elseif($show_ancien->status == 1 && $show_ancien->codifier == 0)
                        <span class="btn btn-success btn-xs">{{ $show_ancien->prenom }} {{$show_ancien->nom}} a ete codifier a {{ $show_ancien->chambre->name }}</span>
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
                <form class="form-horizontal" methode="post" action="{{ route('admin.update_ancien',$show_ancien->id) }}">
                  @csrf 
                  {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{ $show_ancien->nom ?? old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="inputName" name="nom" placeholder="">
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
                      <input type="text" value="{{$show_ancien->prenom ?? old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror" id="inputName" name="prenom" placeholder="">
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
                      <input type="email" value="{{$show_ancien->email ?? old('email')}}" class="form-control @error('email') is-invalid @enderror" id="inputName" name="email" placeholder="">
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
                      <input type="number" name="phone" value="{{ $show_ancien->phone ?? old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="">
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
                            <optgroup label="{{ $dep->name }}">
                              @foreach($dep->communes as $dep_com)
                              <option value="{{ $dep_com->id }}">{{$dep_com->name}}</option>
                              @endforeach
                            </optgroup>
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
                      <button type="submit" class="btn btn-success btn-block">Entegistre las modifications</button>
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
      
        <div class="modal fade" id="modal-default-update-bac">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Extrait </h4>
              </div>
              <form action="{{ route('admin.ancien.update',$show_ancien->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('bac')}}" class="form-control @error('bac') is-invalid @enderror" id="bac" name="bac" placeholder="">
                  @error('bac')
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


<!-- Debut du modal pour l'eddition de l'certificat -->

<div class="modal fade" id="modal-default-update-attestation">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Attestation </h4>
              </div>
              <form action="{{ route('admin.ancien.update',$show_ancien->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('certificat')}}" class="form-control @error('certificat') is-invalid @enderror" id="certificat" name="certificat" placeholder="">
                  @error('certificat')
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
              <form action="{{ route('admin.ancien.update',$show_ancien->id) }}" method="post" enctype="multipart/form-data">
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
              <form action="{{ route('admin.ancien.update',$show_ancien->id) }}" method="post" enctype="multipart/form-data">
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



<!-- Modal pour la codification des anciens -->

      <div class="modal fade" id="modal-default-edit-show_ancien{{ $show_ancien->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Codifier Cette Etudiant</h4>
              </div>
              <div class="row">
                      <div class="col-sm-4 p-5">
                      <img class="profile-user-img img-responsive" style="width:100%;margin-top:10px;margin-left:1px;" src="{{ Storage::url($show_ancien->image) }}" alt="User profile picture">
                      </div>
                      <div class="col-sm-8 text-justify">
                        <h3 class="profile-username">{{ $show_ancien->prenom.' '.$show_ancien->nom }}</h3>
                        <p><b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_ancien->email }}</a></p>
                        <p><b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_ancien->phone }}</a></p>
                        <p> <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_ancien->commune->name }}</a></p>
                        <p>  <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $show_ancien->immeuble->name }}</a></p>
                      </div>
              </div>
              @foreach($immeubles as $imb) 
              <form action="{{ route('admin.codifier_ancien',$show_ancien->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <h3 class="text-center">{{ $imb->name }}</h3>
                        <div class="form-group">
                          <label>Chambres</label>
                          <select value="{{ old('chambre_id') }}" class="form-control @error('chambre_id') is-invalid @enderror" name="chambre_id" style="width: 100%;">
                            <option selected>Choisir la chambre</option>
                            @foreach($imb->chambres  as $chm)
                              @if($show_ancien->genre == $chm->genre)
                                @if($chm->is_pleine == 0)
                                  <option value="{{$chm->id}}">{{$chm->nom}}</option>
                                @endif
                              @endif
                            @endforeach
                          
                          </select>
                          @error('chambre_id')
                            <span class="invalid-feedback" role="alert">
                              <strong class="message_error text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                </p>

              <button type="submit" class="btn btn-primary">Codifier</button>
              </div>
              </form>
              @endforeach
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer La Fenetre</button>
             
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   
<!-- Fin du modal pour la codification des anciens -->

@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->