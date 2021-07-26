@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border">
          <h3 class="box-title">Administrateur</h3>
          @can('admins.create', Auth::guard('admin')->user())
            <a class="col-lg-offset-5 btn btn-success pull-right" href="{{ route('admin.admin.create') }}">Ajouter Un Admin</a>
          @endcan
        </div>
        <div class="box-body">
            <!-- debut de la table -->
          <div class="">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Image</th>
                  <th>Prenom & Nom</th>
                  <th>Assigner un Role</th>
                  <th>Status</th>
                  @can('admins.update', Auth::guard('admin')->user())
                    <th>Modifier</th>
                  @endcan
                  @can('admins.delete', Auth::guard('admin')->user())
                    <th>Supprimer</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                  @foreach($admins as $admin)
                  <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td><img style="width:60px;height:auto;" class="img-circle" src="{{ Storage::url($admin->image) }}" alt="" srcset=""></td>
                  <td>{{ $admin->name }}</td>
                  <td>
                    @foreach($admin->roles as $role)
                    {{ $role->name }},
                    @endforeach
                  </td>
                  <td>{{ $admin->status? 'Active' : 'Desactive' }}</td>
                  @can('admins.update', Auth::guard('admin')->user())
                  <td><a href="{{ route('admin.admin.edit',$admin->id) }}"><i class="glyphicon glyphicon-edit"></i></a></td>
                  @endcan
                  @can('admins.delete', Auth::guard('admin')->user())
                  <td>
                    <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('admin.admin.destroy',$admin->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a  data-toggle="modal" data-target="#modal-default-{{$admin->id}}"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    </td>


                    <div class="modal fade" id="modal-default-{{$admin->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Suppression de slider</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              Etes vous sure de voloire supprimer cet administrateur
                            </p>
                          <form action="{{ route('admin.admin.destroy',$admin->id) }}" method="post" style="display:none;">
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
                    @endcan
                  </tr>
                  @endforeach
                </tbody>
              </table>
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