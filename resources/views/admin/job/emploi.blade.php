@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
<style>
  @media only screen and (max-width:700px) {
    .icon{
      opacity: 1;
      visibility: visible;
      border: 1px solid red;
    }
  }
</style>
@endsection

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <!-- Debut de la div -->
      <div class="box-body">
        <div class="">
          <h3 class="text-center btn btn-primary btn-block text-bold" style="width: 100%;"> {{$employes->count()}} candidats pour la spacialite {{$speciality->name}} </h3>
        
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              @foreach($employes as $emploi)
                <div class="col-lg-3 col-xs-12">
                  <div class="small-box bg-aqua">
                    <div class="inner text-left">
                      <p>{{ $emploi->name }}</p>
                      <p>{{ $emploi->phone }}</p>
                    </div>
                    <div class="icon text-right">
                      <img src="{{ Storage::url($emploi->image) }}" alt="" srcset="" style="width: 70px;height:70px;margin-top:-15px;border-radius:100%;" >
                    </div>
                    <div class="d-flex small-box-footer text-center">
                      <a href="#" class="small-box-footer btn btn-success btn-xs"><i class="fa fa-eye"></i> Profile</a>
                      <a href="{{ Storage::url($emploi->cv) }}" target="_blank" class="small-box-footer btn btn-warning btn-xs"><i class="fa fa-eye"></i> CV</a>
                      <a href="{{ Storage::url($emploi->cni) }}" target="_blank" class="small-box-footer btn btn-primary btn-xs"><i class="fa fa-eye"></i> CNI</a>
                    </div>
                  </div>
                </div>
                @endforeach
                <!-- ./col -->
            </div>
          </div>
          <!-- fin de la table -->
          <!-- /.box-body -->
        </div>
      </div>
      <!-- Fin de la div  -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Fin de la div -->
  <!-- /.content-wrapper -->


@foreach($employes as $emploi)
<div class="modal fade" id="modal-default-delete-{{$emploi->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Suppression de candidats</h4>
      </div>
      <div class="modal-body">
        <p>
          Etes vous sure de voloire supprimer ce candidats
        </p>
      <form action="{{ route('admin.domaine.delete_emploi',$emploi->id) }}" method="post" style="display:none;">
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

