@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <section class="content">
   <!-- Debut de la div -->
   <div class="box-body">
          <div class="">
            
            @can('logement.create', Auth::guard('admin')->user())
            <div class="form-group pull-right">
               <a data-toggle="modal" data-id="add_dep" data-name="add_dep" data-target="#modal-default-add-dep" class="btn btn-primary">Ajouter un departement</a>
              
            </div>
            @endcan
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Departement</th>
                  @can('logement.update', Auth::guard('admin')->user())
                  <th>Modifier</th>
                  @endcan
                  @can('logement.delete', Auth::guard('admin')->user())
                  <th>Supprimer</th>
                  @endcan
                </tr>
                {{ $i = '' }}
                </thead>
                  <tbody class="text-center">
                          @foreach($departement as $dep)
                          <tr>
                          <td>{{ ++$i }}</td>
                            <td>{{ $dep->name }}</td>
                            @can('logement.update', Auth::guard('admin')->user())
                            <td> <a data-toggle="modal" data-id="{{$dep->id}}" data-name="{{$dep->name}}" data-target="#modal-default-{{ $dep->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                            @endcan
                            @can('logement.delete', Auth::guard('admin')->user())
                            <td>
                              <form id="delete-form-{{$dep->id}}" method="post" action="{{ route('admin.departement.destroy',$dep->id) }}" style="display:none">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              </form>
                            <a href="" onclick="
                              if(confirm('Are you sure , You want to delete this ?')){

                              event.preventDefault();document.getElementById('delete-form-{{$dep->id}}').submit();

                              }else{

                                event.preventDefault();

                              }
                              
                              "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              </td>
                              @endcan
                          </tr>
                          @endforeach
                  </tbody>
              </table>
            </div>
            <!-- fin de la table -->
            <!-- /.box-body -->
          </div>
        </div>
        <!-- Fin de la div  -->



           <!-- Debut de la div -->
           <div class="box-body">
          <div class="">
            @can('logement.create', Auth::guard('admin')->user())
            <div class="form-group pull-right">
            <a data-toggle="modal" data-id="add_commune" data-name="add_commune" data-target="#modal-default-add-commune" class="btn btn-primary">Ajouter une Commune</a>
            </div>
            @endcan
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table responsive-table table-bordered text-center table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Communes</th>
                  <th>Departements</th>
                  @can('logement.update', Auth::guard('admin')->user())
                  <th>Modifier</th>
                  @endcan
                  @can('logement.delete', Auth::guard('admin')->user())
                  <th>Supprimer</th>
                  @endcan
                </tr>
                {{ $i = '' }}
                </thead>
                  <tbody>
                  @foreach($commune as $com)
                          <tr>
                          <td>{{ ++$i }}</td>
                            <td>{{ $com->name }}</td>
                            <td>
                                {{$com->departement->name}}
                            </td>
                            @can('logement.update', Auth::guard('admin')->user())
                            <td>
                              <a data-toggle="modal" data-id="{{$com->id}}" data-name="{{$com->name}}" data-target="#modal-default-com-{{ $com->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                           
                            </td>
                            @endcan
                            @can('logement.delete', Auth::guard('admin')->user())
                            <td>
                              <form id="delete-form-{{$com->id}}" method="post" action="{{ route('admin.commune.destroy',$com->id) }}" style="display:none">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              </form>
                            <a href="" onclick="
                              if(confirm('Eetes vous sure de supprimer cette commune ?')){

                              event.preventDefault();document.getElementById('delete-form-{{$com->id}}').submit();

                              }else{

                                event.preventDefault();

                              }
                              
                              "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                              </td>
                              @endcan
                          </tr>
                          @endforeach
                  </tbody>
              </table>
            </div>
            <!-- fin de la table -->
            <!-- /.box-body -->
            
          </div>
        </div>
        <!-- Fin de la div  -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Modal D'ajout des  Departement -->



  <div class="modal fade" id="modal-default-add-dep">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouiter Un Departement</h4>
              </div>
              <form action="{{ route('admin.departement.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


      @foreach($departement as $modal_dep)
        <div class="modal fade" id="modal-default-{{ $modal_dep->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Departement</h4>
              </div>
              <form action="{{ route('admin.departement.update',$modal_dep->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') ?? $modal_dep->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
  <!-- Fin du modal Departement -->


    <!-- Modal D'ajout des communes -->


          <div class="modal fade" id="modal-default-add-commune">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter Votre Commune</h4>
              </div>
              <form action="{{ route('admin.commune.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                    <select  value="{{ old('departement') }}" class="form-control @error('departement') is-invalid @enderror" id="departement" name="departement">
                      @foreach($departement as $modal_dep_com)
                      <option value="{{ $modal_dep_com->id }}">{{ $modal_dep_com->name }}</option>
                      @endforeach
                    </select>
                    @error('departement')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



    @foreach($commune as $modal_com)
        <div class="modal fade" id="modal-default-com-{{ $modal_com->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Commune</h4>
              </div>
              <form action="{{ route('admin.commune.update',$modal_com->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="text"  value="{{ old('name') ?? $modal_com->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                    <select  value="{{ old('departement') ?? $modal_com->name }}" class="form-control @error('departement') is-invalid @enderror" id="departement" name="departement">
                      @foreach($departement as $modal_dep_com)
                      <option value="{{ $modal_dep_com->id }}">{{ $modal_dep_com->name }}</option>
                      @endforeach
                    </select>
                    @error('departement')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
  <!-- Fin du modal Departement -->
  

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