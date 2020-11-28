@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                      <!-- /.col -->
        <div class="">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Les Nouveaux Bacheliers</a></li>
              <li class="pull-right"><a href="#timeline" data-toggle="tab">Les Anciens Bacheliers</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Voire</th>
                  <th>Traitement</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nouveau_bac as $nouveau)
                  <tr>
                    <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                    <td>{{ $nouveau->phone }}</td>
                    <td><a href="{{ route ('admin.inscription.show',$nouveau->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                    </td>
                    <td>
                      @if($nouveau->status == 1)
                        <span class="btn btn-primary btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                      @else 
                      <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                      @endif
                    </td>
                    <td>
                      @if($nouveau->status == 1)
                      <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.codification.show',$nouveau->id) }}">Codifier <i class="fa fa-edit"></i></a></span>
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
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Voire</th>
                  <th>Traitement</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Immeuble Choisi</th>
                  <th>Voire</th>
                  <th>Traitement</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ancien_bac as $ancien)
                  <tr>
                    <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                    <td>{{ $ancien->phone }}</td>
                    <td>{{ $ancien->immeuble->name }}</td>
                    <td><a href="{{ route ('admin.inscription.edit',$ancien->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                    </td>
                    <td>
                      @if($ancien->status == 1)
                        <span class="btn btn-primary btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                      @else 
                      <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                      @endif
                    </td>
                    <td>
                      @if($ancien->status == 1)
                      <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.codification.edit',$ancien->id) }}">Codifier <i class="fa fa-edit"></i></a></span>
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
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Immeuble Choisi</th>
                  <th>Voire</th>
                  <th>Traitement</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

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