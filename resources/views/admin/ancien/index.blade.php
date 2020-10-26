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
              <h3 class="box-title">Liste Des Anciens</h3>
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
                @foreach($anciens as $ancien)
                  <tr>
                    <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                    <td>{{ $ancien->phone }}</td>
                    <td>
                    @if($ancien->codifier == 1)
                    @foreach($ancien->chambre->immeubles as $chmb)
                      <span>{{ $chmb->name }} : </span>
                    @endforeach
                    <span> {{ $ancien->chambre->nom }}</span>
                    @else 
                    <span>N'a pas Codifier</span>
                    @endif
                    </td>
                    <td><a href="{{ route ('admin.ancien.show',$ancien->id) }}"><span class="btn btn-success btn-xs">Voire</span></a></td>
                    <td>
                    @if($ancien->status == 1 && $ancien->codifier == 1)
                      <span class="text-success">A Codifier</span> | <span class="text-warning">  {{ $ancien->prix }} f</span>  
                      @elseif($ancien->status == 1 && $ancien->codifier == 0)
                      <span class="pull-right"><a class="btn btn-success btn-xs" href="{{ route ('admin.codification.edit',$ancien->id) }}">Pas Codifier <i class="fa fa-edit"></i></a></span>
                      @elseif($ancien->status == 2)
                      <span class="text-warning">Ommis <i class="fa  fa-times"></i></span></td>
                     @else
                      <span class="text-warning">Pas encord consulter</span></td>
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