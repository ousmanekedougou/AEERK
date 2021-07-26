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
   

              <div class="box-body">
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 0)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid silver;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding: 20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                    <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>

                                        <a  data-toggle="modal" data-target="#modal-default-aprouver_a-{{$temoignage->id}}"><i class="fa fa-check-circle btn btn-success card-link btn-xs"></i>
                                        </a>
                                        <div class="modal fade" id="modal-default-aprouver_a-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire approuver cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.update',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="status" value="1">
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success">Approuver</button>
                                              </div>
                                              </form>
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>

                                        <a  href="" data-toggle="modal" data-target="#modal-default-desaprouver_a-{{$temoignage->id}}"><i class="fa fa-times btn btn-warning card-link btn-xs">  </i>
                                        </a>
                                        <div class="modal fade" id="modal-default-desaprouver_a-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire desapprouver cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.update',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="status" value="2">
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-warning">Desapprouver</button>
                                              </div>
                                              </form>
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>


                                        <a  data-toggle="modal" data-target="#modal-default-supprimer_a-{{$temoignage->id}}"><i class="fa fa-trash btn btn-danger card-link btn-xs">  </i>
                                        </a>
                                        <div class="modal fade" id="modal-default-supprimer_a-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire supprimer cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.destroy',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <input type="hidden" name="status" value="2">
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
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
                  <h4 class="btn btn-success">Temoignages aprouver</h4>
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 1)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid green;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding:20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                  <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>
                                       <a  href="" data-toggle="modal" data-target="#modal-default-desaprouver_b-{{$temoignage->id}}"><i class="fa fa-times btn btn-warning card-link btn-xs">  </i>
                                        </a>
                                        <div class="modal fade" id="modal-default-desaprouver_b-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire desapprouver cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.update',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="status" value="2">
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-warning">Desapprouver</button>
                                              </div>
                                              </form>
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>

                                        <a  data-toggle="modal" data-target="#modal-default-supprimer_b-{{$temoignage->id}}"><i class="fa fa-trash btn btn-danger card-link btn-xs">  </i>
                                        </a>

                                        <div class="modal fade" id="modal-default-supprimer_b-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire supprimer cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.destroy',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <input type="hidden" name="status" value="2">
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
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
                  <h4 class="btn btn-danger">Temoignages desaprouver</h4>
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 2)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid red;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding: 20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                    <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>
                                           <a  data-toggle="modal" data-target="#modal-default-aprouver_b-{{$temoignage->id}}"><i class="fa fa-check-circle btn btn-success card-link btn-xs"></i>
                                        </a>
                                        <div class="modal fade" id="modal-default-aprouver_b-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire approuver cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.update',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <input type="hidden" name="status" value="1">
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success">Approuver</button>
                                              </div>
                                              </form>
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>

                                        <a  data-toggle="modal" data-target="#modal-default-supprimer_c-{{$temoignage->id}}"><i class="fa fa-trash btn btn-danger card-link btn-xs">  </i>
                                        </a>

                                        <div class="modal fade" id="modal-default-supprimer_c-{{$temoignage->id}}">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Approver un temoignage</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  Etes vous sure de voloire supprimer cet temoignage
                                                </p>
                                              <form action="{{ route('admin.temoignage.destroy',$temoignage->id) }}" method="post" style="display:none;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <input type="hidden" name="status" value="2">
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
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
              </div>

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


