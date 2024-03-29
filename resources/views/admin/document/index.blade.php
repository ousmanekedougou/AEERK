@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection
@section('main-content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
        <!-- Debut de la div -->
        <div class="box-body">
        <div class="">
          <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Facultes</th>
                  <th>Livres</th>
                  <th>Options</th>
                </tr>
                </thead>
                {{ $i = '' }}
                  <tbody>
                    @foreach($document_all as $document)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $document->name }}</td>
                        <td><a href="{{ route('admin.document.show',$document->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Voir</a>
                        <a href="" class="btn btn-xs btn-success" data-toggle="modal" data-id="{{$document->id}}" data-name="{{$document->name}}" data-target="#modal-documentAdd-{{ $document->id }}"><i class="fa fa-plus"></i> Ajouter</a></td>
                        <td>
                          {{--<a style="margin-right:5px;" data-toggle="modal" data-id="{{$document->id}}" data-name="{{$document->name}}" data-target="#modal-default-{{ $document->id }}"><i class="glyphicon glyphicon-edit"></i></a>--}}
                        
                          <a data-toggle="modal" data-target="#modal-default-immeuble-{{$document->id}}" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                        <div class="modal fade" id="modal-default-immeuble-{{$document->id}}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Suppression de filliere</h4>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Etes vous sure de voloire supprimer cette categorie
                                </p>
                              <form action="{{ route('admin.document.destroy',$document->id) }}" method="post" style="display:none;">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="forme" value="1">
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
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
            <!-- fin de la table -->
            <!-- /.box-body -->
          </div>
        </div>
        <!-- Fin de la div  -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


         @foreach($document_all as $document)
          <div class="modal fade" id="modal-documentAdd-{{ $document->id }}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter un document</h4>
                </div>
                <form action="{{ route('admin.document.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <input type="hidden" name="faculty" value="{{ $document->id }}">
                  <div class="row">
                    <div class="col-md-6">
                      <p>
                        <label for="title">Le titre du document</label>
                        <input type="text"  value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="sujet">le sujet du document</label>
                        <input type="text"  value="{{ old('sujet')}}" class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet" placeholder="">
                        @error('sujet')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                      <p>
                        <label for="auteur">L'auteur du document</label>
                        <input type="text"  value="{{ old('auteur')}}" class="form-control @error('auteur') is-invalid @enderror" id="auteur" name="auteur" placeholder="">
                        @error('auteur')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                       <p>
                         <label for="date">La date de publication</label>
                        <input type="date"  value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="">
                        @error('date')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p>
                        <label for="image">Votre Image</label>
                        <input type="file" name="image" value="{{ old('image')  }}" class="@error('image') is-invalid @enderror" id="exampleInputFile">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <label for="file">Votre fichier pdf</label>
                        <input type="file" name="file" value="{{ old('file')}}" class="@error('file') is-invalid @enderror" id="exampleInputFile">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                      <p>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="1" name="status"> Publier
                          </label>
                        </div>
                      </p>
                    </div>
                    <div class="col-md-12">
                      <p>
                        <label for="resume">Le resume de votre document</label>
                        <textarea class="textarea" name="resume" placeholder="" value="{{ old('resume')  }}" class="@error('resume') is-invalid @enderror"
                        style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                        @error('resume')
                        <span class="invalid-feedback" role="alert">
                            <strong class="message_error">{{ $message }}</strong>
                        </span>
                        @enderror
                      </p>
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </div>
              </form>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        @endforeach



@endsection


@section('footersection')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
<script>
 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection