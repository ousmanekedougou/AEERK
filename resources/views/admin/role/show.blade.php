@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border">
          <h3 class="box-title">Roles</h3>
          {{--
            <a class="col-lg-offset-5 btn btn-success" href="{{ route('admin.role.create') }}">Ajouter Un Role</a>
          --}}
        </div>
        <div class="box-body">
            <!-- debut de la table -->
          <div class="">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Num</th>
                  <th>Nom Role</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($roles as $role)
                  <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                      <a href="{{ route('admin.role.edit',$role->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                      {{--
                      <a data-toggle="modal" data-target="#modal-default-{{$role->id}}" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                      --}}
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-default-{{$role->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce role
                          </p>
                        <form action="{{ route('admin.role.destroy',$role->id) }}" method="post" style="display:none;">
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
                  @endforeach
                </tbody>
              </table>
              {{ $roles->links() }}
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection