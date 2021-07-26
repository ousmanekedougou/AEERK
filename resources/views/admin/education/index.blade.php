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
        @can('posts.create', Auth::guard('admin')->user())
          <a class="btn btn-success" href="{{ route('admin.education.create') }}">Ajouter Une documentation</a>
        @endcan
      </div>

            {{-- Card horizontal --}}

              <div class="box-body">
                <div class="row">
                  @foreach($educations as $educ)
                    <div class="col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 5px;">
                      <div class="card mb-3" style="width:100%;border:1px solid silver;border-radius:5px;padding:5px">
                        <div class="row g-0">
                          <div class="col-md-12">
                            <h5 class="card-title text-bold">{{ $educ->titre }}</h5>
                          </div>
                          <div class="col-md-12">
                            <h5 class="card-title text-bold">
                              @if($educ->type == 1)
                                Offres d'emploi
                              @elseif($educ->type == 2)
                                Offres de stage
                              @elseif($educ->type == 3)
                                Examan ou Concours
                              @elseif($educ->type == 4)
                                Bourse
                              @elseif($educ->type == 5)
                                Formation
                              @endif
                            </h5>
                          </div>
                          <div class="col-md-12">
                            <div class="card-body">
                              <p class="card-text"> {!! $educ->content !!}</p>
                              <!-- <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, facere.</p> -->
                        
                              <p class="card-text">
                                <div class="text-muted text-center">
                                  @can('posts.update', Auth::guard('admin')->user())
                                    <a data-toggle="modal" data-id="{{$educ->id}}" data-name="{{$educ->title}}" data-target="#modal-default-chambre-{{ $educ->id }}" style="margin-right:5px;"><i class="fa fa-eye btn btn-warning btn-xs card-link">  </i></a>
                                  @endcan
                                  @can('posts.update', Auth::guard('admin')->user())
                                    <a href="{{ route('admin.education.edit',$educ->id) }}" style="margin-right:5px;"><i class="card-link fa fa-edit btn btn-primary btn-xs"> </i></a>
                                  @endcan

                                  @can('posts.delete', Auth::guard('admin')->user())
                                  <form  id="delete-form-{{$educ->id}}" method="post" action="{{ route('admin.education.destroy',$educ->id) }}"  style="display:none">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      </form>
                                    <a  href="" onclick=" if(confirm('Etes Vous sure de supprimer cette article ?')){  event.preventDefault();document.getElementById('delete-form-{{$educ->id}}').submit();
          
                                      }else{event.preventDefault();} "><i class="fa fa-trash btn btn-danger card-link btn-xs"> </i></a>
                                   @endcan
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





      @foreach($educations as $educ)
        <div class="modal fade" id="modal-default-chambre-{{ $educ->id }}">
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
                              
                              <div class="col-sm-5">
                               <h4 class="text-bold">{{ $educ->titre }}</h4>
                                <h3>  Type : 
                                @if($educ->type == 1)
                                  Offres d'emploi
                                @elseif($educ->type == 2)
                                  Offres de stage
                                @elseif($educ->type == 3)
                                  Examan ou Concours
                                @elseif($educ->type == 4)
                                  Bourse
                                @endif
                                 </h3>
                                <h4 class="text-bold"> Publiere le : {{ $educ->created_at->toFormattedDateString() }}</h4>
                                <p class="text-bold">Le lien : <a href="{{ $educ->lien }}">{{ $educ->lien }}</a> </p>
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
                              <div class="col-sm-7">
                                <div class="box-footer box-comments">
                                  <div class="box-comment">
                                    <div class="comment-text text-justify">
                                          <span class="username">
                                            Description
                                          
                                          </span>
                                          <br>
                                          {!! $educ->content !!}
                                    </div>
                                    <a class="btn btn-primary btn-sm btn-block " href="{{ Storage::url($educ->file) }}"> <i class="fa fa-download"> Telecharger le fichier join</i></a>
                                    <!-- /.comment-text -->
                                  </div>
                                  <!-- /.box-comment -->
                                </div>
                              </div>
                            </div>
                            
  
                          </div>
                          <!-- /.box-body -->
                          
                     
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


