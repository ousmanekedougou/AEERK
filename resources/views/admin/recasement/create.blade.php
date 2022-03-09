@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="col-md-3">

<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($show_nouveau->image) }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $show_nouveau->prenom.' '.$show_nouveau->nom }}</h3>

    <p class="text-muted text-center">Etudiant</p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
        <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->email }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->phone }}</a>
      </li>
      <li class="list-group-item">
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $show_nouveau->immeuble->name }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-thumbs-up"></i></b>  <a class="pull-center text-muted text-bold tex-italic">
      @if($show_nouveau->status == 0)
      <span class="text-success">Codifier</span>
       @else 
       <span class="text-danger">Pas Codifier</span>
       @endif
       </a>
      </li>
    </ul>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
        <!-- /.col debut du col 9-->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
          

            <!-- SELECT2 EXAMPLE -->
      <div class=" box-default">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Les Codifications</h3> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- debut du col 6 -->
            <div class="col-md-9">
              <!-- remplissage de l'immeuble 39 -->
                    <form action="{{ route('admin.recasement.update',$show_nouveau->id) }}" method="post">
                      @csrf 
                      {{ method_field('PUT') }}
                        <div class="form-group" style="padding: 30px;">
                            <div class="text-center">
                              @foreach($immeubles as $imb)  
                                <label  style="font-weight:bold; margin-right:20px;margin-left:20px;">
                                    <input type="radio"  value="{{ $imb->id }}" class="@error('immeuble') is-invalid @enderror" id="immeuble"  name="immeuble"> 
                                    {{ $imb->name }}
                                  
                                </label>
                              @endforeach
                              <br>
                              @error('immeuble')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="message_error text-danger">{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                          <input type="submit" value="Recaser" class="btn btn-primary" style="margin-right: 20px;">
                          <a class="btn btn-warning" href="{{ route('admin.recasement.index') }}" style="margin-left: 20px;">Retoure</a>
                        </div>
                    </form>
                <!-- fin du remplissage de l'immeuble 39 -->

            </div>
            <!-- /.col fin du col 6 -->
           
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin. -->
        </div>
      </div>
      <!-- /.fin du des select -->
        </div>
        <!-- /.col fin du col 9-->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection




<!-- on s'est arreter a la 7eme minine de la 6eme video -->