@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Vos Slider
      </h1>
      <ol class="breadcrumb">
      <li><a class="col-lg-offset-5 pull-right btn btn-warning" data-toggle="modal" data-id="add-slider" data-name="add-slider" data-target="#modal-default-slider-add">Ajouter un Slider</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <!-- Default box -->
            <div class="box-body">
              <div class="row">
                @foreach($slider as $slide_slide_1)
                  <div class="col-md-4">
                    <!-- Box Comment -->
                    <div class="box-body">
                      <img class="img-responsive pad" src="{{ Storage::url($slide_slide_1->image) }}" alt="Photo">

                      <p>Slider Simple</p>
                      <a class="btn btn-warning btn-xs" data-toggle="modal" data-id="{{$slide_slide_1->id}}" data-name="{{$slide_slide_1->id}}" data-target="#modal-default-slider_simple-update-{{$slide_slide_1->id}}"><i class="fa fa-edit"></i> Editer</a>
                   
                      <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default-slider_simple-{{$slide_slide_1->id}}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                    <!-- /.box-body -->
                  </div>

                  <div class="modal fade" id="modal-default-slider_simple-{{$slide_slide_1->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce slider simple
                          </p>
                        <form action="{{ route('admin.slider.destroy',$slide_slide_1->id) }}" method="post" style="display:none;">
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
                  @endforeach
              </div>

              <!-- les differentes slider  -->
              <div class="row">
              @foreach($slider_login as $slide_slide_login)
                  <div class="col-md-4">
                    <!-- Box Comment -->
                    <div class="box-body">
                      <img class="img-responsive pad" src="{{ Storage::url($slide_slide_login->image) }}" alt="Photo">

                      <p>Slider Login</p>
                      <a class="btn btn-warning btn-xs" data-toggle="modal" data-id="{{$slide_slide_login->id}}" data-name="{{$slide_slide_login->id}}" data-target="#modal-default-slider_login-update-{{$slide_slide_login->id}}"><i class="fa fa-edit"></i> Editer</a>
                    
                          <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default-slider_login-{{$slide_slide_login->id}}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                    <!-- /.box-body -->
                  </div>

                   <div class="modal fade" id="modal-default-slider_login-{{$slide_slide_login->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce slider de connexion
                          </p>
                        <form action="{{ route('admin.slider.destroy',$slide_slide_login->id) }}" method="post" style="display:none;">
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
                  @endforeach

                  @foreach($slider_ins as $slide_inscription)
                  <div class="col-md-4">
                    <!-- Box Comment -->
                    <div class="box-body">
                      <img class="img-responsive pad" src="{{ Storage::url($slide_inscription->image) }}" alt="Photo">

                      <p>Slider Inscription</p>
                      <a class="btn btn-warning btn-xs" data-toggle="modal" data-id="{{$slide_inscription->id}}" data-name="{{$slide_inscription->id}}" data-target="#modal-default-slider_inscription-update-{{$slide_inscription->id}}"><i class="fa fa-edit"></i> Editer</a>
           
                      <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default-slider_inscription-{{$slide_inscription->id}}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                    <!-- /.box-body -->
                  </div>

                  <div class="modal fade" id="modal-default-slider_inscription-{{$slide_inscription->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce slider de inscription
                          </p>
                        <form action="{{ route('admin.slider.destroy',$slide_inscription->id) }}" method="post" style="display:none;">
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
                  @endforeach


                  @foreach($slider_contact as $slide_contact_sld)
                  <div class="col-md-4">
                    <!-- Box Comment -->
                    <div class="box-body">
                      <img class="img-responsive pad" src="{{ Storage::url($slide_contact_sld->image) }}" alt="Photo">

                      <p>Slider Contact</p>
                      <a class="btn btn-warning btn-xs" data-toggle="modal" data-id="{{$slide_contact_sld->id}}" data-name="{{$slide_contact_sld->id}}" data-target="#modal-default-slider_contact-update-{{$slide_contact_sld->id}}"><i class="fa fa-edit"></i> Editer</a>
                  
                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default-slider_contact-{{$slide_contact_sld->id}}"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                    <!-- /.box-body -->
                  </div>

                   <div class="modal fade" id="modal-default-slider_contact-{{$slide_contact_sld->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce slider de contact
                          </p>
                        <form action="{{ route('admin.slider.destroy',$slide_contact_sld->id) }}" method="post" style="display:none;">
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
                  @endforeach
              </div>
              <!-- fin des differentes slider -->
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Ajout de tout les slider -->
  <div class="modal fade" id="modal-default-slider-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un slider</h4>
              </div>
              <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Role De Votre Slider</label>
                <select type="text"  value="{{ old('role')}}" class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="1">Slider Simple</option>
                        <option value="2">Slider Connexion</option>
                        <option value="3">Slider Inscription</option>
                        <option value="4">Slider Contact</option>
                </select>
                  @error('role')
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
      <!-- Fin de l'ajout de tout les slider -->


      

      <!-- Le modal de l'edittion des slider simple -->
      @foreach($slider as $slider_simple)
  <div class="modal fade" id="modal-default-slider_simple-update-{{ $slider_simple->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre slider simple</h4>
              </div>
              <form action="{{ route('admin.slider.update',$slider_simple->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
             {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Role De Votre Slider</label>
                <select type="text"  value="{{ old('role')}}" class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="1">Slider Simple</option>
                        <option value="2">Slider Connexion</option>
                        <option value="3">Slider Inscription</option>
                        <option value="4">Slider Contact</option>
                </select>
                  @error('role')
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
      @endforeach
  <!-- fin du modal d'edditio n des slider simple -->



  <!-- Le modal pour l'eddition des slider login -->
  @foreach($slider_login as $login)
  <div class="modal fade" id="modal-default-slider_login-update-{{ $login->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre slider login</h4>
              </div>
              <form action="{{ route('admin.slider.update',$login->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Role De Votre Slider</label>
                <select type="text"  value="{{ old('role')}}" class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="1">Slider Simple</option>
                        <option value="2">Slider Connexion</option>
                        <option value="3">Slider Inscription</option>
                        <option value="4">Slider Contact</option>
                </select>
                  @error('role')
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
      @endforeach
  <!-- Fin du modal d'eddition des slider login -->


<!-- Le modal d'eddition des slider contact -->
@foreach($slider_contact as $contact)
<div class="modal fade" id="modal-default-slider_contact-update-{{ $contact->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre slider de contact</h4>
              </div>
              <form action="{{ route('admin.slider.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Role De Votre Slider</label>
                <select type="text"  value="{{ old('role')}}" class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="1">Slider Simple</option>
                        <option value="2">Slider Connexion</option>
                        <option value="3">Slider Inscription</option>
                        <option value="4">Slider Contact</option>
                </select>
                  @error('role')
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
      @endforeach
<!-- Fin du modal d'eddition des slder contact -->



<!-- Le modal d'eddition des slider d'inscription  -->
@foreach($slider_ins as $inscription)
<div class="modal fade" id="modal-default-slider_inscription-update-{{ $inscription->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre slider d'inscription</h4>
              </div>
              <form action="{{ route('admin.slider.update',$inscription->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Role De Votre Slider</label>
                <select type="text"  value="{{ old('role')}}" class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="1">Slider Simple</option>
                        <option value="2">Slider Connexion</option>
                        <option value="3">Slider Inscription</option>
                        <option value="4">Slider Contact</option>
                </select>
                  @error('role')
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
      @endforeach
<!-- Fin du modal d'eedition des slider incription -->



@endsection