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
            <span class="btn btn-primary">Liste des offres de concours</span>
            <a href="{{ route('admin.concour.create') }}" class="btn btn-success" style="float: right;">Ajouter</a>
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
                      @foreach($concours as $concour)
                        <tr>
                          <td><img src="{{ Storage::url($concour->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                          <td>{{ $concour->titre }}</td>
                          <td><a href="{{ route ('admin.concour.show',$concour->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                          </td>
                          <td>
                            <!-- <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.concour.edit',$concour->id) }}">Codifier <i class="fa fa-edit"></i></a></span> -->
                            <!-- <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$concour->id}}" data-name="{{$concour->name}}" data-target="#modal-default-edit-concour{{ $concour->id }}">Codifier <i class="fa fa-edit"></i></a></a> -->
                         
                              <a class="btn btn-danger btn-xs text-center" 
                            data-toggle="modal" data-target="#modal-default-{{$concour->id}}"><i class="fa fa-trash"> </i></a></span>
                            <div class="modal fade" id="modal-default-{{$concour->id}}">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Suppression votre concour</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                      Etes vous sure de voloire supprimer cette offre de concour
                                    </p>
                                  <form action="{{ route('admin.concour.destroy',$concour->id) }}" method="post" style="display:none;">
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
                    {{-- {{$concours->links()}} --}}
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