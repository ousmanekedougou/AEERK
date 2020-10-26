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
                  @foreach($ancien_bac as $ancien)
                  @if($ancien->immeuble_rec > 0)
                  <th>Immeuble Choisi</th>
                  @endif
                  @endforeach
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ancien_bac as $ancien)
                  <tr>
                    <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                    <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                    <td>{{ $ancien->phone }}</td>
                    <td>@foreach($ancien->chambre->immeubles as $chmb)
                    <span>{{ $chmb->name }} </span>
                    @endforeach
                    : <span> {{ $ancien->chambre->nom }}</span>
                    </td>
                    @if($ancien->immeuble_rec > 0)
                    <td>
                      @foreach($immeubles as $immb)
                        @if($immb->id == $ancien->immeuble_rec)
                        {{ $immb->name }}
                        @endif
                      @endforeach
                    </td>
                    @endif
                    <td class="text-center">
                    @if($ancien->codifier == 1 && $ancien->recasement == 2)
                      <span class="text-success">Deja Recaser</span> 
                      @elseif($ancien->codifier == 1 && $ancien->recasement == 1)
                      <span class="pull-right"><a class="btn btn-success btn-xs text-center mr-3" href="{{ route ('admin.recasement.edit',$ancien->id) }}">Recaser <i class="fa fa-edit"></i></a></span>
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
                  <th>Recaser A</th>
                  @foreach($ancien_bac as $ancien)
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