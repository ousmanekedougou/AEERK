@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection


@section('main-content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="box-header with-border">
        <h3 class="text-center btn btn-primary btn-block text-bold">Tous les employeurs en partenariat avec l'AEERK</h3>
        <br>
          <a class="col-lg-offset-5 btn btn-primary pull-right" data-toggle="modal" data-id="" data-name="" data-target="#modal-default-add-admin" href="">Ajouter employeur</a>
      </div>
      <div class="row">
        @foreach($admins as $admin)
         <div class="col-lg-3">
              <div class="info-box bg-white">
                  <span class="info-box-icon">
                    <img src="{{ Storage::url($admin->image) }}" alt="" srcset="" style="width: 100%;height:90px;" >
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">{{$admin->name}}</span>
                    <span class="">
                        @if($admin->status == 1)
                          <span class="text-success">Compte Actif</span>
                        @else
                          <span class="text-danger">Compte Desactiver</span>
                        @endif
                    </span>

                    <div class="progress">
                      <div class="progress-bar bg-blue" style="width: 100%"></div>
                    </div>
                    <span class="progress-description text-center">
                      <a href="" data-toggle="modal" data-id="" data-name="" data-target="#modal-default-update-admin-{{$admin->id}}" class="small-box-footer" style="margin-right: 5px;">
                       <i class="fa fa-edit"></i>
                      </a>
                      <a href="" data-toggle="modal" data-target="#modal-default-{{$admin->id}}" class="small-box-footer text-danger" style="margin-left: 5px;">
                       <i class="fa fa-trash"></i>
                      </a>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>

            <div class="modal fade" id="modal-default-{{$admin->id}}">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Suppression de votre employeur</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                      Etes vous sure de voloire supprimer cet employeur
                    </p>
                  <form action="{{ route('admin.admin.destroy',$admin->id) }}" method="post" style="display:none;">
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Ajouter un administrateur -->
    <div class="modal fade" id="modal-default-add-admin">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajouter un employeur </h4>
          </div>
          <form action="{{route('admin.admin.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <p>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="col-form-label text-md-right" for="name">Prenom & Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                
                  <div class="form-group">
                      <label class="col-form-label text-md-right" for="email">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                      <label class="col-form-label text-md-right" for="phone">Telephone</label>
                      <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                    <label class="col-form-label text-md-right" for="password">Image</label>
                    <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" required autocomplete="new-image">
                      @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label class="col-form-label text-md-right" for="password">Mot de passe</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                      <label class="col-form-label text-md-right" for="password_confirmation">Confirmer le mot de passe</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                   <input type="hidden" name="role" value="6">
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
  <!-- Fin de l'ajout de l'admin -->


  <!-- Modifier un administrateur -->
  @foreach($admins as $admin)
    <div class="modal fade" id="modal-default-update-admin-{{$admin->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier le status de votre employeur </h4>
          </div>
          <form action="{{ route('admin.admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}
          <div class="modal-body">
            <p>
              <div class="row">
                <div class="form-group col-lg-12">
                  <div class="row text-center">
                      <div class="radio">
                        <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                            <label> <input type="radio" value="1" name="status" @if($admin->status == 1) checked @endif 
                            
                            style="ml-3"  id="">Activer</label>
                        </div>
                         <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                         <label> <input type="radio" value="0" name="status" @if($admin->status == 0)
                              checked
                            @endif 
                            
                            style="ml-3" id="">Desactiver</label>
                        </div>
                      </div>
                      <input type="hidden" name="role" value="6">
                  </div>
                </div>
              </div>
              {{--
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="for">Status</label>
                        <div class="radio">
                            <label> <input type="radio" value="1" name="status" @if($admin->status == 1) checked @endif 
                            
                            style="ml-3"  id="">Activer</label>
                        </div>

                        <div class="radio">
                            <label> <input type="radio" value="0" name="status" @if($admin->status == 0)
                              checked
                            @endif 
                            
                            style="ml-3" id="">Desactiver</label>
                        </div>
                  </div>
                </div>
              </div>
              --}}
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
  <!-- Fin de l'modifier de l'admin -->
  @endforeach

@endsection

@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection