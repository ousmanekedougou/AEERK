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
          <div class="">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Num</th>
                  <th>Categorie</th>
                  <th>Etiquete</th>
                  <th>Modifier</th>
                  <th class="text-center">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categorys as $category)
                  <tr>
                  <th>{{ $loop->index +1 }}</th>
                  <th>{{ $category->name }}</th>
                  <th>{{ $category->slug }}</th>
                  <th><a data-toggle="modal" data-id="{{$category->id}}" data-name="{{$category->name}}" data-target="#modal-default-update-category-{{ $category->id }}"><i class="glyphicon glyphicon-edit"></i></a></th>
                  <th class="text-center">
                    <form id="delete-form-{{$category->id}}" method="post" action="{{ route('admin.category.destroy',$category->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a href="" onclick="
                    if(confirm('Etes Vous Sur De Supprimer Cette Categorie ?')){

                    event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();

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
                  <th>Categorie</th>
                  <th>Etiquete</th>
                  <th>Modifier</th>
                  <th class="text-center">Supprimer</th>
                </tr>
                </tfoot>
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
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection