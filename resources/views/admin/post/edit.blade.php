@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                
        
        
        <!-- les inputs -->

             <!-- general form elements -->
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Titles</h3>
            </div>
            @include('includes.message')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              
              <div class="box-body">

              <div class="col-lg-6">

                  
                  <div class="form-group">
                      <label for="title">Post Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" class="form-control" value="{{ $post->subtitle }}"  id="subtitle" name="subtitle" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="slug">Post Slug</label>
                        <input type="text" class="form-control" value="{{$post->slug}}" id="slug" name="slug" placeholder="">
                    </div>

                   
                    
                </div>

                <div class="col-lg-6">
                  
                <div class="form-group">
                    <br>
                  <div class="pull-right">
                        <label for="image">File input</label>
                        <input type="file"  id="image" value="" name="image" >
                    </div>
                 
                    <div class="checkbox pull-left">
                        <label>
                          
                            <input type="checkbox" value="1"  name="status"  
                            @if ($post->status == 1) {{ 'checked' }} @endif > 
                            
                            Publish
                        </label>
                    </div>
                  </div>
                  <!-- debut des tag  -->
                  <br><br>
                  <div class="form-group"  >
                    
                <label>Select Tag</label>
                <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Select a State"
                  style="width: 100%;">
                  <!-- boucle d'affichage de tegs -->
                  @foreach($tags as $tag)
                  <option  

                  @foreach($post->tags as $postTag)

                    @if($postTag->id == $tag->id)
                        selected
                    @endif

                    @endforeach
                  
                   value="{{ $tag->id }}"> 
                  {{ $tag->name }} 
                  </option>
                  @endforeach
                  <!-- fin de la boucle d'affichage des tegs -->
                </select>
              </div>
                <!-- fin des tag -->

                        <!-- debut des categories  -->
                        
                <div class="form-group">
                <label>Select Tag</label>
                <select class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Select a State"
                  style="width: 100%;">
                  @foreach($categorys as $category)
                  <option 
                  
                  @foreach($post->categories as $postCat)

                    @if($postCat->id == $category->id)
                        selected
                    @endif

                    @endforeach
                  
                  value="{{ $category->id }}"> {{ $category->name }} </option>
                  @endforeach
                </select>
              </div>
                <!-- fin des categories -->
                </div>
              </div>


             

                <!-- le textarea -->

                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Writw Post Body here
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            
                <textarea id="editor1"name="body" placeholder="Place some text here"
                 style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>
          
            </div>
          </div>
       

                <!-- fin du textarea -->


              <!-- /.box-body -->

              <div class="box-footer form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a  href="{{ route('admin.post.index') }}" class="btn btn-warning">Back</a>
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