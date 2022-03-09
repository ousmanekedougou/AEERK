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
          <!-- <span class="btn btn-primary btn-block">Liste D'inscription Des Nouveaux Bacheliers</span> -->
          <span class="btn btn-primary btn-block">Page de codification des nouveaux a l'immeuble {{ $immeubles->name }}</span>

          <div class="box-body">
            <form action="{{ route('admin.nouveau.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="margin-right: 10px;">
                      <input type="radio" name="genre" class="flat-red" value="{{ old('genre') ?? 1 }}" class=" @error('genre') is-invalid @enderror">
                      Femme
                    </label>
                    <label style="margin-left: 20px;">
                      <input type="radio" name="genre" class="flat-red" value="{{ old('genre') ?? 2 }}" class=" @error('genre') is-invalid @enderror">
                      Homme
                    </label>
                      @error('genre')
                        <span class="invalid-feedback text-danger" role="alert" style="margin-left: 20px;">
                          <strong class="message_error">{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prenom de l'etudiant</label>
                    <input type="text" name='prenom'  value="{{ old('prenom')  }}" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="nom">Nom de l'etudiant</label>
                    <input type="text" name='nom'  value="{{ old('nom')  }}" class="form-control @error('nom') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email de l'etudiant</label>
                    <input type="email" name='email'  value="{{ old('email')  }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="phone">Numero de telephone</label>
                    <input type="number" name='phone'  value="{{ old('phone')  }}" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="cni">Numero de votre CNI</label>
                    <input type="number" name='cni'  value="{{ old('cni')  }}" class="form-control @error('cni') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('cni')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="commune">La commune de l'etudiant</label>
                    <select  value="{{ old('commune') }}" class="form-control @error('commune') is-invalid @enderror" id="commune" name="commune">
                      @foreach($departement as $dep)
                        <optgroup label="Departement de {{ $dep->name }}">
                          @foreach($dep->communes as $dep_com)
                          <option value="{{ $dep_com->id }}">{{$dep_com->name}}</option>
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                    @error('commune')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="image">Image de l'etudiant</label>
                   <input type="file"  value="{{ old('image')}}" class=" @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error text-danger">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="">
                    <button type="submit" class="btn btn-success btn-block">Enregistrer la codification</button>
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
             
            </form>
          </div>

          {{--
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
          --}}
          <!-- /.box-body -->
        </div>
        <!-- Fin de la partie des inscriptions -->

      </section>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


<!-- Modal du update des soldes -->
    {{--
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
              @foreach($immeubles as $imb) 
                @if($imb->id == $nouveau->immeuble->id)
                  <form action="{{ route('admin.codifier_nouveau',$nouveau->id) }}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="modal-body">
                      <p>
                      <h3 class="text-center">{{ $nouveau->immeuble->name }}</h3>
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
    --}}
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