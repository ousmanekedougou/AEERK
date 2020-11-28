@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <br>
          <a  href="{{ route('admin.realisation.create') }}" class="col-lg-offset-5 btn btn-success" href="">Ajouter Une realisation</a>
             <!-- Main content -->
            <section class="content">
              <ul class="mailbox-attachments clearfix">
                @foreach($realisation_all as $realisation)
                <li>
                <a href="{{Storage::url($realisation->image)}}" class="mailbox-attachment-name"><span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($realisation->image)}}" alt="Attachment"></span></a>

                  <div class="mailbox-attachment-info">
                    <a href="{{Storage::url($realisation->image)}}" class="mailbox-attachment-name"><i class="fa fa-camera"></i> {{ $realisation->libele }}</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB

                    <form id="delete-form-{{$realisation->id}}" method="post" action="{{ route('admin.realisation.destroy',$realisation->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                    <a style="margin-left:7px;"  onclick=" if(confirm('Etes Vous Sure De Supprimer Cette realisation ?')){ event.preventDefault();document.getElementById('delete-form-{{$realisation->id}}').submit();

                    }else{ event.preventDefault(); } " class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a>

                          <a style="margin-left:7px;" href="{{ route('admin.realisation.edit',$realisation->id) }}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-edit"></i></a>
                          <a style="margin-left:7px;" data-toggle="modal" data-id="{{$realisation->id}}" data-name="{{$realisation->name}}" data-target="#modal-default-view-realisation-{{ $realisation->id }}" class="btn btn-warning btn-xs pull-right"><i class="fa fa-eye"></i></a>
                        </span>
                  </div>
                </li>
                @endforeach
              </ul>
            </section>
            <!-- /.content -->
          </div>
            <!-- /.content-wrapper -->


                <!-- Fin du modal des edtions -->
                @foreach($realisation_all as $realisation)
            
            <div class="modal fade" id="modal-default-view-realisation-{{ $realisation->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Les Details De La realisation {{ $realisation->nom }}</h4>
                  </div>
                 
                    <div class="modal-body">
                      <p>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- Box Comment -->
                            <div class="box box-widget">
                              <div class="box-body">
                                <img class="img-responsive pad" style="width:100%;auto;" src="{{ Storage::url($realisation->image) }}" alt="Photo">
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
                                          <span class="text-muted pull-right">  Publiere le : {{ $realisation->created_at->toFormattedDateString() }}</span>
                                          <span style="margin-left:20px;" class="text-muted pull-right">  Status : @if($realisation->status == 1) Publique @else Privee @endif</span>
                                        </span>
                                        <br>
                                        {!! $realisation->contenu !!}
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