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
            <form role="form" style="padding:30px;" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="title">Titre De L'article</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="subtitle">Sous Titre De L'article</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="">
                    </div>
                   
                    <div class="form-group">
                        <label for="slug">Slug De L'article</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                    </div>
                    
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <br>
                      <div class="pull-right">
                        <label for="image">Image De L'article</label>
                        <input type="file" id="image" value="" name=image>
                      </div>
                  
                      <div class="checkbox pull-left">
                        <label>
                          
                            <input type="checkbox" value="1" name="status"> Publier
                        </label>
                      </div>
                    </div>
                        <br><br>
                    <div class="form-group">
                      <label>Category De L'article</label>
                      <select class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        @foreach($categorys as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group"  >
                      <label>Etiquete De L'article</label>
                      <select class="form-control select2"  name="tags[]" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="box-header">
                  <h3>Description de votre article</h3>
              </div>
              <div class="box-body pad">
                  <textarea id="editor1" name="body" placeholder=""
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

                <div class=" form-group" style="margin-left:10px;">
                  <button type="submit" class="btn btn-primary">Enregistre</button>
                  <a  href="{{ route('admin.post.index') }}" class="btn btn-warning">Retoure</a>
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