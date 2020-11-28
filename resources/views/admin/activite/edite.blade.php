@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de board
        <small>Votre lieu de travail</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Information des vos documents</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              
              <!-- debu du row -->
              <div class="row">
                  <form  method="Post" action="{{ route('admin.activite.update',$edit_activite->id) }}" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
                  <div class="col-lg-6">

                <div class="form-group">
                    <label for="libele">Nom de l'evenement</label>
                    <input type="text" name='libele'  value="{{ old('libele') ?? $edit_activite->libele  }}" class="form-control @error('libele') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('libele')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="date">Date de debut de l'evenement</label>
                    <input type="date" name='date'  value="{{ old('date') ?? $edit_activite->date }}" class="form-control @error('date') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="date">Date de fin de l'evenement</label>
                    <input type="date" name='fin'  value="{{ old('fin') ?? $edit_activite->date_fin }}" class="form-control @error('fin') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('fin')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                 

                  <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" name="status" 
                            @if($edit_activite->status == 1)
                            checked
                            @endif
                        > Publier
                      </label>
                    </div>

               </div>

              <div class="col-lg-6">  
              <div class="form-group">
                    <label for="date">Ville</label>
                    <input type="ville" name='ville' value="{{ old('ville') ?? $edit_activite->ville }}" class="form-control @error('ville') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('ville')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="date">Adresse</label>
                    <input type="adresse" name='adresse'  value="{{ old('adresse') ?? $edit_activite->adresse }}" class="form-control @error('adresse') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="image">Votre Image</label>
                      <input type="file" name="image" value="{{ old('image')  }}" class="@error('image') is-invalid @enderror" id="exampleInputFile">
                      @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
              </div>

              </div>
              <!-- fin du row -->
              <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Description De l'evenement
                      <small>Simple et bref</small>
                    </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
              
                      <textarea class="textarea" name="resume" placeholder="" value="{{ old('resume') ?? $edit_activite->resume }}" class="@error('resume') is-invalid @enderror"
                        style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {{ $edit_activite->description }}
                        </textarea>

                        @error('resume')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
            
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

        


              <div class="box-footer">
                <a href="{{ route('admin.activite.index') }}" class="btn btn-warning">Retoure</a>
                <button type="submit" class="btn btn-success">Enregistrer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->



          


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->