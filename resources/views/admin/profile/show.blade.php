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
                    <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($admins->image) }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $admins->name }}</h3>

                    <p class="text-muted text-center">{{ $admins->poste->name }}</p>

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
                           @foreach($admins->poste->commissions as $admin_com)
                            {{$admin_com->name}}
                           @endforeach
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Role</b> <a class="pull-right">
                            @foreach($admins->roles as $admin_role)
                                {{$admin_role->name}},
                            @endforeach
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
                        <form class="form-horizontal" action="{{ route('admin.profile.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
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
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                   <div>
                                   <div class="col-lg-6 pull-left"><input id="password" value="{{ old('password')  }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" placeholder="Password"></div>
                                 
                                   </div>
                                    <div class="col-lg-6"><input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation')  }}" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword" placeholder="Confirm Password"></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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

                            <!-- <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger">Modifier</button>
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
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
        <!-- /.content -->
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