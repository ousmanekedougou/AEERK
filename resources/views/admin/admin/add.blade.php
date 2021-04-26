@extends('admin.layouts.app')

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                
        
        
        <!-- les inputs -->

             <!-- general form elements -->
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.admin.store')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">

              <div class="col-lg-12">

                  <div class="row">
                    
                      <div class="col-lg-5">
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
  <!--  -->
                    <div class="col-lg-7">
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
                            <div class=" checkbox">
                                <label class="col-form-label text-md-right"> <input type="checkbox" name="status" @if (old('status') == 1) 
                                checked
                                @endif 
                                
                                 value="1" id=""><span class="text-bold">Status</span></label>
                            </div>
                      </div>

                   

                      <div class="form-group col-lg-12">
                        <label class="col-form-label text-md-right">Assigne un Role</label>
                        <div class="row">
                          @foreach($roles as $role)
                            <div class="checkbox">
                            <div class="col-lg-3">
                            <label class="col-form-label text-md-right" for="role"> <input type="checkbox" name="role[]" value="{{ $role->id }}" id=""> {{ $role->name }} </label>
                            </div>
                            </div>
                          @endforeach
                        </div>

                          <div class="row">
                            <br>
                            <h4>Choisire le poste selon la commission</h4>
                              @foreach($commission as $com)
                            <div class="col-lg-3">
                                  <label for=""  class="text-primary">{{$com->name}}</label>
                                  <br>  
                                @foreach($com->postes as $com_poste)
                                  <label class="" for="poste"> <input type="radio" name="poste" value="{{$com_poste->id }}" id=""> {{ $com_poste->name }} </label>
                                @endforeach
                            </div>
                              @endforeach
                          </div>
                      </div>


                    </div>

                  </div>
                  <div class=" form-group">
                    <button type="submit" class="btn btn-primary">Enregistre</button>
                    <a  href="{{ route('admin.admin.index') }}" class="btn btn-warning">Retoure</a>
                  </div>

                </div>

              


            </form>
          </div>
          <!-- /.box -->


        <!-- fin des inputs -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection