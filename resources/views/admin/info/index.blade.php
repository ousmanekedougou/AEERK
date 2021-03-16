@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <section class="content-header">
        <div class="box-header">
          Vos infos
          @if($infos->count() < 1)
          <a class="col-lg-offset-5 btn btn-primary pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-infos">Ajouter Vos Infos</a>
            <!-- Default box -->
            @endif
        </div>
      </section><br>
      <div class="box-body">
        <table id="example2" class="table text-center table-bordered table-hover">
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
          <tfoot>
          <tr>
          <tr class="bg-primary"> 
          <th>Email</th>
            <th>Phone</th>
            <th>Adresse</th>
            <th>Boite Postal</th>
            <th>Fax</th>
            <th>Option</th>
          </tr>
          </tfoot>
        </table>
      </div>




      <div class="box-body">
        <section class="content-header">
          <div class="box-header">
            <a class="col-lg-offset-5 pull-right btn btn-primary" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-reaseu-add">Ajouter un Reseau</a>
            Reseaux Sociaux
          </div>
        </section><br>
        <table id="example2" class="table text-center  table-bordered table-hover">
          <thead>
          <tr class="bg-primary">
            <th>Image</th>
            <th>Nom</th>
            <th>Lien</th>
            <th>Option</th>
          </tr>
          </thead>
          <tbody>
          @foreach($social_reseau as $social)
          <tr>
            <td>
            @if( $social->name == 'facebook' )
            <span > <i style="font-size:30px;color:blue;"class=" fa fa-facebook"></i> </span>
            @elseif($social->name == 'whatsapp')
            <span> <i style="font-size:30px;color:green;" class=" fa fa-whatsapp"></i> </span>
            @elseif($social->name == 'youtube')
            <span> <i style="font-size:30px;color:red;" class=" fa fa-youtube-play"></i> </span>
            @elseif($social->name == 'twitter')
            <span> <i style="font-size:30px;color:blue;" class=" fa fa-twitter"></i> </span>
            @elseif($social->name == 'instagram')
            <span> <i style="font-size:30px;color:red ;" class=" fa fa-instagram"></i> </span>
            @endif
            </td> 
            <td>{{ $social->name }}</td>
            <td><a href="{{ $social->lien }}">{{ $social->lien }}</a></td>
            <td class="">   
            <form id="delete-form-{{$social->id}}" action="{{ route('admin.social.destroy',$social->id) }}" method="post" style="display:none;">
                @csrf
                {{ method_field('DELETE') }}
              </form>
              <a data-toggle="modal" data-id="{{$social->id}}" data-name="{{$social->name}}" data-target="#modal-default-social-update{{ $social->id }}"><i class="glyphicon glyphicon-edit"></i></a>
              <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce reseau')){ event.preventDefault();document.getElementById('delete-form-{{$social->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.social.update',$social->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
          <tr class="bg-primary">
          <th>Image</th>
            <th>Nom</th>
            <th>Lien</th>
            <th>Option</th>
          </tr>
          </tfoot>
        </table>
      </div>

      <div class="row">
        <section class="content-header">
          <div class="box-header">
            <a class="col-lg-offset-5 pull-right btn btn-primary" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-add-partener">Ajouter un Partenaire</a>
            <h3>Vos Partenaires</h3>
          </div>
        </section>
        <br>
          @foreach($partener as $part)
            <div class="col-lg-4">
              <!-- Attachment -->
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="{{ Storage::url($part->image) }}" alt="Attachment Image">

                <div class="attachment-pushed text-center">
                  <h4 class="attachment-heading"><a href="http://www.lipsum.com/">{{ $part->nom }}</a></h4>

                  <div class="attachment-text">
                    <p><a href="{{ $part->lien }}">{{ $part->lien }}</a></p>
                    <p>
                      <form id="delete-form-{{$part->id}}" action="{{ route('admin.partener.destroy',$part->id) }}" method="post" style="display:none;">
                        @csrf
                        {{ method_field('DELETE') }}
                      </form>
                      <a data-toggle="modal" data-id="{{$part->id}}" data-name="{{$part->name}}" data-target="#modal-default-update-partener-{{$part->id}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                      <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce Partenaire')){ event.preventDefault();document.getElementById('delete-form-{{$part->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.partener.update',$part->id) }}" class="btn btn-danger btn-xs"><i class=" glyphicon glyphicon-trash"></i> Supprimer</a>
                    </p>
                  </div>
                  <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
              </div>
              <!-- /.attachment-block -->
            </div>
          @endforeach
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
        <table id="example2" class="table text-center table-bordered table-hover">
          <thead>
          <tr class="bg-primary">
            <th>Pix Codification Nouveau</th>
            <th>Pix Codification Ancien</th>
            <th>Numero Codification Ancien</th>
            <th>Numero Codification Ancien</th>
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
      @if($soldes->count() < 1)
      <a class="col-lg-offset-5 btn btn-primary pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-solde">Ajouter Vos Prix</a>
        <!-- Default box -->
        @endif
    </div>
  </section><br>
  <table id="example2" class="table text-center table-bordered table-hover">
    <thead>
    <tr class="bg-primary">
      <th>Email</th>
      <th>Utilite</th>
      <th>Option</th>
    </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $autorisation->email }} f</td>
          <td> text</td>
          <td class="">   
            <a data-toggle="modal" data-id="{{$autorisation->id}}" data-name="{{$autorisation->name}}" data-target="#modal-default-edit-autorisation-{{ $autorisation->id }}"><i class="glyphicon glyphicon-edit"></i></a>
          </td>
        </tr>
    </tbody>
   
  </table>
