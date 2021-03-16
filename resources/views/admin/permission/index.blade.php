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

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border">
          <h3 class="box-title">Permissions</h3>
          <a class="col-lg-offset-5 btn btn-success" href="{{ route('admin.permission.create') }}">Ajouter Une Permission</a>

        </div>
        <div class="box-body">
            <!-- debut de la table -->
          <div class="">
            <!-- /.box-header -->
           <div class="box-header"> @include('includes.message')</div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Num</th>
                  <th>Nom Permission</th>
                  <th>Permission Pour</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($permission as $perm)
                  <tr>
                  <th>{{ $loop->index +1 }}</th>
                  <th>{{ $perm->name }}</th>
                  <th>{{ $perm->for }}</th>
                  <th><a href="{{ route('admin.permission.edit',$perm->id) }}"><i class="glyphicon glyphicon-edit"></i></a></th>
                  <th>
                    <form id="delete-form-{{$perm->id}}" method="post" action="{{ route('admin.permission.destroy',$perm->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a href="" onclick="
                    if(confirm('Etes vous sure de supprimer cette permission ?')){

                    event.preventDefault();document.getElementById('delete-form-{{$perm->id}}').submit();

                    }else{

                      event.preventDefault();

                    }
                    
                    "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Num</th>
                  <th>Nom Permission</th>
                  <th>Permission Pour</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </tfoot>
              </table>
              {{ $permission->links() }}
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