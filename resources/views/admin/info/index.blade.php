@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/dist/css/table.css') }}">
@endsection
@section('main-content')




     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <section class="content-header">
        <div class="box-header">
          <h3>Vos infos</h3>
          @if($infos->count() < 1)
          <a class="col-lg-offset-5 btn btn-primary pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-infos">Ajouter Vos Infos</a>
            <!-- Default box -->
            @endif
        </div>
      </section>
      <div class="box-body">
        <table id="example2" class="table text-center responsive-table table-bordered table-hover">
          <thead>
          <tr class="bg-primary">
            <th>Email</th>
            <th>Phone</th>
            <th>Adresse</th>
            <th>Boite Postal</th>
            <th>Fax</th>
            <th>Option</th>
          </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $infos->email }}</td>
                <td>{{ $infos->phone }}</td>
                <td>{{ $infos->adresse }}</td>
                <td>{{ $infos->bp }}</td>
                <td>{{ $infos->fax }}</td>
                <td class="">   
                  <a data-toggle="modal" data-id="{{$infos->id}}" data-name="{{$infos->name}}" data-target="#modal-default-edit-infos{{ $infos->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>


{{-- la partie des numero et prix de codification --}}
      <div class="box-body">
        <section class="content-header">
            <h1>Vos Prix Et Numero De Codification</h1>
          <div class="box-header">
            @if($soldes->count() < 1)
            <a class="col-lg-offset-5 btn btn-primary pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-solde">Ajouter Vos Prix</a>
              <!-- Default box -->
              @endif
          </div>
        </section><br>
        <table id="example2" class="table text-center responsive-table table-bordered table-hover">
          <thead>
          <tr class="bg-primary">
            <th>Prix Nouveau</th>
            <th>Prix Ancien</th>
            <th>Numero Ancien</th>
            <th>Numero Ancien</th>
            <th>Option</th>
          </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $soldes->prix_nouveau }} f</td>
                <td>{{ $soldes->prix_ancien }} f</td>
                <td>{{ $soldes->numero_nouveau }} </td>
                <td>{{ $soldes->numero_ancien }} </td>
                <td class="">   
                  <a data-toggle="modal" data-id="{{$soldes->id}}" data-name="{{$soldes->name}}" data-target="#modal-default-edit-soldes{{ $soldes->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
              </tr>
          </tbody>
         
        </table>
      </div>
{{-- Fin de la partie des numeros et prix de codifications --}}


{{-- La partie des autorisation de la page codification --}}
<div class="box-body">
  <section class="content-header">
      <h1>Le Mail et Mot de passe Pour la codification</h1>
    <div class="box-header">
    </div>
  </section><br>
  <table id="example2" class="table text-center responsive-table table-bordered table-hover">
    <thead>
    <tr class="bg-primary">
      <th>Email connexion</th>
      <th>Email d'envoi</th>
      <th>Options</th>
    </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $autorisation->email }}</td>
          <td> {{ $autorisation->sendmail }}</td>
          <td class="">   
            <a data-toggle="modal" data-id="{{$autorisation->id}}" data-name="{{$autorisation->name}}" data-target="#modal-default-edit-autorisation-{{ $autorisation->id }}"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-toggle="modal" data-id="modal-default-migraion" data-name="modal-default-migraion" data-target="#modal-default-migraion-{{ $autorisation->id }}" style="margin-left: 20px;"><i class="glyphicon glyphicon-link"></i></a>
              <div class="modal fade" id="modal-default-migraion-{{ $autorisation->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Autorisation de codification cote etudiant</h4>
                    </div>
                    <form action="{{ route('admin.autorisation',$autorisation->id) }}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="modal-body">
                      <p>
                        <input type="hidden" name="option" value="2">
                        <div class="row">
                          <div class="checkbox">
                            <div class="col-lg-6">
                            <label class="col-form-label text-md-right" for="role"> 
                              <input type="radio" name="lien" value="{{ old('lien') ?? 1 }}" class="@error('lien') is-invalid @enderror" id="lien" @if($autorisation->lien == 1) checked @endif > Activer le lien de codification </label>
                            </div>
                            <div class="col-lg-6">
                            <label class="col-form-label text-md-right" for="role"> 
                              <input type="radio" name="lien" value="{{ old('lien') ?? 2 }}" class="@error('lien') is-invalid @enderror" id="lien" @if($autorisation->lien == 2) checked @endif > Desactiver le lien de codification </label>
                            </div>
                          </div>
                      </div>
                            @error('lien')
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
          </td>
        </tr>
    </tbody>
   
  </table>
</div>
{{-- Fin de la partie de la page codification --}}




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  


  


<!-- Modal de l'ajout  des infos -->
      <div class="modal fade" id="modal-default-ajouter-infos">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre info</h4>
              </div>
              <form action="{{ route('admin.info.store')}}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <label for="name">email</label>
                <input type="email"  value="{{ old('email')  }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Phone</label>
                <input type="number"  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Addresse </label>
                <input type="text"  value="{{ old('adresse')}}" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" placeholder="">
                  @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                <label for="bp">Boite Postale</label>
                <input type="text"  value="{{ old('bp') }}" class=" form-control @error('bp') is-invalid @enderror" id="bp" name="bp" placeholder="">
                  @error('bp')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="fax">Fax</label>
                <input type="text"  value="{{ old('fax') }}" class=" form-control @error('fax') is-invalid @enderror" id="fax" name="fax" placeholder="">
                  @error('fax')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