</div>
{{-- Fin de la partie de la page codification --}}


{{-- La parite des lies d'affichage pour la page d'acceuil --}}
    <div class="box-body">
      <section class="content-header">
          <h1>Gestion de vos liens</h1>
          <div class="box-header">
          @if($soldes->count() < 1)
          <a class="col-lg-offset-5 btn btn-primary pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-solde">Ajouter Vos Prix</a>
              <!-- Default box -->
              @endif
          </div>
      </section><br>
      <table id="example2" class="table text-center table-bordered table-hover">
          <thead>
          <tr class="bg-primary">
          <th>Inscription</th>
          <th> Liens Inscription </th>
          <th>Inscription Recasement</th>
          <th>Codification</th>
          <th> Liens Codification </th>
          <th>Recasement</th>
          </tr>
          </thead>
          <tbody>
          @foreach($options as $option)
              <tr>
              <!-- Le td du register -->
                <td>
                @if($option->register == 1)
                  <form id="register_etudiant_1" method="post" action="{{ route('admin.register',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="register">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('register_etudiant_1').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->register == 0)
                  <form id="register_etudiant_2" method="post" action="{{ route('admin.register',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="register">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('register_etudiant_2').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td du register -->
                  <!-- td des liens inscription des nouveaux et ancien -->
                <td>
                @if($option->register_nouveau == 1 && $option->register_ancien == 1)
                  <form id="update_register" method="post" action="{{ route('admin.register_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="inscription_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('update_register').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->register_nouveau == 0 && $option->register_ancien == 0)
                  <form id="update_liens" method="post" action="{{ route('admin.register_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="inscription_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('update_liens').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td inscription des nouveaux et anciens -->

                <!-- td du lien inscription des recasements -->
                <td>
                @if($option->register_recasement == 1)
                  <form id="inscription_recasement_1" method="post" action="{{ route('admin.register_recasement',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="register_recasement">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('inscription_recasement_1').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->register_recasement == 0)
                  <form id="inscription_recasement_2" method="post" action="{{ route('admin.register_recasement',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="register_recasement">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('inscription_recasement_2').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td lien inscription des recasements -->

                  <!-- Le td de la codification -->
                  <td>
                @if($option->codification == 1)
                  <form id="codification" method="post" action="{{ route('admin.codification',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="codification">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('codification').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->codification == 0)
                  <form id="codification_2" method="post" action="{{ route('admin.codification',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="codification">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('codification_2').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td de la codification -->

                  <!-- td des liens codification des nouveaux et ancien -->
                  <td>
                @if($option->codification_nouveau == 1 && $option->codification_ancien == 1)
                  <form id="codification_etudiant_1" method="post" action="{{ route('admin.codification_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="codification_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('codification_etudiant_1').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->codification_nouveau == 0 && $option->codification_ancien == 0)
                  <form id="codification_etudiant_2" method="post" action="{{ route('admin.codification_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="codification_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('codification_etudiant_2').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td codification des nouveaux et anciens -->


                <!-- td du lien  des recasements -->
                <td>
                @if($option->recasement == 1)
                  <form id="recasement_1" method="post" action="{{ route('admin.recasement_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="0" name="recasement_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure de cacher ce lien ?')){

                  event.preventDefault();document.getElementById('recasement_1').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-danger btn-sm" ><i class="fa fa-edit"></i> Desactiver </a> 

                  @elseif($option->recasement == 0)
                  <form id="recasement_2" method="post" action="{{ route('admin.recasement_etudiant',$option->id) }}" style="display:none">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input type="hidden" value="1" name="recasement_etudiant">
                  </form>
                  <a href="" onclick="
                  if(confirm('Etes vous sure d\'afficher ce lien ?')){

                  event.preventDefault();document.getElementById('recasement_2').submit();

                  }else{

                      event.preventDefault();

                  }
                  
                  " class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Activer </a> 
                  @endif
                </td>
                <!-- Fin du td lien  des recasements -->

              </tr>
          @endforeach
      
      </table>
    </div>
{{-- Fin des liens d'affichage pour la page d'acceuil --}}




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


