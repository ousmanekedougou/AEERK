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


                    <label for="name">Permission de {{ $roles->name }}</label>
                    <div class="row">
                      <div class="checkbox">
                        <div class="col-lg-3">
                          <label for="name">Permission Codification</label>
                          @foreach($permissions as $permission)
                            @if($permission->for == 'Codifier')
                              <div class="checkbox">
                                <label for="name"> <input type="checkbox"
                                
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
                     <div class="col-lg-3">
                      <label for="name">Permission Articles</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Article')
                          <div class="checkbox">
                            <label for="name"> <input type="checkbox"
                            
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

                    <div class="col-lg-3">
                      <label for="name">Permissions Logements</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Logement')
                          <div class="checkbox">
                            <label for="name"> <input type="checkbox"
                            
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

                    <div class="col-lg-3">
                      <label for="name">Permissions Administrateurs</label>
                      @foreach($permissions as $permission)
                        @if($permission->for == 'Admin')
                          <div class="checkbox">
                            <label for="name"> <input type="checkbox"
                            
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