<!-- fin de l'ajout des infos -->



<!-- Modal de l'eddition des infos -->
      <div class="modal fade" id="modal-default-edit-infos{{ $infos->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre info</h4>
              </div>
              <form action="{{ route('admin.info.update',$infos->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">

                <p>
                <label for="name">email</label>
                <input type="email"  value="{{ old('email') ?? $infos->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Phone</label>
                <input type="number"  value="{{ old('phone') ?? $infos->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Addresse </label>
                <input type="text"  value="{{ old('adresse') ?? $infos->adresse}}" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" placeholder="">
                  @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                <label for="bp">Boite Postale</label>
                <input type="text"  value="{{ old('bp') ?? $infos->bp}}" class=" form-control @error('bp') is-invalid @enderror" id="bp" name="bp" placeholder="">
                  @error('bp')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="fax">Fax</label>
                <input type="text"  value="{{ old('fax') ?? $infos->fax}}" class=" form-control @error('fax') is-invalid @enderror" id="fax" name="fax" placeholder="">
                  @error('fax')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
<!-- fin del'eddition des infos -->








        <!-- Modal d'ajout des soldes -->
        <div class="modal fade" id="modal-default-ajouter-solde">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer vos Solde</h4>
              </div>
              <form action="{{ route('admin.add_prix') }}" method="post">
              @csrf
              <div class="modal-body">

                <p>
                <label for="prix_n">Prix Nouveau</label>
                <input type="number"  value="old('prix_n')" class="form-control @error('prix_n') is-invalid @enderror" id="prix_n" name="prix_n" placeholder="">
                  @error('prix_n')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="prix_a">Prix Ancien</label>
                <input type="number"  value="old('prix_a') " class="form-control @error('prix_a') is-invalid @enderror" id="prix_a" name="prix_a" placeholder="">
                  @error('prix_a')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>


                <p>
                <label for="numero_n">Numero de Codification Nouveau</label>
                <input type="number"  value="old('numero_n') " class="form-control @error('numero_n') is-invalid @enderror" id="numero_n" name="numero_n" placeholder="">
                  @error('numero_n')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>


                <p>
                <label for="numero_a">Numero de Codification Ancien</label>
                <input type="number"  value="old('numero_a') " class="form-control @error('numero_a') is-invalid @enderror" id="numero_a" name="numero_a" placeholder="">
                  @error('numero_a')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Fin du modal d'ajout des solde -->



<!-- Modal du update des soldes -->
      <div class="modal fade" id="modal-default-edit-soldes{{ $soldes->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer vos Soldes</h4>
              </div>
              <form action="{{ route('admin.solde',$soldes->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">

                <p>
                <label for="prix_n">Prix Nouveau</label>
                <input type="number"  value="{{ old('prix_n') ?? $soldes->prix_nouveau }}" class="form-control @error('prix_n') is-invalid @enderror" id="prix_n" name="prix_n" placeholder="">
                  @error('prix_n')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="prix_a">Prix Ancien</label>
                <input type="number"  value="{{ old('prix_a') ?? $soldes->prix_ancien }}" class="form-control @error('prix_a') is-invalid @enderror" id="prix_a" name="prix_a" placeholder="">
                  @error('prix_a')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="numero_n">Numero De Codification Nouveau</label>
                <input type="number"  value="{{ old('numero_n') ?? $soldes->numero_nouveau }}" class="form-control @error('numero_n') is-invalid @enderror" id="numero_n" name="numero_n" placeholder="">
                  @error('numero_n')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="numero_a">Numero De Codification Ancien</label>
                <input type="number"  value="{{ old('numero_a') ?? $soldes->numero_ancien }}" class="form-control @error('numero_a') is-invalid @enderror" id="numero_a" name="numero_a" placeholder="">
                  @error('numero_a')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
<!-- Fin du modal update  des soldes -->


{{-- la partie des autorisation de codification --}}
<div class="modal fade" id="modal-default-edit-autorisation-{{ $autorisation->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editer l'autorisation</h4>
      </div>
      <form action="{{ route('admin.autorisation',$autorisation->id) }}" method="post">
      @csrf
      {{method_field('PUT')}}
      <div class="modal-body">
        <input type="hidden" name="option" value="1">
        <p>
        <label for="name">email connexion</label>
        <input type="email"  value="{{ old('email') ?? $autorisation->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
          @enderror
        </p>

          <p>
        <label for="name">email d'envoi</label>
        <input type="email"  value="{{ old('sendmail') ?? $autorisation->sendmail }}" class="form-control @error('sendmail') is-invalid @enderror" id="sendmail" name="sendmail" placeholder="">
          @error('sendmail')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
          @enderror
        </p>

        <p>
          <label for="bp">Mot de passe</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
              </span>
            @enderror
          </p>

          <p>
            <label for="bp">Confirmer votre mot de passe</label>
            <input type="password" class=" form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation" placeholder="">
            </p>
       
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- Fin de la partie des codification --}}

@endsection

@section('footersection')
<script src="{{ asset('admin/dist/js/table.js') }}"></script>
@endsection