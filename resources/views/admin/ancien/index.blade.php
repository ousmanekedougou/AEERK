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
            <div class="box-header">
              <h3 class="box-title">Liste D'inscription Des Anciens</h3>
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
                  <th>Immeuble Choisi</th>
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
                @foreach($ancien_bac as $ancien)
                  <tr>
                    <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                    <td>{{ $ancien->phone }}</td>
                    <td>{{ $ancien->immeuble->name }}</td>
                    @can('codifier.update', Auth::guard('admin')->user())
                    <td><a href="{{ route ('admin.ancien.show',$ancien->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                    </td>
                    @endcan
                    <td>
                      @if($ancien->status == 1)
                        <span class="btn btn-primary btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                      @else 
                      <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                      @endif
                    </td>
                    @can('codifier.update', Auth::guard('admin')->user())
                    <td>
                      @if($ancien->status == 1)
                      <!-- <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.ancien.edit',$ancien->id) }}">Codifier <i class="fa fa-edit"></i></a></span> -->
                      <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$ancien->id}}" data-name="{{$ancien->name}}" data-target="#modal-default-edit-ancien{{ $ancien->id }}">Codifier <i class="fa fa-edit"></i></a></a>
                      @else 
                      <form id="delete-form-{{$ancien->id}}" method="post" action="{{ route('admin.ancien.destroy',$ancien->id) }}" style="display:none">
                      {{csrf_field()}}
                      {{method_field('delete')}}
                      </form>
                      <span class=""><a class="btn btn-danger btn-xs text-center" 
                      onclick="
                      if(confirm('Etes Vous Sur De Supprimer Cet Etudiant ?')){

                      event.preventDefault();document.getElementById('delete-form-{{$ancien->id}}').submit();

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
                  <th>Immeuble Choisi</th>
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
              {{-- {{$ancien_bac->links()}} --}}
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


<!-- Modal pour La codification des anciens -->
    @foreach($ancien_bac as $ancien)
      <div class="modal fade" id="modal-default-edit-ancien{{ $ancien->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Codifier Cette Etudiant</h4>
              </div>
              <div class="row">
                      <div class="col-sm-4 p-5">
                      <img class="profile-user-img img-responsive" style="width:100%;margin-top:10px;margin-left:1px;" src="{{ Storage::url($ancien->image) }}" alt="User profile picture">
                      </div>
                      <div class="col-sm-8 text-justify">
                        <h3 class="profile-username">{{ $ancien->prenom.' '.$ancien->nom }}</h3>
                        <p><b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $ancien->email }}</a></p>
                        <p><b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $ancien->phone }}</a></p>
                        <p> <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $ancien->commune->name }}</a></p>
                        <p>  <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $ancien->immeuble->name }}</a></p>
                      </div>
              </div>
              @foreach($immeubles as $imb) 
              <form action="{{ route('admin.codifier_ancien',$ancien->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">
                <p>
                <h3 class="text-center">{{ $imb->name }}</h3>
                        <div class="form-group">
                          <label>Chambres</label>
                          <select value="{{ old('chambre_id') }}" class="form-control @error('chambre_id') is-invalid @enderror" name="chambre_id" style="width: 100%;">
                            <option selected>Choisir la chambre</option>
                            @foreach($imb->chambres  as $chm)
                              @if($ancien->genre == $chm->genre)
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

              <button type="submit" class="btn btn-primary">Codifier</button>
              </div>
              </form>
              @endforeach
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer La Fenetre</button>
             
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    @endforeach
<!-- Fin du modal pour la codification des anciens -->

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