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
              <div class="box-body row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="title">Titre De L'article</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title" placeholder="">
                      	@error('title')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="slug">Slug De L'article</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" id="slug" name="slug" placeholder="">
                        @error('slug')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>

                    <div class="">
                        <label for="image">Image De L'article</label>
                        <input type="file" id="image" class="@error('image') is-invalid @enderror" value="{{ old('image') }}" name="image">
                         @error('image')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>
                    
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <br>
                    
                  
                      <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" class="@error('status') is-invalid @enderror" value="{{ old('status') ?? 1 }}" name="status"> Publier
                        </label>
                        @error('status')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                      </div>
                    </div>
                        <br><br>
                    <div class="form-group">
                      <label>Category De L'article</label>
                      <select class="form-control select2 @error('category') is-invalid @enderror" value="{{ old('category')}}" name="category[]" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        @foreach($categorys as $category)
                          <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                      </select>
                      @error('category')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>
                    <div class="form-group"  >
                      <label>Etiquete De L'article</label>
                      <select class="form-control select2 @error('tags') is-invalid @enderror" value="{{ old('tags')}}"  name="tags[]" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                        @endforeach
                      </select>
                        @error('tags')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Resume de votre article</label>
                        <textarea id="" class="@error('resume') is-invalid @enderror" value="{{ old('resume')}}" name="resume" placeholder=""
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        @error('resume')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                    </div>
                  </div>
              </div>
              <div class="box-header">
                  <h3>Description de votre article</h3>
              </div>
              <div class="box-body pad">
                  <textarea id="editor1" class="textarea @error('body') is-invalid @enderror" value="{{ old('body')}}" name="body" placeholder=""
                  style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    @error('body')
													<span class="invalid-feedback" role="alert">
														<strong class="message_error text-danger">{{ $message }}</strong>
													</span>
												@enderror
                  <div class=" form-group">
                    <button type="submit" class="btn btn-primary">Enregistre</button>
                    <a  href="{{ route('admin.post.index') }}" class="btn btn-warning">Retoure</a>
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