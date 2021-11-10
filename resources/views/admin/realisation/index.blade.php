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
      <h1>
        La liste des etudiants
        <small>Appercue des informations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box-body">
        {{--<div class="row text-center">
          <div class="margin">
            <div class="btn-group">
              <button type="button" class="btn btn-default">Toute les fillieres</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                @foreach(App\Models\User\Faculty::all() as $faculty)
                  <li><a href="{{ route('home.index', ['filliere'
                    => $faculty->slug]) }}">{{$faculty->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>--}}
          <!-- debut de la table -->
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Num</th>
                  <th class="text-center">Image</th>
                  <th class="text-center">Prenom et nom</th>
                  <th class="text-center">email</th>
                   <th class="text-center">telephone</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($etudiants as $home)
                  <tr>
                  <td class="text-center">{{ $loop->index +1 }}</td>
                  <td class="text-center">  <img style="width:50px;height:50px;" class="img-circle img-responsive" src="{{ Storage::url($home->image) }}" ></td>
                  <td class="text-center">{{ $home->name }}</td>
                  <td class="text-center">{{ $home->email }}</td>
                  <td class="text-center">{{ $home->phone }}</td>
                  <td class="text-center"><a href="{{ route('admin.realisation.show',$home->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
              
                  <a href="" data-toggle="modal" data-target="#modal-default-delete-{{$home->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    <div class="modal fade" id="modal-default-delete-{{$home->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Suppression d'etudiant</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              Etes vous sure de voloire supprimer cet etudiant
                            </p>
                          <form action="{{ route('admin.realisation.destroy',$home->id) }}" method="post" style="display:none;">
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
              {{ $etudiants->links() }}
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
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
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection