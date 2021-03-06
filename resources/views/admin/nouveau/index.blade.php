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

      <!-- La partie des inscriptions -->
          <div class="">
            <div class="box-header">
              <h3 class="box-title">Liste D'inscription Des Nouveaux Bacheliers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  @can('codifier.update', Auth::guard('admin')->user())
                  <th>Voire</th>
                  @endcan
                  <th>Traitement</th>
                  @can('codifier.update', Auth::guard('admin')->user())
                  <th>Options</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($nouveau_bac as $nouveau)
                  <tr>
                    <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                    <td>{{ $nouveau->phone }}</td>
                    @can('codifier.update', Auth::guard('admin')->user())
                      <td><a href="{{ route ('admin.nouveau.show',$nouveau->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                      </td>
                    @endcan
                    <td>
                      @if($nouveau->status == 1)
                        <span class="btn btn-primary btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                      @else 
                      <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                      @endif
                    </td>
                    @can('codifier.update', Auth::guard('admin')->user())
                    <td>
                      @if($nouveau->status == 1)
                      <!-- <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.nouveau.edit',$nouveau->id) }}">Codifier <i class="fa fa-edit"></i></a></span> -->
                      <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$nouveau->id}}" data-name="{{$nouveau->name}}" data-target="#modal-default-edit-nouveau{{ $nouveau->id }}">Codifier <i class="fa fa-edit"></i></a></a>
                      @else 
                      <span class=""><form id="delete-form-{{$nouveau->id}}" method="post" action="{{ route('admin.nouveau.destroy',$nouveau->id) }}" style="display:none">
                      {{csrf_field()}}
                      {{method_field('delete')}}
                      </form>
                      <span class=""><a class="btn btn-danger btn-xs text-center" 
                      onclick="
                      if(confirm('Etes Vous Sur De Supprimer Cet Etudiant ?')){

                      event.preventDefault();document.getElementById('delete-form-{{$nouveau->id}}').submit();

                      }else{

                        event.preventDefault();

                      }
                      
                      "><i class="fa fa-trash"> Supprimer</i></a></span>
                      @endif
                    </td>
                    @endcan
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  @can('codifier.update', Auth::guard('admin')->user())
                  <th>Voire</th>
                  @endcan
                  <th>Traitement</th>
                  @can('codifier.update', Auth::guard('admin')->user())
                  <th>Options</th>
                  @endcan
                </tr>
                </tfoot>
              </table>
              {{-- {{ $nouveau_bac->links() }} --}}
            </div>
            </div>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
      <!-- Fin de la partie des inscriptions -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal du update des soldes -->
    @foreach($nouveau_bac as $nouveau)
      <div class="modal fade" id="modal-default-edit-nouveau{{ $nouveau->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Codifier Cette Etudiant</h4>
              </div>
              <div class="row">
                      <div class="col-sm-4">
                      <img class="profile-user-img img-responsive" style="width:100%;height:100%;margin-top:10px;margin-left:10px;" src="{{ Storage::url($nouveau->image) }}" alt="User profile picture">
                      </div>
                      <div class="col-sm-8">
                        <h3 class="profile-username">{{ $nouveau->prenom.' '.$nouveau->nom }}</h3>
                        <p><b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $nouveau->email }}</a></p>
                        <p><b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $nouveau->phone }}</a></p>
                        <p> <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $nouveau->commune->name }}</a></p>
                      </div>
              </div>
              <form action="{{ route('admin.codifier_nouveau',$nouveau->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">

                <p>
                  <h3 class="text-center">{{ $immeubles->name }}</h3>
                  <div class="form-group">
                    <label>Chambres</label>
                    <select value="{{ old('chambre_id') }}" class="form-control @error('chambre_id') is-invalid @enderror" name="chambre_id" style="width: 100%;">
                    <option selected>Choisir la chambre</option>
                      @foreach($immeubles->chambres  as $chm)
                        @if($nouveau->genre == $chm->genre)
                          <option value="{{$chm->id}}">{{$chm->nom}}</option>
                        @endif
                      @endforeach
                    
                    </select>
                    @error('chambre_id')
                      <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </p>

              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Codifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    @endforeach
<!-- Fin du modal update  des soldes -->


@endsection



@section('footersection')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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