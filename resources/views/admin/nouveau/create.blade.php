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

    <p class="text-muted text-center">Nouveau</p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
        <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->email }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_nouveau->phone }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_nouveau->commune->name }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $show_nouveau->immeuble->name }}</a>
      </li>
      <li class="list-group-item">
      <b><i class="fa fa-thumbs-up"></i></b>  <a class="pull-center text-muted text-bold tex-italic">
      @if($show_nouveau->status == 1)
      <span class="text-success">Valider</span>
       @else 
       <span class="text-danger">Pas Valider</span>
       @endif
       </a>
      </li>
    </ul>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- About Me Box -->
<!-- <div class="box box-primary">
  <div class="box-body">
    <strong><i class="fa  fa-institution margin-r-5"></i> Etablissement</strong>

    <p class="text-muted">
       AFI L'UE (Universite de L'entreprise)
    </p>

    <hr>

    <strong><i class="fa  fa-education margin-r-5"></i> Filliere</strong>

    <p class="text-muted">
      Informatique et reseau 
    </p>

    <hr>

    <strong><i class="fa fa-graduation-cap margin-r-5"></i> Niveau</strong>

    <p class="text-muted">Master I</p>

    <hr>

    <strong><i class="fa fa-file-text-o margin-r-5"></i> Obtention du Bac</strong>

    <p class="text-muted">
      Le 29/03/2020
    </p>

    <hr>

    <strong><i class="fa fa-map-marker margin-r-5"></i> Commune</strong>

    <p>fongolimbi</p>
  </div>
</div> -->

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
                    <form action="{{ route('admin.codifier_nouveau',$show_nouveau->id) }}" method="post">
                      @csrf 
                      {{ method_field('PUT') }}
                      <h3 class="text-center">{{ $immeubles->name }}</h3>
                        <div class="form-group">
                          <label>Chambres</label>
                          <select value="{{ old('chambre_id') }}" class="form-control @error('chambre_id') is-invalid @enderror" name="chambre_id" style="width: 100%;">
                          <option selected>Choisir la chambre</option>
                            @foreach($immeubles->chambres  as $chm)
                              <option value="{{$chm->id}}">{{$chm->nom}}</option>
                            @endforeach
                          
                          </select>
                          @error('chambre_id')
                            <span class="invalid-feedback" role="alert">
                              <strong class="message_error text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Prix</label>
                          <input type="number" name="prix" value="{{ old('prix') }}" class="form-control @error('prix') is-invalid @enderror">
                          @error('prix')
                            <span class="invalid-feedback" role="alert">
                              <strong class="message_error text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <input type="submit" value="Codifier" class="btn btn-primary">
                        <a class="btn btn-warning" href="{{ route('admin.nouveau.index') }}">Retoure</a>
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