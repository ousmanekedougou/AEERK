@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection

  @section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">
        <span class="btn btn-primary">La liste des filleires universités publiques</span>
        <span class="etudiant_migration"  style="float:right;">
          <a class="btn btn-primary" data-toggle="modal" data-target="#modal-default-add-fiiliere"><i class="fa fa-plus"> Ajouter une filliere</i></a>
        </span>
        <br><br>

            <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th colspan="5">Niveaux</th>
                    <th>option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($faculties as $filliere)
                    <tr><td>{{ $filliere->name }}</td>
                      <td><a href="{{ route('admin.filliere.licence1',$filliere->id) }}" class="btn btn-warning btn-xs text-center">Licence 1</i></a></td>
                      <td><a href="{{ route('admin.filliere.licence2',$filliere->id) }}" class="btn btn-warning btn-xs text-center">Licence 2</i></a></td>
                      <td><a href="{{ route('admin.filliere.licence3',$filliere->id) }}" class="btn btn-warning btn-xs text-center">Licence 3</i></a></td>
                      <td><a href="{{ route('admin.filliere.master1',$filliere->id) }}" class="btn btn-warning btn-xs text-center">Masters 1</i></a></td>
                      <td><a href="{{ route('admin.filliere.master2',$filliere->id) }}" class="btn btn-warning btn-xs text-center">Masters 2</i></a></td>
                      <td>
                      <a data-toggle="modal" data-target="#modal-default-filliere-{{$filliere->id}}" class="btn btn-info btn-xs text-center"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger btn-xs text-center" data-toggle="modal" data-target="#modal-default-{{$filliere->id}}"><i class="fa fa-trash"></i></a>
                      <div class="modal fade" id="modal-default-{{$filliere->id}}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Suppression d'un etidiant</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                                Etes vous sure de voloire supprimer {{$filliere->name}}
                              </p>
                            <form action="{{ route('admin.filliere.destroy',$filliere->id) }}" method="post" style="display:none;">
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
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
               <span class="pull-rigth"> {{ $faculties->links() }}</span>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>  


      </section>
                  <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




     {{-- Ajouter une filliere --}}
          <div class="modal fade" id="modal-default-add-fiiliere">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Ajouter Votre fillere du publique</h4>
                </div>
                <form action="{{ route('admin.filliere.store') }}" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="0" name="for">
                <p>
                  <label for="slug">Nom de la filliere</label>
                  <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                    
                  </p>
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
        {{-- Fin d'ajout de fiiliere --}}

         {{-- Modification d'une filliere --}}
         @foreach($faculties as $filliere)
          <div class="modal fade" id="modal-default-filliere-{{$filliere->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Modifier Votre fillere publique</h4>
                </div>
                <form action="{{ route('admin.filliere.update',$filliere->id) }}" method="post">
                 @csrf
                  {{ method_field('PUT') }}
                <div class="modal-body">
                  <input type="hidden" value="0" name="for">
                <p>
                  <label for="slug">Nom de la filliere</label>
                  <input type="text"  value="{{ old('name') ?? $filliere->name}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">Modfifier</button>
                </div>
              </div>
              </form>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        @endforeach
        {{-- Fin de modification de fiiliere --}}
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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection