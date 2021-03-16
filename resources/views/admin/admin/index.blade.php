@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
              <table id="example1" class="table table-bordered table-striped">
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
                  <th>{{ $loop->index +1 }}</th>
                  <td><img style="width:60px;height:auto;" class="img-circle" src="{{ Storage::url($admin->image) }}" alt="" srcset=""></td>
                  <th>{{ $admin->name }}</th>
                  <th>
                    @foreach($admin->roles as $role)
                    {{ $role->name }},
                    @endforeach
                  </th>
                  <th>{{ $admin->status? 'Active' : 'Desactive' }}</th>
                  @can('admins.update', Auth::guard('admin')->user())
                  <th><a href="{{ route('admin.admin.edit',$admin->id) }}"><i class="glyphicon glyphicon-edit"></i></a></th>
                  @endcan
                  @can('admins.delete', Auth::guard('admin')->user())
                  <th>
                    <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('admin.admin.destroy',$admin->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a href="" onclick="
                    if(confirm('Etes vous sure de vouloire supprimer cet administrateur ?')){

                    event.preventDefault();document.getElementById('delete-form-{{$admin->id}}').submit();

                    }else{

                      event.preventDefault();

                    }
                    
                    "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    </th>
                    @endcan
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
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
                </tfoot>
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

@endsection