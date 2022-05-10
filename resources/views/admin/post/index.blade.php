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
      <div class="" style="margin-left: 12px;">
          <a class="btn btn-success" href="{{ route('admin.post.create') }}">Ajouter Un Article</a>
      </div>

            {{-- Card horizontal --}}

              <div class="box-body">
                <div class="row">
                  @foreach($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 5px;">
                      <div class="card mb-3" style="width:100%;border:1px solid silver;border-radius:5px;padding:5px">
                        <div class="row g-0">
                          <div class="col-md-12">
                            <img style="width:100%;height:100%;" src="{{ Storage::url($post->image) }}" class="card-img-top" alt="...">
                            <h5 class="card-title text-bold">{{ $post->title }}</h5>
                          </div>
                          <div class="col-md-12">
                            <div class="card-body">
                              <p class="card-text"> <span class="text-bold">Resumer : </span> {!! $post->resume !!}</p>
                              
                              <p class="card-text text-center">
                                <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-facebook"></i> 12</button> 
                                <button type="button" class="btn btn-info btn-xs"><i class="fa  fa-twitter"></i> 23</button>
    
                                <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-instagram"></i> 12</button>
                                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-whatsapp"></i> 34</button>
                              </p>
                              <p class="card-text">
                                <div class="text-muted text-center">
                                    <a data-toggle="modal" data-id="{{$post->id}}" data-name="{{$post->title}}" data-target="#modal-default-chambre-{{ $post->id }}" style="margin-right:5px;"><i class="fa fa-eye btn btn-warning btn-xs card-link">  </i></a>
                                
                                    <a href="{{ route('admin.post.edit',$post->id) }}" style="margin-right:5px;"><i class="card-link fa fa-edit btn btn-primary btn-xs"> </i></a>
                                 
                                    <a data-toggle="modal" data-target="#modal-default-{{$post->id}}"><i class="fa fa-trash btn btn-danger card-link btn-xs"> </i></a>
                                    <div class="modal fade" id="modal-default-{{$post->id}}">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Suppression d'article</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>
                                              Etes vous sure de voloire supprimer cette article
                                            </p>
                                          <form action="{{ route('admin.post.destroy',$post->id) }}" method="post" style="display:none;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                          </div>
                                          </form>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                </div>
                              </p>
                            </div>
                          </div>
                        </div>
                          
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

            {{-- Fin de la card horizontal --}}

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



          @foreach($posts as $post)
            <div class="modal fade" id="modal-default-chambre-{{ $post->id }}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                
                    <div class="modal-body">
                      <p>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- Box Comment -->
                            <div class="box box-widget">
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-sm-7">
                                  <img class="img-responsive pad" style="width:100% auto;" src="{{ Storage::url($post->image) }}" alt="Photo">
                                  <h4 class="text-bold">{{ $post->title }}</h4>
                                </div>
                                  <div class="col-sm-5">
                                    <h4 class="text-bold"> Publiere le : {{ $post->created_at->toFormattedDateString() }}</h4>
                                  <p> <span class="text-bold text-primary">Catagories : </span> 
                                    @foreach ($post->categories as $category_post)
                                        {{ $category_post->name }},
                                    @endforeach
                                  </p>
                                  <p> <span class="text-bold text-primary">Etiquettes : </span> 
                                    @foreach ($post->tags as $tag_post)
                                        {{ $tag_post->name }},
                                    @endforeach
                                  </p>
                                  <p class="card-text">
                                    <h4 class="text-bold">Avis des utilisateurs</h4>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-comments"></i> comments</button> 
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-thumbs-o-up"></i> Like</button>

                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-thumbs-o-down"></i> Dislike</button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> vues</button>
                                  </p>
                                  <p class="card-text">
                                    <h4 class="text-bold">Partage des aux reseaux sociaux</h4>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-facebook"></i> 12</button> 
                                    <button type="button" class="btn btn-info btn-sm"><i class="fa  fa-twitter"></i> 23</button>
        
                                    <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-instagram"></i> 12</button>
                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i> 34</button>
                                  </p>
                                  </div>
                                </div>
                                
      
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer box-comments">
                                <div class="box-comment">
                                  <div class="comment-text text-justify">
                                        <span class="username">
                                          Description
                                        
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


