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
        <div class="">
          <h3 class="box-title">Categories</h3>
          <a  data-toggle="modal" data-id="#category" data-name="category" data-target="#modal-category-add" class="col-lg-offset-5 btn btn-success" href="">Ajouter Une Categorie</a>
         
        </div>
        <div class="box-body">
                    <!-- debut de la table -->
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Num</th>
                  <th class="text-center">Categorie</th>
                  <th class="text-center">Etiquete</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categorys as $category)
                  <tr>
                  <td class="text-center">{{ $loop->index +1 }}</td>
                  <td class="text-center">{{ $category->name }}</td>
                  <td class="text-center">{{ $category->slug }}</td>
                  <td class="text-center">
                    <a data-toggle="modal" data-id="{{$category->id}}" data-name="{{$category->name}}" data-target="#modal-default-update-category-{{ $category->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                  
                  <a data-toggle="modal" data-target="#modal-default-{{$category->id}}"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                  <div class="modal fade" id="modal-default-{{$category->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de categorie</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer cette categorie
                          </p>
                        <form action="{{ route('admin.category.destroy',$category->id) }}" method="post" style="display:none;">
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
              {{ $categorys->links() }}
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

      <!-- LA PARTIE DES MODAL -->

      <!-- Debut du modal des ajouts -->
        <!-- Modal Departement -->
        <div class="modal fade" id="modal-category-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter une categorie</h4>
              </div>
              <form action="{{ route('admin.category.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <label for="category">Nom de la Categorie</label>
                <input type="text"  value="{{ old('name')  }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="slug">Slug de la Categorie</label>
                <input type="text"  value="{{ old('slug')  }}" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="">
                  @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistre</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- Fin du modal Departement -->
      <!-- Fin du modal des ajouts -->

    <!-- Debut du modal des edition  -->

    <!-- Fin du modal des edtions -->
      @foreach($categorys as $modal_category)
        <div class="modal fade" id="modal-default-update-category-{{ $modal_category->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Catagorie</h4>
              </div>
              <form action="{{ route('admin.category.update',$modal_category->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
              <p>
                <label for="category">Nom de la Categorie</label>
                <input type="text"  value="{{ $modal_category->name ?? old('name')  }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="slug">Slug de la Categorie</label>
                <input type="text"  value="{{ $modal_category->slug ?? old('slug')  }}" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="">
                  @error('slug')
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
      <!-- FIN DE LA PARTIE DES MODAL -->

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

@endsection