@extends('admin.layouts.app')

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
                    <td><a href="{{ route ('admin.ancien.show',$ancien->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
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
                      <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.ancien.edit',$ancien->id) }}">Codifier <i class="fa fa-edit"></i></a></span>
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
              {{$ancien_bac->links()}}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection