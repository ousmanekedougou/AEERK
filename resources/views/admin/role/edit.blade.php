@extends('admin.layouts.app')

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                
             <!-- general form elements -->
             <div class="">
            <div class="box-header with-border">
            </div>
            @include('includes.message')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.role.update',$roles->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('PATCH')}}
              <div class="box-body">

              <div class="col-lg-6  col-lg-offset-3">
                
                  <div class="form-group">
                      <label for="name">Nom Du Role</label>
                      <input type="text" class="form-control" value="{{ $roles->name }}" id="name"  name="name"  placeholder="">
                    </div>


                    <div class="row">

                    <div class="col-lg-4">
                      <label for="name">Permission Article</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Medecin')
                          <div class="checkbox">
                            <label for=""> <input type="checkbox" 
                            
                            @foreach($roles->permissions as $rp)
                              @if($rp->id == $permission->id)
                                checked
                              @endif
                            @endforeach

                            value="{{ $permission->id }}"
                            name="permission[]"  id="">{{ $permission->name }} </label>
                          </div>
                        @endif
                      @endforeach
                    </div>
                    <div class="col-lg-4">
                      <label for="name">Permission Evenement</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Article')
                          <div class="checkbox">
                            <label for=""> <input type="checkbox"
                            
                            @foreach($roles->permissions as $rp)
                              @if($rp->id == $permission->id)
                                checked
                              @endif
                            @endforeach

                            value="{{ $permission->id }}"  name="permission[]"  id="">{{ $permission->name }} </label>
                          </div>
                        @endif
                      @endforeach
                    </div>

                    <div class="col-lg-4">
                      <label for="name">Autres Permissions</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Autre')
                          <div class="checkbox">
                            <label for=""> <input type="checkbox"
                            
                            @foreach($roles->permissions as $rp)
                              @if($rp->id == $permission->id)
                                checked
                              @endif
                            @endforeach
                            
                            value="{{ $permission->id }}"  name="permission[]"  id="">{{ $permission->name }} </label>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>

                    <!-- /.box-body -->
      
                    <div class=" form-group">
                      <button type="submit" class="btn btn-primary">Modifier</button>
                      <a  href="{{ route('admin.role.index') }}" class="btn btn-warning">Retoure</a>
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