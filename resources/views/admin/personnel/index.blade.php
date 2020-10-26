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
              <div class="pull-right">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_personnel">Ajouter un personnelle</button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- debut du body -->
            <div class="box-body">
           <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>email</th>
                  <th>Telephone</th>
                  <th>Status</th>
                  <th>Commission</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>image</td>
                  <td>Ousmane Diallo</td>
                  <td> email@gmail.com</td>
                  <td>778694687</td>
                  <td>President</td>
                  <td>Pedagogique</td>
                  <td class="">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit_personnel">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#sup_personnel">
                    <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Prenom et nom</th>
                  <th>email</th>
                  <th>Telephone</th>
                  <th>Status</th>
                  <th>Commission</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <!-- fin du ody -->


          </div>


        <!-- Fin des Personnel de l'Aeerk -->



  <!-- ____________________________________________________________________________________ -->
    <!-- ajouter un personnelle -->

    <div class="modal modal-primary fade" id="add_personnel">
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
                <form role="form" action="{{ route('admin.personnel.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
              <div class="row">
              <div class="col-lg-6">

              <div class="form-group">
                    <label for="adress">Nom et Prenom</label>
                    <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>

                <div class="form-group">
                    <label for="email">Adresse E-mail</label>
                    <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
               </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="pone">Numero de Telephone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>
                
                  <div class="form-group">
                      <label for="boit">image</label>
                      <input type="file" name="image"  id="exampleInputFile" placeholder="">
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
                      <label class="" for="poste"> <input type="radio" name="poste" value="{{$com_poste->id }}" id=""> {{ $com_poste->name }} </label>
                    @endforeach
                </div>
                  @endforeach
              </div>

              </div>
              <!-- /.box-body -->


                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Enregistrer</button>
                <button type="reset" class="btn btn-outline">Annuller</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
        </form>
          <!-- /.modal-dialog -->
  </div>
    <!-- fin de l'ajout de personnelle -->


    <!-- editer un personnelle -->


 <div class="modal modal-primary fade" id="edit_personnel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modifier votre Personnelle</h4>
              </div>
              <div class="modal-body">
                <p>

                <form role="form">
              <div class="box-body">

              <!-- debu du row -->
              <div class="row">
              <div class="col-lg-6">

              <div class="form-group">
                    <label for="adress">Nom et Prenom</label>
                    <input type="text" name="adress" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>

                <div class="form-group">
                    <label for="email">Adresse E-mail</label>
                    <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="pone">Numero de Telephone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>

                  <div class="checkbox">
                      <label>
                        <input type="checkbox" name="status"> Publier
                      </label>
                    </div>

               </div>

                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="boit">Status</label>
                      <input type="text" name="boit" class="form-control" id="exampleInputPassword1" placeholder="">
                    </div>
                    
                    <div class="form-group">
                      <label for="fax">Commission</label>
                      <select name="" class="form-control" id="">
                        <option value="">Commision Social</option>
                        <option value="">Commision Pedagogique</option>
                        <option value="">Commision Culturelle</option>
                        <option value="">Commision Sportive</option>
                      </select>
                    </div>
                <br>
                <div class="form-group">
                      <label for="boit">image</label>
                      <input type="file" name="boit"  id="exampleInputFile" placeholder="">
                    </div>
                  </div>
              </div>
              <!-- fin du row -->

              </div>
              <!-- /.box-body -->


                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Enregistrer</button>
                <button type="reset" class="btn btn-outline">Annuller</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
        </form>
          <!-- /.modal-dialog -->
  </div>

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