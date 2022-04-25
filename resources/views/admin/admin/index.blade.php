@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border">
          <h3 class="box-title">Administrateurs du bureau</h3>
            <a class="col-lg-offset-5 btn btn-success pull-right" data-toggle="modal" data-id="" data-name="" data-target="#modal-default-add-admin" href="">Ajouter Un Admin</a>
         
        </div>
        <div class="box-body">
            <!-- debut de la table -->
          <div class="">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Image</th>
                  <th>Prenom & Nom</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($admins as $admin)
                  <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td><img style="width:60px;height:auto;" class="img-circle" src="{{ Storage::url($admin->image) }}" alt="" srcset=""></td>
                  <td>{{ $admin->name }}</td>
                  <td>
                    @if($admin->is_admin == 1)
                      Adminstrateur
                    @elseif($admin->is_admin == 2)
                      Codificateur
                    @elseif($admin->is_admin == 3)
                      Pedagogie
                    @elseif($admin->is_admin == 4)
                      Article
                    @endif
                  </td>
                  <td>{{ $admin->status? 'Active' : 'Desactive' }}</td>
                  <td>
                    @if($admin->is_admin != 1 && $admin->is_admin < 5)
                    <a href="" data-toggle="modal" data-id="" data-name="" data-target="#modal-default-update-admin-{{$admin->id}}"><i class="glyphicon glyphicon-edit"></i></a>
                    @elseif($admin->is_admin == 1)
                      Super Admin
                    @endif
                  </td>
                 
                  <td>
                    <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('admin.admin.destroy',$admin->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                    @if($admin->is_admin != 1)
                      <a  data-toggle="modal" data-target="#modal-default-{{$admin->id}}"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    @elseif($admin->is_admin == 1)
                      Super Admin
                    @endif
                    </td>


                    <div class="modal fade" id="modal-default-{{$admin->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Suppression de slider</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              Etes vous sure de voloire supprimer cet administrateur
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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
            <h4 class="modal-title">Ajouter un adminstrateur </h4>
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

                </div>

                <div class="form-group col-lg-12">
                  <label class="col-form-label text-md-right">Assigne un Role</label>
                  <div class="row">
                      <div class="radio">
                        <div class="col-lg-3">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="1" id=""> Super Admin 
                          </label>
                        </div>
                         <div class="col-lg-3">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="2" id=""> Codifier 
                          </label>
                        </div>
                         <div class="col-lg-3">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="3" id=""> Pedagogie 
                          </label>
                        </div>
                         <div class="col-lg-3">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="4" id=""> Article 
                          </label>
                        </div>
                      </div>
                  </div>
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
            <h4 class="modal-title">Modifier un adminstrateur </h4>
          </div>
          <form action="{{ route('admin.admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}
          <div class="modal-body">
            <p>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label class="col-form-label text-md-right">Assigne un Role</label>
                  <div class="row">
                      <div class="radio">
                        <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="1" id=""  @if($admin->is_admin == 1) checked @endif >Super Admin 
                          </label>
                        </div>
                         <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="2" id=""  @if($admin->is_admin == 2) checked @endif > Codifier 
                          </label>
                        </div>
                         <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="3" id=""  @if($admin->is_admin == 3) checked @endif > Pedagogie 
                          </label>
                        </div>
                         <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                          <label class="col-form-label text-md-right" for="role"> 
                            <input type="radio" name="role" value="4" id=""  @if($admin->is_admin == 4) checked @endif > Article 
                          </label>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
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