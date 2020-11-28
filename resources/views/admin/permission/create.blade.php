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
            <div class="box-header with-border">
              <h3 class="box-title">Permissions</h3>
            </div>
            @include('includes.message')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.permission.store')}}" method="post">
            {{csrf_field()}}
              <div class="box-body">

              <div class="col-lg-6  col-lg-offset-3">
                
                  <div class="form-group">
                      <label for="name">Nom De La Permission</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="for">Permission Pour</label>
                      <select name="for" id="for" class="form-control" >
                          <option selected disable > Selection Permission Pour </option>
                          <option value="user">User</option>
                          <option value="post">Post</option>
                          <option value="other">Other</option>
                      </select>
                    </div>

                    <!-- /.box-body -->
      
                    <div class=" form-group">
                      <button type="submit" class="btn btn-primary">Enregistre</button>
                      <a  href="{{ route('admin.permission.index') }}" class="btn btn-warning">Retoure</a>
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