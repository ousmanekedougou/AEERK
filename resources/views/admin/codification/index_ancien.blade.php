@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

  @section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">

           {{-- <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ancien_bac as $ancien)
                    <tr>
                      <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                      <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                      <td>{{ $ancien->phone }}</td>
                      <td>
                        @foreach($ancien->chambre->immeubles as $ac_imb)
                        {{$ac_imb->name}} : 
                        @endforeach
                        
                        {{$ancien->chambre->nom }}</td>
                      <td>{{ $ancien->prix }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </tfoot>
                </table>
               <span class="pull-rigth"> {{ $ancien_bac->links() }}</span>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>  --}}



          {{-- Afficahge par immeuble --}}

          {{-- @foreach ($immeubles as $imb)
          <span class="btn btn-primary btn-lg">{{ $imb->name }}</span>
          {{ $i = '' }}
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example{{ ++$i }}" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($imb->chambres as $chambre)
                      @foreach ($chambre->anciens as $ancien)
                      <tr>
                        <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                        <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                        <td>{{ $ancien->phone }}</td>
                        <td>
                          {{$ancien->chambre->nom }}</td>
                        <td>{{ $ancien->prix }}</td>
                      </tr>
                      @endforeach
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Codifier A</th>
                    <th>Prix</th>
                  </tr>
                  </tfoot>
                </table>
               <span class="pull-rigth"> {{ $ancien_bac->links() }}</span>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          @endforeach --}}

          {{-- Fin de l'afficahe par immeuble --}}



         
          <p class="btn btn-primary btn-md ">{{ $immeubles->name }}</p>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Chambres</th>
                    <th>Prix</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($immeubles->chambres as $chambre)
                      @foreach ($chambre->anciens as $ancien)
                      @if ($ancien->codifier == 1 && $ancien->prix >= 0)
                      <tr>
                        <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                        <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                        <td>{{ $ancien->phone }}</td>
                        <td>
                          {{$ancien->chambre->nom }}</td>
                        <td>{{ $ancien->prix }}</td>
                      </tr>
                      @endif
                      @endforeach
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Chambres</th>
                    <th>Prix</th>
                  </tr>
                  </tfoot>
                </table>
               {{-- <span class="pull-rigth"> {{ $ancien_bac->links() }}</span> --}}
              </div>

            </div>
            <!-- /.tab-content -->
          </div>



          <p class="btn btn-primary btn-md">{{ $immeuble2->name }}</p>
          <br>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example2" class="table text-center table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Chambres</th>
                    <th>Prix</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($immeuble2->chambres as $chambre)
                      @foreach ($chambre->anciens as $ancien)
                        @if ($ancien->codifier == 1 && $ancien->prix >= 0)
                        <tr>
                          <td><img src="{{ Storage::url($ancien->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                          <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                          <td>{{ $ancien->phone }}</td>
                          <td>
                            {{$ancien->chambre->nom }}</td>
                          <td>{{ $ancien->prix }}</td>
                        </tr>
                        @endif
                      @endforeach
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Prenom et nom</th>
                    <th>Telephone</th>
                    <th>Chambres</th>
                    <th>Prix</th>
                  </tr>
                  </tfoot>
                </table>
               {{-- <span class="pull-rigth"> {{ $ancien_bac->links() }}</span> --}}
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
        

          

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