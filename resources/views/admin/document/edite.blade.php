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
                  <form  method="Post" action="{{ route('admin.document.update',$edit_doc->id) }}" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
                  <div class="col-lg-5">

                <div class="form-group">
                    <label for="libele">Nom du document</label>
                    <input type="text" name='libele'  value="{{ old('libele') ?? $edit_doc->libele  }}" class="form-control @error('libele') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('libele')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="date">Type</label>
                    <input type="text" name='type'  value="{{ old('type') ?? $edit_doc->type }}" class="form-control @error('type') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('type')
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

                  <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" name="status" 
                            @if($edit_doc->status == 1)
                            checked
                            @endif
                        > Publier
                      </label>
                    </div>

               </div>

                <div class="col-lg-7">
                  
                <div class="">
            <div class="box-header">
              <h3 class="box-title">Resume du document
                <small>Simple et bref</small>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
             
                    <textarea class="textarea" name="resume" placeholder="" value="{{ old('resume') ?? $edit_doc->resume }}" class="@error('resume') is-invalid @enderror"
                       style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                       $edit_doc->resume }}
                      </textarea>

                      @error('resume')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
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
                <a href="{{ route('admin.document.index') }}" class="btn btn-warning">Retoure</a>
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