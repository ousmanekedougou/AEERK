@extends('admin.layouts.app')


@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('main-content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Votre profile
            </h1>
        </section>
            <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                 <a  data-toggle="modal" data-id="#commission" data-name="commission" data-target="#modal-default-add-commission"  href="">
                    <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($admins->image) }}" alt="User profile picture">
                    <i class="fa fa-camera" style="transform: translate(400%,-200%);"></i>
                 </a>

                    <h3 class="profile-username text-center">{{ $admins->name }}</h3>

                    <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>E-mail</b> <a class="pull-right">{{$admins->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Telephone</b> <a class="pull-right">{{$admins->phone}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Commission</b> 
                        <a class="pull-right">
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Role</b> <a class="pull-right">
                            @if($admins->is_admin == 1)
                            Administrateur
                           @elseif($admins->is_admin == 2)
                            Codification
                           @elseif($admins->is_admin == 3)
                            Pedagogie
                           @elseif($admins->is_admin == 4)
                            Communication
                           @endif
                        </a>
                    </li>
                    <!-- <li class="list-group-item">
                        <b>Permissions</b> <a class="pull-right">Publier,supprimer</a>
                    </li> -->
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
                    <!-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                        <form class="form-horizontal" action="{{ route('admin.profile.update',Auth::guard('admin')->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf 
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Prenom et Nom</label>

                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" value="{{ old('name') ?? $admins->name }}"  class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail"  class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                <input type="email" id="email" name="email" value="{{ old('email') ?? $admins->email }}"  class="form-control @error('email') is-invalid @enderror" id="inputName" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-9">
                                <input type="number" id="phone" name="phone" value="{{ old('phone') ?? $admins->phone }}"  class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary btn-block">Enregistre les modifications</button>
                            </div>
                            </div>
                        </form>
                        </div>
                        <!-- /.post -->
                    </div>
                
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->


              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                        <form class="form-horizontal" action="{{ route('admin.update_password',Auth::guard('admin')->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf 
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                   <div class="row">
                                     <div class="col-lg-12"><input id="password" value="{{ old('password')  }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" placeholder="Votre mot de passe"></div>
                              
                                        <div class="col-lg-12" style="margin-top: 10px;"><input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation')  }}" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword" placeholder="Confirmer la mot de passe"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    <div class="col-lg-12"  style="margin-top: 10px; width: 100%;">
                                        <button type="submit" style="width: 100%;" class="btn btn-primary btn-block">Enregistre les modifications</button>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <!-- /.post -->
                    </div>
                
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
        <!-- /.content -->
</div>

        <div class="modal fade" id="modal-default-add-commission">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modifier votre image de profile</h4>
              </div>
              <form action="{{ route('admin.update_image',Auth::guard('admin')->user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                {{ method_field('PUT') }}
              <div class="modal-body">
                <div class="form-group">
                    <label for="inputImage" class="col-sm-3 control-label">Image</label>

                    <div class="col-sm-9">
                    <input type="file" name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
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

@endsection


@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection