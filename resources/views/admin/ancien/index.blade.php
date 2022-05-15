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

      <!-- Default box -->
      <div class="">
            <span class="btn btn-primary">Liste D'inscription Des Anciens</span>
                @if($ancien_sms->count() == $ancienCount->count())
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
                              <form action="{{ route('admin.ancien.sendSms') }}" method="POST">
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
                  <th>Immeuble Choisi</th>
                  <th>Niveau</th>
                  <th>Voire</th>
                  <th>Traitement</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ancien_bac as $ancien)
                  <tr>
                    <td><img class="img-thumbnail" src="{{ Storage::url($ancien->image) }}" style="width:45px;height:45px;border-radius:100%;" alt="" srcset=""></td>
                    <td>{{ $ancien->prenom .' '.$ancien->nom }}</td>
                    <td>{{ $ancien->phone }}</td>
                    <td>
                      @if($ancien->codification_count == 1)
                        Licence 1
                      @elseif($ancien->codification_count == 2)
                        Licence 2
                      @elseif($ancien->codification_count == 3)
                        Licence 3
                      @elseif($ancien->codification_count == 4)
                        Masters 1
                      @elseif($ancien->codification_count == 5)
                        Masters 2
                      @endif
                    </td>
                    <td>{{ $ancien->immeuble->name }}</td>
                    <td><a href="{{ route ('admin.ancien.show',$ancien->id) }}"><span class="btn btn-warning btn-xs">Voire</span></a></td>
                    </td>
                    <td>
                      @if($ancien->status == 0)
                        <span class="btn btn-primary btn-xs"> <i class=""></i> Non Consulter</span>
                      @elseif($ancien->status == 1) 
                        <span class="btn btn-success btn-xs"> <i class="fa fa-check-square-o"></i> Valider</span>
                      @elseif($ancien->status == 2) 
                        <span class="btn btn-danger btn-xs"> <i class="fa  fa-times-circle"></i> Non Valider</span>
                      @endif
                    </td>
                    <td>
                      @if($ancien->status == 1)
                      <!-- <span class=""><a class="btn btn-success btn-xs text-center" href="{{ route ('admin.ancien.edit',$ancien->id) }}">Codifier <i class="fa fa-edit"></i></a></span> -->
                      <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$ancien->id}}" data-name="{{$ancien->name}}" data-target="#modal-default-edit-ancien{{ $ancien->id }}">Codifier <i class="fa fa-edit"></i></a></a>
                      @else 
                        <a class="btn btn-danger btn-xs text-center" 
                      data-toggle="modal" data-target="#modal-default-{{$ancien->id}}"><i class="fa fa-trash"> Supprimer</i></a></span>
                      <div class="modal fade" id="modal-default-{{$ancien->id}}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Suppression d'un etudiant</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                                Etes vous sure de voloire supprimer {{$ancien->prenom}} {{$ancien->nom}}
                              </p>
                            <form action="{{ route('admin.ancien.destroy',$ancien->id) }}" method="post" style="display:none;">
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
              {{-- {{$ancien_bac->links()}} --}}
            </div>
            </div>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal pour La codification des anciens -->
    @foreach($ancien_bac as $ancien)
      <div class="modal fade" id="modal-default-edit-ancien{{ $ancien->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Codifier Cet Etudiant</h4>
              </div>
              <div class="row">
                      <div class="col-sm-4 p-5">
                      <img class="profile-user-img img-responsive" style="width:100%;margin-top:10px;margin-left:1px;" src="{{ Storage::url($ancien->image) }}" alt="User profile picture">
                      </div>
                      <div class="col-sm-8 text-justify">
                        <h3 class="profile-username">{{ $ancien->prenom.' '.$ancien->nom }}</h3>
                        <p><b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $ancien->email }}</a></p>
                        <p><b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $ancien->phone }}</a></p>
                        <p> <b><i class="fa fa-map-marker"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $ancien->commune->name }}</a></p>
                        <p>  <b><i class="fa fa-building"></i></b>  <a class="pull-center text-muted text-bold tex-italic"> {{ $ancien->immeuble->name }}</a></p>
                      </div>
              </div>
              @foreach($immeubles as $imb) 
                @if($imb->id == $ancien->immeuble->id)
                  <form action="{{ route('admin.codifier_ancien',$ancien->id) }}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="modal-body text-center">
                      <p class="text-center">
                      <h3 class="text-center">{{ $ancien->immeuble->name }}</h3>
                        @if($ancien->immeuble->is_pleine == 0)
                          <span class="btn btn-success btn-xs text-bold">Place disponible un lit </span>
                        @else
                          <span class="btn btn-warning btn-xs text-bold">Place disponible par terre</span>
                          <a data-toggle="modal" class="btn btn-success btn-xs text-center" data-id="{{$ancien->id}}" data-name="{{$ancien->name}}" data-target="#modal-update-immeuble-{{ $ancien->id }}">Changer immeuble <i class="fa fa-edit"></i></a></a>
                        @endif
                      {{--<input type="hidden" name="immeuble" value="{{ $immeubles->id }}">--}}
                        {{--
                        <div class="form-group">
                          <label>Chambres</label>
                          <select value="{{ old('chambre_id') }}" class="form-control @error('chambre_id') is-invalid @enderror" name="chambre_id" style="width: 100%;">
                            @foreach($imb->chambres  as $chm)
                              @if($ancien->genre == $chm->genre)
                                @if($chm->is_pleine == 0)
                                  <option value="{{$chm->id}}">{{$chm->nom}}</option>
                                @endif
                              @endif
                            @endforeach
                          
                          </select>
                          @error('chambre_id')
                            <span class="invalid-feedback" role="alert">
                              <strong class="message_error text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      --}}
                      </p>

                      <button type="submit" class="btn btn-primary btn-block">Enregistre la codification</button>
                    </div>
                  </form>
                @endif
              @endforeach
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
<!-- Fin du modal pour la codification des anciens -->

 <!-- Le formulaire de changement d'immeuble -->
    @foreach($ancien_bac as $ancien)
      <div class="modal fade" id="modal-update-immeuble-{{ $ancien->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
                <form action="{{ route('admin.ancien.update_immeuble',$ancien->id) }}" method="post">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-body text-center">
                      <h3 class="modal-title">{{ $ancien->immeuble->name }}</h3>
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