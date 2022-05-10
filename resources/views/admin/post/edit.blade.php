@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
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
        <div class="" style="margin:20px 100px">
          <!-- @include('includes.message') -->
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="box-body">

              <div class="col-lg-6">


                <div class="form-group">
                  <label for="title">Titre De L'article</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="">
                </div>

                <!-- <div class="form-group">
                        <label for="subtitle">Sous Titre De L'article</label>
                        <input type="text" class="form-control" value="{{ $post->subtitle }}"  id="subtitle" name="subtitle" placeholder="">
                    </div> -->

                <div class="form-group">
                  <label for="slug">Slug De L'article</label>
                  <input type="text" class="form-control" value="{{$post->slug}}" id="slug" name="slug" placeholder="">
                </div>

                <div class="pull-left">
                  <label for="image">Image De L'article</label>
                  <input type="file" id="image" value="" name="image">
                </div>

              </div>

              <div class="col-lg-6">

                <div class="form-group">
                  <br>


                  <div class="checkbox pull-left">
                    <label>

                      <input type="checkbox" value="1" name="status" @if ($post->status == 1) {{ 'checked' }} @endif >

                      Publier
                    </label>
                  </div>
                </div>


                <!-- debut des categories  -->
                <br><br>
                <div class="form-group">
                  <label>Selectioner La Categorie De L'article</label>
                  <select class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    @foreach($categorys as $category)
                    <option @foreach($post->categories as $postCat)

                      @if($postCat->id == $category->id)
                      selected
                      @endif

                      @endforeach

                      value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
                <!-- fin des categories -->
                <!-- debut des tag  -->

                <div class="form-group">

                  <label>Selectioner Le Tag De L'article</label>
                  <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <!-- boucle d'affichage de tegs -->
                    @foreach($tags as $tag)
                    <option @foreach($post->tags as $postTag)

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

              </div>
               <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Resume de votre article</label>
                        <textarea id="" class="" name="resume" placeholder=""
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->resume }}</textarea>
                    </div>
                  </div>
            </div>




            <!-- le textarea -->

            <div class="">
              <div class="box-header">
                <h3 class="box-title">Description de Votre Article
                </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">

                <textarea id="editor1" name="body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                  <a href="{{ route('admin.post.index') }}" class="btn btn-warning">Retoure</a>
                </div>
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


@section('footersection')
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>


<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<!-- <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script> -->

<script>
  $(function() {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>


<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@endsection