<!-- Modal de l'ajout et de l'eddition des reseau -->

      <div class="modal fade" id="modal-default-reaseu-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un reseau</h4>
              </div>
              <form action="{{ route('admin.social.store') }}" method="post">
              @csrf
              <div class="modal-body">

                <p>
                <label for="name">Nom du Reseau</label>
                <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Lien du Reseau</label>
                <input type="text"  value="{{ old('lien')}}" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" placeholder="">
                  @error('lien')
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


    @foreach($social_reseau as $social_modal)
      <div class="modal fade" id="modal-default-social-update{{ $social_modal->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre Reseau</h4>
              </div>
              <form action="{{ route('admin.social.update',$social_modal->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">

                <p>
                <label for="name">Nom du Reseau</label>
                <input type="text"  value="{{ old('name') ?? $social_modal->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Lien du Reseau</label>
                <input type="text"  value="{{ old('lien') ?? $social_modal->lien }}" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" placeholder="">
                  @error('lien')
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
    @endforeach
<!-- Fin des modal d'ajout et d'eddition des reseau -->



      <!-- Modal D'ajout et d'eddition des partenaires -->
      <div class="modal fade" id="modal-default-add-partener">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un Partenaire</h4>
              </div>
              <form action="{{ route('admin.partener.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">

                <p>
                <label for="name">Nom de votre Parteanaire</label>
                <input type="text"  value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Lien du Partenaire</label>
                <input type="text"  value="{{ old('lien')}}" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" placeholder="">
                  @error('lien')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                  <div class="row">
                    <div class="col-sm-6">
                      <p>
                      <label for="image">Image ou logo </label>
                        <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                    <div class="col-sm-6">
                      <p>
                      <label for="date">Date du partenariat</label>
                        <input type="date"  value="{{ old('date')}}" class="@error('date') is-invalid @enderror form-control" id="date" name="date" placeholder="">
                        @error('date')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                  </div>
                </p>

                <p>
                <label for="mot">Mot du Partenaire</label>
                <textarea class="textarea" style="width: 100%;"  cols="30" rows="10" value="{{ old('mot')}}" class="form-control @error('mot') is-invalid @enderror" id="mot" name="mot" placeholder=""></textarea>
                  @error('mot')
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



    @foreach($partener as $part_modal)
      <div class="modal fade" id="modal-default-update-partener-{{$part_modal->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre Partenaire</h4>
              </div>
              <form action="{{ route('admin.partener.update',$part_modal->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <label for="name">Nom de votre Parteanaire</label>
                <input type="text"  value="{{ old('name') ?? $part_modal->nom}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="lien">Lien du Partenaire</label>
                <input type="text"  value="{{ old('lien') ?? $part_modal->lien}}" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" placeholder="">
                  @error('lien')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                  <div class="row">
                    <div class="col-sm-6">
                      <p>
                      <label for="image">Image ou logo </label>
                        <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror " id="image" name="image" placeholder="">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                    <div class="col-sm-6">
                      <p>
                      <label for="date">Date du partenariat</label>
                        <input type="date"  value="{{ old('date')}}" class="@error('date') is-invalid @enderror form-control" id="date" name="date" placeholder="">
                        @error('date')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
                  </div>
                </p>

                <p>
                <label for="mot">Mot du Partenaire</label>
                <textarea style="width: 100%;" class="textarea"  cols="30" rows="10" value="{{ old('mot')}}" class="form-control @error('mot') is-invalid @enderror" id="mot" name="mot" placeholder="">{{ $part_modal->mot }}</textarea>
                  @error('mot')
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
    @endforeach
<!-- Fin des ajouts et des edditions des partenaires -->



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

        <p>
        <label for="name">email</label>
        <input type="email"  value="{{ old('email') ?? $autorisation->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
          @enderror
        </p>

        <p>
          <label for="bp">Mot de passe</label>
          <input type="password"  value="{{ old('password') }}" class=" form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
              </span>
            @enderror
          </p>

          <p>
            <label for="bp">Confirmer votre mot de passe</label>
            <input type="password"  value="{{ old('password') }}" class=" form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation" placeholder="">
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