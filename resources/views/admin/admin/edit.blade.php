@extends('admin.layouts.app')

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                
        
        
        <!-- les inputs -->

             <!-- general form elements -->
             <div class="">
            <div class="">
              <h3 class="box-title">Add Admin</h3>
            </div>
            @include('includes.message')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.admin.update',$admins->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('PATCH')}}
              <div class="box-body">

              <div class="col-lg-6  col-lg-offset-3">

                  
                  <div class="form-group">
                      <label for="name"> Prenom & Nom :  {{ $admins->name }}</label>
    
                    </div>
                    
                   
                    
                    <div class="form-group">
                        <label for="email">E-mail :  {{ $admins->email }}</label>
                    </div>


                    <div class="form-group">
                        <label for="phone">Telephone :  {{ $admins->phone }}</label>
                    </div>


                      <div class="form-group">
                        <label for="for">Status</label>
                            <div class=" checkbox">
                                <label> <input type="checkbox" name="status" @if($admins->status == 1 )
                                checked
                                @endif 
                                
                                style="ml-3" value="1" id="">Status</label>
                            </div>
                      </div>

                   

                    <div class="form-group col-lg-12">
                      <label>Assign Roles</label>
                     <div class="row">
                     @foreach($roles as $role)
                        <div class="checkbox">
                        <div class="col-lg-3">
                        <label for="role"> <input type="checkbox" 
                        
                        @foreach($admins->roles as $user_role)
                            @if($user_role->id == $role->id)
                            checked
                            @endif
                        @endforeach
                        
                         name="role[]" value="{{ $role->id }}" id=""> {{ $role->name }} </label>
                        </div>
                        </div>
                        @endforeach
                     </div>
                    </div>
                    
                    <!-- /.box-body -->
      
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