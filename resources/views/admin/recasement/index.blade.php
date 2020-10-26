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
                  <th>Recaser A</th>
                  @foreach($nouveau_bac as $ancien)
                  @if($ancien->immeuble_rec > 0)
                  <th>Immeuble Choisi</th>
                  @endif
                  @endforeach
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nouveau_bac as $nouveau)
                  <tr>
                    <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                    <td>{{ $nouveau->phone }}</td>
                    <td>@foreach($nouveau->chambre->immeubles as $chmb)
                    {{ $chmb->name }}
                    @endforeach
                    : <span>{{ $nouveau->chambre->nom }}</span>
                    </td>
                    @if($nouveau->immeuble_rec > 0)
                    <td>
                      @foreach($immeubles as $immb)
                        @if($immb->id == $nouveau->immeuble_rec)
                        {{ $immb->name }}
                        @endif
                      @endforeach
                    </td>
                    @endif
                    <td class="text-center">
                    @if($nouveau->codifier == 1 && $nouveau->recasement == 2)
                      <span class="text-success">Deja Recaser</span> 
                      @elseif($nouveau->codifier == 1 && $nouveau->recasement == 1)
                      <span class="pull-right"><a class="btn btn-success btn-xs text-center mr-3" href="{{ route ('admin.recasement.show',$nouveau->id) }}">Recaser <i class="fa fa-edit"></i></a></span>
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
                  <th>Recaser A</th>
                  @foreach($nouveau_bac as $ancien)
                  @if($ancien->immeuble_rec > 0)
                  <th>Immeuble Choisi</th>
                  @endif
                  @endforeach
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