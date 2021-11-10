@extends('admin.layouts.app')

@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
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
             <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->image}}" data-target="#modal-default-update-image" class="">
              <img class="profile-user-img img-responsive" src="{{ Storage::url($show_etudiant->image) }}" alt="User profile picture">
             </a>

              <h3 class="profile-username text-center">{{ $show_etudiant->name }}</h3>

              <p class="text-muted text-center">Etudiant</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_etudiant->email }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_etudiant->phone }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-mortar-board"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_etudiant->niveau }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


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
                      <table class="table text-center responsive-table table-bordered ">
                        <thead>
                         <tr>
                           <th>Date de naissance</th>
                          <th>Lieu de naissance</th>
                          <th>Commune</th>
                          <th>Etablissement</th>
                          <th>Fillieres</th>
                         </tr>
                        </thead>
                        <tbody>
                         <tr>
                          <td>{{ $show_etudiant->naissance }}</td>
                          <td>{{ $show_etudiant->lieu }}</td>
                          <td>{{ $show_etudiant->commune->name }} ({{ $show_etudiant->commune->departement->name }}) </td>
                          <td>{{ $show_etudiant->etablissement }}
                          @if($show_etudiant->status == 0)
                             (Publique)
                          @else
                              (Privee)
                          @endif
                          </td>
                          <td>{{ $show_etudiant->filliere }} </td>
                          {{-- 
                            <td>
                            @foreach($show_etudiant->etablissements as $etud_etab)
                              {{$etud_etab->name}},
                            @endforeach
                            </td>
                            <td>
                              @foreach($show_etudiant->faculties as $etud_fille)
                                {{$etud_fille->name}},
                              @endforeach
                            </td> 
                          --}}
                         </tr>
                        </tbody>
                      </table>
                          <!-- /.box-body -->
                    <div class="box-footer">
                      <ul class="mailbox-attachments clearfix">

                        <li>
                            <a href="{{ Storage::url($show_etudiant->diplome) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Attestation ou diplome
                                  <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->diplome}}" data-target="#modal-default-update-diplome" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_etudiant->curiculum) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Curiculum Vitae
                                  <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->curiculum}}" data-target="#modal-default-update-curiculum" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_etudiant->identite) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Photocopie CNI
                                  <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->identite}}" data-target="#modal-default-update-photocopie" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li>

                        <!-- <li>
                            <a href="{{Storage::url($show_etudiant->image)}}" class="mailbox-attachment-name">
                          <span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($show_etudiant->image)}}" alt="Attachment"></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                   Image  CNI
                                  <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->image}}" data-target="#modal-default-update-image" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li> -->

                      </ul>
                    </div>
                    <div class="box-footer">
                    <div class="pull-left">
                    <a style="margin-right:5px;" href="{{ route('admin.realisation.index') }}" class="btn btn-warning btn-xs"><i class="fa fa-share"></i> Retoure</a>
                    
                    </div>
                    </div>
                  </div>
                  <!-- /.user-block -->

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->



               <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="post" action="{{ route('admin.realisation.update',$show_etudiant->id) }}">
                  @csrf 
                  {{ method_field('PUT') }}
                  <input type="hidden" name="option" value="1">
                  <div class=" row form-groupe d-flex">
                    <label for="genre2" class="col-sm-2 control-label">Femme <input type="radio" name="genre" class="@error('name') is-invalid @enderror" id="genre2" value="{{ old('genre') ?? 2 }}" @if($show_etudiant->genre == 1) checked @endif> </label>
                    <label for="genre1" class="col-sm-2 control-label"> <input type="radio" name="genre" class="@error('name') is-invalid @enderror" id="genre1" value="{{ old('genre') ?? 1 }}" @if($show_etudiant->genre == 2) checked @endif> Homme </label>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prenom et nom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{ $show_etudiant->name ?? old('name')}}" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" value="{{$show_etudiant->email ?? old('email')}}" class="form-control @error('email') is-invalid @enderror" id="inputName" name="email" placeholder="">
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
                      <input type="number" name="phone" value="{{ $show_etudiant->phone ?? old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="">
                      @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Date de naissance</label>

                    <div class="col-sm-10">
                      <input type="date" name="naissance" value="{{ $show_etudiant->naissance ?? old('naissance')}}" class="form-control @error('naissance') is-invalid @enderror" id="inputName" placeholder="">
                      @error('naissance')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Lieu de naissance</label>

                    <div class="col-sm-10">
                      <input type="text" name="lieu" value="{{ $show_etudiant->lieu ?? old('lieu')}}" class="form-control @error('lieu') is-invalid @enderror" id="inputName" placeholder="">
                      @error('lieu')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Etablissement</label>

                    <div class="col-sm-10">
                      <input type="text" name="etablissement" value="{{ $show_etudiant->etablissement ?? old('etablissement')}}" class="form-control @error('etablissement') is-invalid @enderror" id="inputName" placeholder="">
                      @error('etablissement')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                   <div class="row form-groupe ">
                    <label for="status1" class="col-sm-2 control-label">Publique <input type="radio" name="status" class="@error('name') is-invalid @enderror" id="status1" value="{{ old('status') ?? 0 }}" @if($show_etudiant->status == 0) checked @endif> </label>
                    <label for="status2" class="col-sm-2 control-label"> <input type="radio" name="status" class="@error('name') is-invalid @enderror" id="status2" value="{{ old('status') ?? 1 }}" @if($show_etudiant->status == 1) checked @endif> Privee </label>
                  </div>
                  <br>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Filliere</label>

                    <div class="col-sm-10">
                      <input type="text" name="filliere" value="{{ $show_etudiant->filliere ?? old('filliere')}}" class="form-control @error('filliere') is-invalid @enderror" id="inputName" placeholder="">
                      @error('filliere')
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
                        @foreach($departements as $dep)
                          <optgroup label="{{ $dep->name }}">
                            @foreach($dep->communes as $dep_com)
                                <option value="{{ $dep_com->id }}">{{ $dep_com->name }}</option>
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
                    <label for="inputName" class="col-sm-2 control-label">Niveau d'etude</label>

                    <div class="col-sm-10">
                      <select value="{{ old('niveau') }}" class="form-control @error('niveau') is-invalid @enderror" name="niveau">
                        <option value="licence 1">licence 1</option>
                        <option value="licence 2">licence 2</option>
                        <option value="licence 3">licence 3</option>
                        <option value="master 1">master 1</option>
                        <option value="master 2">master 2</option>
                        <option value="autres">autres</option>
                          @error('niveau')
                            <span class="invalid-feedback" role="alert">
                                <strong class="message_error">{{ $message }}</strong>
                            </span>
                          @enderror
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-block">Enregistre les modification</button>
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
      
        <div class="modal fade" id="modal-default-update-diplome">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer le diplome </h4>
              </div>
              <form action="{{ route('admin.realisation.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <input type="hidden" name="option" value="2">
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('diplome')}}" class="form-control @error('diplome') is-invalid @enderror" id="diplome" name="diplome" placeholder="">
                  @error('diplome')
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

        <div class="modal fade" id="modal-default-update-curiculum">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer le Curiculum Vitae </h4>
              </div>
              <form action="{{ route('admin.realisation.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <input type="hidden" name="option" value="3">
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('curiculum')}}" class="form-control @error('curiculum') is-invalid @enderror" id="curiculum" name="curiculum" placeholder="">
                  @error('curiculum')
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
                <h4 class="modal-title">Editer la Photocopie CNI</h4>
              </div>
              <form action="{{ route('admin.realisation.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <input type="hidden" name="option" value="4">
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
              <form action="{{ route('admin.realisation.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <input type="hidden" name="option" value="5">
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

@section('footersection')
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection

<!-- on s'est arreter a la 7eme minine de la 6eme video -->