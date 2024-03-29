@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection
@section('main-content')




     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      
      <section class="content">
        <!-- La partie des inscriptions -->
        <div class="">
          <span class="btn btn-primary btn-block">Liste D'inscription Des Nouveaux Bacheliers</span>
          <br>
            @if($nouveau_sms->count() == $nouveauCount->count())
              <span class="etudiant_migration"  style="float:right;">
                <a class="btn btn-success" data-toggle="modal" data-target="#modal-default-migraion"><i class="fa fa-envelope-square"> Message</i></a>
                  <div class="modal fade" id="modal-default-migraion">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Envoyer un sms </h4>
                        </div>
                        <form action="{{ route('admin.nouveau.sendSms') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                          <p>
                            <div class="row">
                              <div class="checkbox">
                                <div class="col-lg-6">
                                <label class="col-form-label text-md-right" for="role"> <input type="radio" name="sms" value="{{ old('sms') ?? 1}}" class="@error('sms') is-invalid @enderror" id="sms"> Information de la verification des documents </label>
                                </div>
                                <div class="col-lg-6">
                                <label class="col-form-label text-md-right" for="role"> <input type="radio" name="sms" value="{{ old('sms') ?? 2}}" class="@error('sms') is-invalid @enderror" id="sms"> Information de la date des codifcations </label>
                                </div>
                              </div>
                          </div>
                                @error('sms')
                                  <span class="invalid-feedback text-center text-danger" role="alert">
                                      <strong class="message_error">{{ $message }}</strong>
                                  </span>
                                @enderror
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-primary">Enmvoyer le message</button>
                        </div>
                      </div>
                      </form>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
              
                  </div>
              </span>
            @endif
            <br><br>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table id="example1" class="table text-center responsive-table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Image</th>
                        <th>Prenom et nom</th>
                        <th>Telephone</th>
                        <th>Niveau</th>
                        <th>Voire</th>
                        <th>Traitement</th>
                        <th>Options</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($nouveau_bac as $nouveau)
                        <tr>
                          <td><img class="img-thumbnail" src="{{ Storage::url($nouveau->image) }}" style="width:45px;height:45px;border-radius:100%;" alt="" srcset=""></td>
                          <td>{{ $nouveau->prenom .' '.$nouveau->nom }}</td>
                          <td>{{ $nouveau->phone }}</td>
                          <td>
                            @if($nouveau->codification_count == 1)
                              Licence 1
                            @endif
                          </td>
                            <td><a href="{{ route ('admin.nouveau.show',$nouveau->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                            </td>
                          <td>
                            @if($nouveau->status == 0)
                              <span class="btn btn-primary btn-xs"> <i class=""></i> Non Consulter</span>
                            @elseif($nouveau->status == 1) 
                              <span class="btn btn-success btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                            @elseif($nouveau->status == 2) 
                              <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                            @endif
                          </td>
                          <td>
                            @if($nouveau->status == 1)
                            <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$nouveau->id}}" data-name="{{$nouveau->name}}" data-target="#modal-default-edit-nouveau{{ $nouveau->id }}">Codifier <i class="fa fa-edit"></i></a></a>
                            @else
                            <span class="">
                            <a class="btn btn-danger btn-xs text-center" 
                            data-toggle="modal" data-target="#modal-default-{{$nouveau->id}}"><i class="fa fa-trash"> Supprimer</i></a></span>
                            <div class="modal fade" id="modal-default-{{$nouveau->id}}">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Suppression d'un etudiant</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                      Etes vous sure de voloire supprimer cet etudiant
                                    </p>
                                  <form action="{{ route('admin.nouveau.destroy',$nouveau->id) }}" method="post" style="display:none;">
                                    @csrf
                                    {{ method_field('DELETE') }}
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
                            @endif
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {{-- {{ $nouveau_bac->links() }} --}}
                  </div>
                </div>
              </div>
            </div>
          
          <!-- /.box-body -->
        </div>
        <!-- Fin de la partie des inscriptions -->

      </section>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


<!-- Modal du update des soldes -->
    
    @foreach($nouveau_bac as $nouveau)
      <div class="modal fade" id="modal-default-edit-nouveau{{ $nouveau->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Codifier Cet Etudiant</h4>
              </div>
              <div class="row">
                      <div class="col-sm-4 p-5">
                      <img class="profile-user-img img-responsive" style="width:100%;margin-top:10px;margin-left:1px;" src="{{ Storage::url($nouveau->image) }}" alt="User profile picture">
                      </div>
                      <div class="col-sm-8 text-justify">
                        <h3 class="profile-username">{{ $nouveau->prenom.' '.$nouveau->nom }}</h3>
                        <p><b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $nouveau->email }}</a></p>
                        <p><b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $nouveau->phone }}</a></p>
                        <p> <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $nouveau->commune->name }}</a></p>
                        <p>  <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $nouveau->immeuble->name }}</a></p>
                      </div>
              </div>
                <form action="{{ route('admin.codifier_nouveau',$nouveau->id) }}" method="post">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-body text-center">
                    <p>
                    <h3 class="text-center">{{ $nouveau->immeuble->name }}</h3>
                      @if($nouveau->immeuble->is_pleine == 0)
                        <span class="btn btn-success btn-xs text-bold">Place disponible un lit </span>
                      @elseif($nouveau->immeuble->is_pleine == 1)
                        <span class="btn btn-warning btn-xs text-bold">Place disponible par terre</span>
                        <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$nouveau->id}}" data-name="{{$nouveau->name}}" data-target="#modal-update-immeuble-{{ $nouveau->id }}">Changer immeuble <i class="fa fa-edit"></i></a></a>
                      @elseif($nouveau->immeuble->is_pleine == 2)
                        <span class="btn btn-info btn-xs text-bold">Plus de place disponible</span>
                        <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$nouveau->id}}" data-name="{{$nouveau->name}}" data-target="#modal-update-immeuble-{{ $nouveau->id }}">Changer immeuble <i class="fa fa-edit"></i></a></a>
                      @endif
                    </p>

                    <button type="submit" class="btn btn-primary btn-block">Enregistre la codification</button>
                  </div>
                </form>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer La Fenetre</button>
             
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    @endforeach

  <!-- Le formulaire de changement d'immeuble -->
    @foreach($nouveau_bac as $nouveau)
      <div class="modal fade" id="modal-update-immeuble-{{ $nouveau->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
                <form action="{{ route('admin.nouveau.update_immeuble',$nouveau->id) }}" method="post">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-body text-center">
                       <h3 class="modal-title">{{ $nouveau->immeuble->name }}</h3>
                      <span class="btn btn-xs btn-success">Des lits disponible</span>
                      <br>
                    <p style="margin-top: 5px;">
                      <select value="{{ old('update_immeble') }}" class="form-control @error('update_immeble') is-invalid @enderror" name="update_immeble" style="width: 100%;">
                        @foreach($update_immeubles as $update_imb)
                            <option value="{{$update_imb->id}}">{{$update_imb->name}}</option>
                        @endforeach
                      </select>
                    </p>
                    <button type="submit" class="btn btn-primary btn-block">Modifier immeuble</button>
                  </div>
                </form>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer La Fenetre</button>
             
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    @endforeach
    
<!-- Fin du modal update  des soldes -->


@endsection

@section('footersection')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
<script>
 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


@endsection