@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection
@section('main-content')




    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
            <span class="btn btn-primary">Liste des offres de formations</span>
            <a href="{{ route('admin.formation.create') }}" class="btn btn-success" style="float: right;">Ajouter</a>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Image</th>
                        <th>Agence</th>
                        <th>Details</th>
                        <th>Options</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($formations as $formation)
                        <tr>
                          <td><img src="{{ Storage::url($formation->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                          <td>{{ $formation->titre }}</td>
                          <td><a href="{{ route ('admin.formation.show',$formation->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                          </td>
                          <td>
                            <!-- <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.formation.edit',$formation->id) }}">Codifier <i class="fa fa-edit"></i></a></span> -->
                            <!-- <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$formation->id}}" data-name="{{$formation->name}}" data-target="#modal-default-edit-formation{{ $formation->id }}">Codifier <i class="fa fa-edit"></i></a></a> -->
                         
                              <a class="btn btn-danger btn-xs text-center" 
                            data-toggle="modal" data-target="#modal-default-{{$formation->id}}"><i class="fa fa-trash"> </i></a></span>
                            <div class="modal fade" id="modal-default-{{$formation->id}}">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Suppression votre formation</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                      Etes vous sure de voloire supprimer cette offre de formation
                                    </p>
                                  <form action="{{ route('admin.formation.destroy',$formation->id) }}" method="post" style="display:none;">
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
                    {{-- {{$formations->links()}} --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
      </div>
    <!-- /.content-wrapper -->



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