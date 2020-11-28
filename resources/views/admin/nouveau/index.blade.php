@extends('admin.layouts.app')

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
                    <td><a href="{{ route ('admin.nouveau.show',$nouveau->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
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
                      <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.nouveau.edit',$nouveau->id) }}">Codifier <i class="fa fa-edit"></i></a></span>
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
              {{ $nouveau_bac->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- Fin de la partie des inscriptions -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection