@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
                
          <div class="" style="margin:20px 100px">
            <form role="form" style="padding:30px;" action="{{route('admin.education.update',$edit_doc->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
              <div class="box-body">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="title">Titre de la documentation</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $edit_doc->titre }}" id="title" name="title" placeholder="">
                    @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Ttype de la documentation</label>
                    <select value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror" name="type" style="width: 100%;">
                        <option value="1">Emplois</option>
                        <option value="2">Stages</option>
                        <option value="3">Examan && Concours</option>
                        <option value="4">Bourse</option>
                        <option value="5">Formation</option>
                    </select>
                    @error('type')
                      <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                 
                   <div class="form-group">
                    <label for="lien">lien de la documentation</label>
                    <input type="text" class="form-control @error('lien') is-invalid @enderror" value="{{ old('lien') ?? $edit_doc->lien }}" id="lien" name="lien" placeholder="">
                    @error('lien')
                      <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="file">fichier de la documentation</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') ?? $edit_doc->file }}" id="file" name="file" placeholder="">
                    @error('file')
                      <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  
                </div>
                <div class="col-lg-2"></div>
                
              </div>

              <div class="box-header">
                  <h3>Contenu de la documentation</h3>
              </div>
              <div class="box-body pad">
                  <textarea id="editor1" class="textarea @error('body') is-invalid @enderror" name="body" placeholder="" value="{{ old('body') }}"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {!! $edit_doc->content !!}
                  </textarea>
                  @error('body')
                    <span class="invalid-feedback" role="alert">
                      <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                  @enderror
                  <div class=" form-group">
                    <button type="submit" class="btn btn-primary">Enregistre</button>
                    <a  href="{{ route('admin.education.index') }}" class="btn btn-warning">Retoure</a>
                  </div>
              </div>

               
            </form>
          </div>
          <!-- /.box -->


        <!-- fin des inputs -->


    </section>
    <!-- /.content -->
  </div>

@endsection

@section('footersection')
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<!-- <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script> -->

<script>
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>


<script>
$(document).ready(function(){
  $('.select2').select2();
});

</script>
@endsection