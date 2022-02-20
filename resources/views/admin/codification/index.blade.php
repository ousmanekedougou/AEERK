@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

<!-- <style>
    table{
            width: 100%;
            border-collapse: collapse;
        }
       
        th,td{
            padding: 10px;
            text-align: left;
            border: solid 1px #ccc;
        }
        th{background-color: #000;color: #fff;}

        tr:nth-child(odd){background-color: #eee;}
        @media only screen and (max-width:700px) {
            .responsive-table table,
            .responsive-table thead,
            .responsive-table tbody,
            .responsive-table tr,
            .responsive-table th,
            .responsive-table td{
                display: block;
            }
            .responsive-table td{padding-left: 150px;
            position: relative;
            margin-top: -1px;
            background-color: #fff;
            }
            .responsive-table td:nth-child(odd){background-color: #eee;}
            .responsive-table td::before{
                content: attr(data-label);
                position: absolute;
                top: 0;
                left: 0;
                width: 130px;
                bottom: 0;
                background-color: #000;color: #fff;
                display: flex;
                align-items: center;
                padding: 10px;
                font-weight: bold;
            }
            .responsive-table tr{
                margin-bottom:1rem ;
            }
            .responsive-table thead{display: none;}
            .responsive-table  th + td {
                padding-left: 10px;
            }
            .responsive-table  th + td{
                display: none;
            }
        }
</style> -->
@endsection

  @section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
          <div class="">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <div class="text-right">
                    <form id="migration_nouveau" method="get" action="{{ route('admin.migret_nouveau') }}" style="display:none">
                      
                    </form>
                    <a class="btn btn-primary" onclick="
                      if(confirm('Etes vous sure de vouloire migret tous les etudiants ?')){

                      event.preventDefault();document.getElementById('migration_nouveau').submit();

                      }else{

                        event.preventDefault();

                      }
                      
                      "><i class="fa fa-share"> Migration des etudiants</i></a></div>
              </div>
            <!-- /.box-header -->
            <div class="">
              <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table id="example1" class="table text-center table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Image</th>
                        <th>Prenom et nom</th>
                        <th>Telephone</th>
                        <th>Codifier A</th>
                        <th>Plce</th>
                        <th>Prix</th>
                        <th>Methode</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($nouveau_bac as $nouveau)
                        <tr>
                          <td><img src="{{ Storage::url($nouveau->image) }}" style="width:60px;height:auto;" alt="" srcset=""></td>
                          <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                          <td>{{ $nouveau->phone }}</td>
                          <td>
                            @foreach($nouveau->chambre->immeubles as $ac_imb)
                            {{$ac_imb->name}} : 
                            @endforeach
                            {{$nouveau->chambre->nom }}</td>
                          <td>
                            @if($nouveau->position == 1)
                              {{ $nouveau->position }} ere
                            @else 
                              {{ $nouveau->position }} em
                            @endif
                          </td>
                          <td>{{ $nouveau->prix }}</td>
                          <td>{{ $nouveau->payment_methode }}</td>
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
                        <th>Place</th>
                      </tr>
                      </tfoot>
                    </table>
                  {{-- <span class="pull-rigth"> {{ $nouveau_bac->links() }}</span> --}}
                  </div>

                </div>
                <!-- /.tab-content -->
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

        <!-- /.col -->

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
      'autoWidth'   : true
    })
  })

    // document.addEventListener('DOMContentLoaded',function(){
    //     document.querySelectorAll('.responsive-table').forEach(function(table){
    //         let labels = Array.from(table.querySelectorAll('th')).map(function(th){
    //             return th.innerText
    //         })
    //         table.querySelectorAll('td').forEach(function(td, i){
    //             td.setAttribute('data-label', labels[i % labels.length])
    //         })
    //     })
    // })
</script>

@endsection