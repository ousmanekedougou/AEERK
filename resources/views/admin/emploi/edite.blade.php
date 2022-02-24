@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modification de l'offre d'emploi {{ $edit->titre }}
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
          <div class="box">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              
              <!-- debu du row -->
              <div class="row">
                  <form  method="Post" action="{{ route('admin.emploi.update',$edit->id) }}" enctype="multipart/form-data">
                  <input type="hidden" name='type'  value="1">
              @csrf
              {{ method_field('PUT') }}
                  <div class="col-lg-5">

                <div class="form-group">
                    <label for="title">Nom de l'offre de bourse</label>
                    <input type="text" name='title'  value="{{ old('title') ?? $edit->titre }}" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="lien">Le nom du lien</label>
                    <input type="text" name='lien_name'  value="{{ old('lien_name') ?? $edit->lien_name }}" class="form-control @error('lien_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('lien_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="lien">Le lien</label>
                    <input type="text" name='lien'  value="{{ old('lien') ?? $edit->lien }}" class="form-control @error('lien') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('lien')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="image">Image de l'agence</label>
                      <input type="file" name="image" value="{{ old('image') }} }}" class="@error('image') is-invalid @enderror" id="exampleInputFile">
                      @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                  <div class="box-header">
                    <h3 class="box-title">Text descriptive
                    </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="">
                    <textarea class="text-left" name="desc" placeholder="" value="{{ old('desc') ?? $edit->desc }}" class="@error('desc') is-invalid @enderror"
                      style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$edit->desc}}
                    </textarea>

                      @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
          
                  </div>
                </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="1" name="status" @if($edit->status == 1) checked @endif> Publier
                    </label>
                  </div>

               </div>

              <div class="col-lg-7">
                  
                <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Contenu complet de l'offre
                    </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <textarea class="textarea" name="content" placeholder="" value="{{ old('content') ?? $edit->content }}" class="@error('content') is-invalid @enderror"
                      style="width: 100%; height: 320px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{$edit->content}}
                    </textarea>

                      @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
          
                  </div>
                </div>
                  

              </div>

              </div>
              <!-- fin du row -->

              </div>
              <!-- /.box-body -->

        


              <div class="box-footer">
                <a href="{{ route('admin.emploi.index') }}" class="btn btn-warning">Retoure</a>
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

