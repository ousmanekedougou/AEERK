@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enregistrer Vos Personnelles
        <!-- <small>Votre lieu de travail</small> -->
        <button type="button" class="btn pull-right btn-info" data-toggle="modal" data-target="#add_personnel">Ajouter un personnelle</button>
      </h1>
            
    </section>

    <!-- Main content -->
    <section class="content">
              {{-- card normale --}}
              <div class="row">
                @foreach($teams as $team)
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width:100%;height:auto;border:1px solid silver;border-radius:5px;padding:2px">
                      <img src="{{ Storage::url($team->image) }}" style="width: 100%;height:auto;" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-bold text-capitalize text-center">{{ $team->nom }}</h5>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          @foreach($team->poste->commissions as $team_com)
                            Commission :  {{ $team_com->name }}
                          @endforeach
                        </li>
                        <li class="list-group-item">Poste : {{ $team->poste->name }}</li>
                        <li class="list-group-item">Telephone : {{$team->phone}}</li>
                      </ul>
                      <div class="card-body text-center">
                        <a href="" data-toggle="modal" data-id="{{$team->id}}" data-name="{{$team->nom}}" data-target="#edit_personnel-{{ $team->id }}" class="card-link"><i class="fa fa-edit btn btn-info  btn-xs"> Modifier</i></a>
                        <form id="delete-form-{{$team->id}}" method="post" action="{{ route('admin.team.destroy',$team->id) }}" style="display:none">
                          {{csrf_field()}}
                          {{method_field('delete')}}
                          </form>
                  <a  data-toggle="modal" data-target="#modal-default-{{$team->id}}" class="card-link"><i class="fa fa-trash btn btn-danger btn-xs"> Supprimer</i></a>
                      </div>
                    </div>
                  </div>



                  <div class="modal fade" id="modal-default-{{$team->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Suppression de slider</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            Etes vous sure de voloire supprimer ce membre
                          </p>
                        <form action="{{ route('admin.team.destroy',$team->id) }}" method="post" style="display:none;">
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
                @endforeach
              </div>
              {{-- card normale --}}

        <!-- Fin des Personnel de l'Aeerk -->



  <!-- ____________________________________________________________________________________ -->
    <!-- ajouter un personnelle -->

    <div class="modal modal-default fade" id="add_personnel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un personnelle</h4>
              </div>
              <div class="modal-body">
                <p>

              <div class="box-body">

              <!-- debu du row -->
              <div class="row">
                <div class="col-lg-6">
                <form role="form" action="{{route('admin.team.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                    <label for="adress">Nom et Prenom</label>
                    <input type="text" id="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">
                      @error('nom')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                <div class="form-group">
                    <label for="email">Adresse E-mail</label>
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail1" placeholder="">
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
               </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="pone">Numero de Telephone</label>
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                
                  <div class="form-group">
                      <label for="boit">image</label>
                      <input type="file" name="image"  id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required autocomplete="image" id="exampleInputFile" placeholder="">
                      @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>
                </div>
              <!-- fin du row -->
              <div class="row">
                <br>
                <h4>Choisire le poste selon la commission</h4>
                  @foreach($commission as $com)
                <div class="col-lg-3">
                      <label for=""  class="text-white">{{$com->name}}</label>
                      <br>  
                    @foreach($com->postes as $com_poste)
                      <label class="" for="poste"> <input type="radio" name="poste" class="@error('poste') is-invalid @enderror" value="{{$com_poste->id ?? old('image') }}" id=""> {{ $com_poste->name }} </label>
                      @error('poste')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                      @endforeach
                </div>
                  @endforeach
              </div>

              </div>
              <!-- /.box-body -->


                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Enregistrer</button>
                <button type="reset" class="btn btn-default">Annuller</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>
    <!-- fin de l'ajout de personnelle -->


    <!-- editer un personnelle -->

    @foreach($teams as $team)

    <div class="modal modal-default fade" id="edit_personnel-{{ $team->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modifiere Votre Personnelle</h4>
              </div>
              <div class="modal-body">
                <p>

              <div class="box-body">

              <!-- debu du row -->
              <div class="row">
                <div class="col-lg-6">
                <form role="form" action="{{route('admin.team.update',$team->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
              <div class="form-group">
                    <label for="adress">Nom et Prenom</label>
                    <input type="text" id="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $team->nom ?? old('nom') }}" autocomplete="nom">
                      @error('nom')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                <div class="form-group">
                    <label for="email">Adresse E-mail</label>
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" value="{{$team->email ?? old('email') }}" autocomplete="email" id="exampleInputEmail1" placeholder="">
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
               </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="pone">Numero de Telephone</label>
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $team->phone ?? old('phone') }}" autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                
                  <div class="form-group">
                      <label for="boit">image</label>
                      <input type="file" name="image"  id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" autocomplete="image" id="exampleInputFile" placeholder="">
                      @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>
                </div>
              <!-- fin du row -->
              <div class="row">
                <br>
                <h4>Choisire le poste selon la commission</h4>
                  @foreach($commission as $com)
                <div class="col-lg-3">
                      <label for=""  class="text-white">{{$com->name}}</label>
                      <br>  
                    @foreach($com->postes as $com_poste)
                      <label class="" for="poste"> <input type="radio" name="poste" class="@error('poste') is-invalid @enderror" value="{{$com_poste->id ?? old('image') }}" id=""  
                       
                        @if($team->poste->id == $com_poste->id )
                          checked 
                        @endif
                        
                      > {{ $com_poste->name }} </label>
                      @error('poste')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                      @endforeach
                </div>
                  @endforeach
              </div>

              </div>
              <!-- /.box-body -->


                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Modifier</button>
                <button type="reset" class="btn btn-default">Annuller</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>
    @endforeach

    <!-- fin de l'edition des personnelle -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->