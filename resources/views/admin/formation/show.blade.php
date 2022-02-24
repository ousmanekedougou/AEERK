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
            <!-- /.box-header -->
            <h3 class="btn btn-primary btn-block mb-4">{{$show->titre}}</h3>
            <div class="box-body">
              <div class="nav-tabs-custom mt-4">
                  <div class="row well well-sm no-shadow">
                    <div class="col-md-5">
                      <img src="{{ Storage::url($show->image) }}" alt="" srcset="" style="width:100%;height:auto;">
                      <div class="row" style="margin-top: 20px;">
                          <span class="badge btn-primary" style="width:100%;">Nom du lien : {{$show->lien_name}}</span>
                          <br>
                          <span class="badge btn-success text-truncate" style="margin-top: 5px;width:95%;">Lien : {{$show->lien}}</span>
                      </div>
                      <div class="row text-left" style="margin-top:10px;">
                        <div class="col-md-6">
                          <span class="badge btn-warning">Date de creation : {{$show->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="col-md-6"><span class="badge btn-info">Status : @if($show->status == 1) Publique @else Non publique @endif </span></div>
                      </div>
                        <h4>Description</h4>
                      <p class="text-muted well well-sm no-shadow" style="margin-top:10px;">
                        {{$show->desc}}
                      </p>
                    </div>
                    <div class="col-md-7">
                       <h4>Detail complete de l'offre</h4>
                      <p class="text-muted">
                        {!!$show->content!!}
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <a href="{{ route('admin.formation.index') }}" class="btn btn-primary btn-block"> <i class="fa fa-arrow-left"></i> Retour</a>
                        </div>
                        <div class="col-md-6">
                          <a href="{{ route('admin.formation.edit',$show->id) }}" class="btn btn-success btn-block"> <i class="fa fa-edit"></i> Modifier</a>
                        </div>
                      </div>
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