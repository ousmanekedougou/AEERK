@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de board
        <small>Votre lieu de travail</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Information des services</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

              <!-- debu du row -->
              <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label for="libele">Nom de l'activite</label>
                    <input type="text" name='libale' class="form-control" id="exampleInputEmail1" placeholder="Le nom de votre service">
                  </div>

                  <div class="form-group">
                    <label for="date">Categorie</label>
                        <select name="" id="" class="form-control">
                          <option value="">Culture</option>
                          <option value="">Politique</option>
                          <option value="">Sport</option>
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="heure">Tags</label>
                    <select name="" id="" class="form-control">
                          <option value="">Danse</option>
                          <option value="">Campagne</option>
                          <option value="">Combat de lutte</option>
                        </select>
                  </div>

               </div>

                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="image">Image du service</label>
                      <input type="file" name="icon" id="exampleInputFile">
                    </div>
                <br><br>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="status"> Publier
                      </label>
                    </div>
                  </div>
              </div>
              <!-- fin du row -->

              </div>
              <!-- /.box-body -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Description de votre service
                <small>Simple et bref</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea class="textarea" name="description" placeholder=""
                          style="width: 100%; height: 280px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
          </div>


              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Enregistrer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->



          


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