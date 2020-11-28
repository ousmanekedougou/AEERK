@extends('admin.layouts.app')


@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
    <div class="">
      <a class=" btn btn-success" href="{{ route('admin.post.create') }}">Ajouter Un Article</a>
    </div>
   
            <div class="box-body">
            <div class="row">
                @foreach($posts as $post)
                  <div class="col-lg-4">
                    <!-- Attachment -->
                      <div class="attachment-block clearfix">
                        <img class="attachment-img" style="width:100%;auto;" src="{{ Storage::url($post->image) }}" alt="Attachment Image">

                        <div class="attachment-pushed">
                          <h5 class="attachment-heading">{{ $post->title }}</h5>

                          <div class="attachment-text">
                            <p> <span>Sous Titre</span> <span>{{ $post->subtitle }}</span></p>
                            <p> <span></span> <span>{{ $post->created_at }}</span></p>
                          </div>
                          <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                      
                      <div class="text-center">
                        <a data-toggle="modal" data-id="{{$post->id}}" data-name="{{$post->title}}" data-target="#modal-default-chambre-{{ $post->id }}"><i class="fa fa-eye btn btn-warning btn-xs"> Voire</i></a>
                        <a href="{{ route('admin.post.edit',$post->id) }}"><i class="fa fa-edit btn btn-primary btn-xs"> Modifier</i></a>
                          <form  id="delete-form-{{$post->id}}" method="post" action="{{ route('admin.post.destroy',$post->id) }}"  style="display:none">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              </form>
                            <a  href="" onclick=" if(confirm('Etes Vous sure de supprimer cette article ?')){  event.preventDefault();document.getElementById('delete-form-{{$post->id}}').submit();

                              }else{event.preventDefault();} "><i class="fa fa-trash btn btn-danger btn-xs"> Supprimer</i></a>
                      </div>
                      </div>
                    <!-- /.attachment-block -->
                  </div>
                @endforeach
              </div>
             
            </div>
            <!-- /.box-body -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



          @foreach($posts as $post)
            
        <div class="modal fade" id="modal-default-chambre-{{ $post->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Les Details De L'article {{ $post->title }}</h4>
              </div>
             
                <div class="modal-body">
                  <p>
                    <div class="row">
                      <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                          <div class="box-body">
                            <img class="img-responsive pad" style="width:100%;auto;" src="{{ Storage::url($post->image) }}" alt="Photo">
                            <!-- 
                            <p>I took this photo this morning. What do you guys think?</p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button> -->
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>

                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-down"></i> Dislike</button>
                            <span class="pull-right text-muted">127 likes - 3 comments</span>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer box-comments">
                            <div class="box-comment">
                              <div class="comment-text">
                                    <span class="username">
                                      Description
                                      <span class="text-muted pull-right">  Publiere le : {{ $post->created_at->toFormattedDateString() }}</span>
                                    </span>
                                    <br>
                                    {!! $post->body !!}
                              </div>
                              <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                           
                        
                          </div>
                     
                        </div>
                        <!-- /.box -->
                      </div>
                    </div>
                  </p>
                </div>
            
            </div>
            
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
          @endforeach

@endsection


@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection