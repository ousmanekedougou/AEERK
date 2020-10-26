@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
                
        
        
        <!-- les inputs -->

             <!-- general form elements -->
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
              <!-- {{ csrf_field() }} -->
              @csrf
              <div class="box-body">

              <div class="col-lg-6">

                  
                  <div class="form-group">
                      <label for="title">Post Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="slug">Post Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                    </div>
                    
                </div>

                <div class="col-lg-6">
                  
                <div class="form-group">
                    <br>
                  <div class="pull-right">
                        <label for="image">File input</label>
                        <input type="file" id="image" value="" name=image>
                    </div>
                 
                    <div class="checkbox pull-left">
                        <label>
                          
                            <input type="checkbox" value="1" name="status"> Publish
                        </label>
                    </div>
                  </div>
                  <!-- debut des tag  -->
                  <br><br>
                  <div class="form-group"  >
                    
                <label>Select Tag</label>
                <select class="form-control select2"  name="tags[]" multiple="multiple" data-placeholder="Select a State"
                  style="width: 100%;">
                  @foreach($tags as $tag)
                  <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                  @endforeach
                </select>
              </div>
                <!-- fin des tag -->

                        <!-- debut des categories  -->
                        
                <div class="form-group">
                <label>Select Tag</label>
                <select class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Select a State"
                  style="width: 100%;">
                  @foreach($categorys as $category)
                  <option value="{{ $category->id }}"> {{ $category->name }} </option>
                  @endforeach
                </select>
              </div>
                <!-- fin des categories -->
              </div>
              </div>

                <!-- le textarea -->

              
            <div class="box-header">
                <small>Descriptin de votre article</small>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea id="editor1" name="body" placeholder="Place some text here"
                 style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          
            </div>
       

                <!-- fin du textarea -->


              <!-- /.box-body -->

              <div class="box-footer form-group">
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