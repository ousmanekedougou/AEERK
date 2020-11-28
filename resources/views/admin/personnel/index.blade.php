@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enregistrer Vos Personnelles
        <!-- <small>Votre lieu de travail</small> -->
      </h1>
      <div class="pull-right">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_personnel">Ajouter un personnelle</button>
              </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

        <!-- Debut des Personnel de l'aeerk -->



        <div class="">
            <div class="box-header with-border">
            <div class="pull-left">
              <h3>Commission Pedagogique</h3>
              </div>
            
            </div>
            <!-- /.box-header -->
            <!-- debut du body -->
            <div class="box-body">
              <div class="row">
                @foreach($teams as $team)
                  <div class="col-lg-4">
                    <!-- Attachment -->
                      <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{ Storage::url($team->image) }}" alt="Attachment Image">

                        <div class="attachment-pushed">
                          <h5 class="attachment-heading">{{ $team->nom }}</h5>

                          <div class="attachment-text">
                            <p> <span>E-mail</span> <span>{{ $team->email }}</span></p>
                            <p> <span>Phone</span> <span>{{ $team->phone }}</span></p>
                            <p> <span>Poste</span>  <span>{{ $team->poste->name }}</span></p>
                          </div>
                          <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                        <div class="pull-left">
                        <a href="" data-toggle="modal" data-id="{{$team->id}}" data-name="{{$team->nom}}" data-target="#edit_personnel-{{ $team->id }}"><i class="fa fa-edit btn btn-info btn-xs"> Modifier</i></a>
                      </div>
                      <div class="pull-right">
                      <form id="delete-form-{{$team->id}}" method="post" action="{{ route('admin.team.destroy',$team->id) }}" style="display:none">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              </form>
                      <a  href="" onclick="
                              if(confirm('Etes Vous sure de supprimer ce personnelle ?')){

                              event.preventDefault();document.getElementById('delete-form-{{$team->id}}').submit();

                              }else{

                                event.preventDefault();

                              }
                              
                              "><i class="fa fa-trash btn btn-danger btn-xs"> Supprimer</i></a>
                      </div>
                      </div>
                    <!-- /.attachment-block -->
                  </div>
                @endforeach
              </div>
            </div>
              <!-- fin du ody -->


          </div>


        <!-- Fin des Personnel de l'Aeerk -->



  <!-- ____________________________________________________________________________________ -->
    <!-- ajouter un personnelle -->

    <div class="modal modal-info fade" id="add_personnel">
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
                <button type="submit" class="btn btn-outline pull-left">Enregistrer</button>
                <button type="reset" class="btn btn-outline">Annuller</button>
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

    <div class="modal modal-info fade" id="edit_personnel-{{ $team->id }}">
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
                        @if($team->poste != Null )
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
                <button type="submit" class="btn btn-outline pull-left">Modifier</button>
                <button type="reset" class="btn btn-outline">Annuller</button>
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