@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Liste Des Nouveaux Bacheliers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Codifier A</th>
                  <th>Voire</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nouveau_bac as $nouveau)
                  <tr>
                    <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                    <td>{{ $nouveau->phone }}</td>
                    <td>
                    @if($nouveau->codifier == 1)
                    @foreach($nouveau->chambre->immeubles as $chmb)
                      <span>{{ $chmb->name }} : </span>
                    @endforeach
                    <span> {{ $nouveau->chambre->nom }}</span>
                    @else 
                    <span>N'a pas Codifier</span>
                    @endif
                    </td>
                    <td><a href="{{ route ('admin.nouveau.show',$nouveau->id) }}"><span class="btn btn-success btn-xs">Voire</span></a></td>
                    </td>
                    <td class="text-center">
                    @if($nouveau->status == 1 && $nouveau->codifier == 1)
                      <span class="text-success">A Codifier</span> | <span class="text-warning">  {{ $nouveau->prix }} f</span> 
                      @elseif($nouveau->status == 1 && $nouveau->codifier == 0)
                      <span class="pull-right"><a class="btn btn-success btn-xs text-center mr-3" href="{{ route ('admin.codification.show',$nouveau->id) }}">Pas Codifier <i class="fa fa-edit"></i></a></span>
                      @else
                      <span class="text-warning">Pas encord valider<i class="fa  fa-times"></i></span>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>Telephone</th>
                  <th>Codifier A</th>
                  <th>Voire</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection