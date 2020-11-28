@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <br>
          <a  href="{{ route('admin.document.create') }}" class="col-lg-offset-5 btn btn-success" href="">Ajouter Un Nouveau Document</a>
             <!-- Main content -->
            <section class="content">
              <ul class="mailbox-attachments clearfix">
                @foreach($document_all as $doc)
                <li>
                <a href="{{Storage::url($doc->image)}}" class="mailbox-attachment-name"> <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span></a>

                  <div class="mailbox-attachment-info">
                    <a href="{{Storage::url($doc->image)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{ $doc->libele }}</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB

                    <form id="delete-form-{{$doc->id}}" method="post" action="{{ route('admin.document.destroy',$doc->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                    <a style="margin-left:7px;"  onclick=" if(confirm('Etes Vous Sure De Supprimer Ce Document ?')){ event.preventDefault();document.getElementById('delete-form-{{$doc->id}}').submit();

                    }else{ event.preventDefault(); } " class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a>

                          <a style="margin-left:7px;" href="{{ route('admin.document.edit',$doc->id) }}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-edit"></i></a>
                          <a style="margin-left:7px;" data-toggle="modal" data-id="{{$doc->id}}" data-name="{{$doc->name}}" data-target="#modal-default-view-doc-{{ $doc->id }}" class="btn btn-warning btn-xs pull-right"><i class="fa fa-eye"></i></a>
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
      @foreach($document_all as $doc)
        <div class="modal fade" id="modal-default-view-doc-{{ $doc->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"> Titre :  {{ $doc->libele }}</h3>
              </div>
              <div class="modal-body">
                <h2> Type : {{ $doc->type }}</h2>
                <h1>Resume</h1>
                <p>
                  
                  {!! $doc->resume !!}
                </p>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
      <!-- FIN DE LA PARTIE DES MODAL -->



@endsection