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
        <a class="col-lg-offset-5 btn btn-warning pull-right"data-toggle="modal" data-id="infos" data-name="infos" data-target="#modal-default-ajouter-infos">Ajouter Vos Infos</a>
          <!-- Default box -->
          @endif
      </div>
    </section><br>
            <div class="box-body">
              <table id="example2" class="table text-center table-bordered table-hover">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($infos as $info)
                <tr>
                  <td>{{ $info->email }}</td>
                  <td>{{ $info->phone }}</td>
                  <td>{{ $info->adresse }}</td>
                  <td>{{ $info->bp }}</td>
                  <td>{{ $info->fax }}</td>
                  <td class="">   
                    <a data-toggle="modal" data-id="{{$info->id}}" data-name="{{$info->name}}" data-target="#modal-default-edit-info{{ $info->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>Email</th>
                  <th>Phone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>




           <div class="box-body">
            <section class="content-header">
              <div class="box-header">
            <a class="col-lg-offset-5 pull-right btn btn-warning" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-reaseu-add">Ajouter un Reseau</a>
                Reseaux Sociaux
            </div>
            </section><br>
              <table id="example2" class="table text-center  table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Nom</th>
                  <th>Lien</th>
                  <th class="text-success">Option</th>
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
                <tr>
                <th>Image</th>
                  <th>Nom</th>
                  <th>Lien</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>

            <div class="row">
            <section class="content-header">
              <div class="box-header">
                <a class="col-lg-offset-5 pull-right btn btn-warning" data-toggle="modal" data-id="add-immeuble" data-name="add-immeuble" data-target="#modal-default-add-partener">Ajouter un Partenaire</a>
                <h3>Vos Partenaires</h3>
              </div>
              </section>
              <br>
                @foreach($partener as $part)
                  <div class="col-lg-4">
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                      <img class="attachment-img" src="{{ Storage::url($part->image) }}" alt="Attachment Image">

                      <div class="attachment-pushed">
                        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">{{ $part->nom }}</a></h4>

                        <div class="attachment-text">
                          <p><a href="{{ $part->lien }}">{{ $part->lien }}</a></p>
                          <p>
                          <form id="delete-form-{{$part->id}}" action="{{ route('admin.partener.destroy',$part->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a data-toggle="modal" data-id="{{$part->id}}" data-name="{{$part->name}}" data-target="#modal-default-update-partener-{{$part->id}}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce Partenaire')){ event.preventDefault();document.getElementById('delete-form-{{$part->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.partener.update',$part->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
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
    @foreach($infos as $info_modal)
      <div class="modal fade" id="modal-default-edit-info{{ $info_modal->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer votre info</h4>
              </div>
              <form action="{{ route('admin.info.update',$info_modal->id) }}" method="post">
              @csrf
              {{method_field('PUT')}}
              <div class="modal-body">

                <p>
                <label for="name">email</label>
                <input type="email"  value="{{ old('email') ?? $info_modal->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Phone</label>
                <input type="number"  value="{{ old('phone') ?? $info_modal->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="addresse">Addresse </label>
                <input type="text"  value="{{ old('adresse') ?? $info_modal->adresse}}" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" placeholder="">
                  @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <p>
                <label for="bp">Boite Postale</label>
                <input type="text"  value="{{ old('bp') ?? $info_modal->bp}}" class=" form-control @error('bp') is-invalid @enderror" id="bp" name="bp" placeholder="">
                  @error('bp')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="fax">Fax</label>
                <input type="text"  value="{{ old('fax') ?? $info_modal->fax}}" class=" form-control @error('fax') is-invalid @enderror" id="fax" name="fax" placeholder="">
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
    @endforeach
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
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
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
                <label for="addresse">Lien du Partenaire</label>
                <input type="text"  value="{{ old('lien') ?? $part_modal->lien}}" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" placeholder="">
                  @error('lien')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <input type="file"  value="{{ old('image')}}" class="@error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
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
<!-- Fin des ajouts et des edditions dea partenaires -->

@endsection