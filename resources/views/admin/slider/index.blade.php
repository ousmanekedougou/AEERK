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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Information Personelle</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Adresse Email</th>
                  <th>Numero Telephone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Numero Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>email@gmail.com</td>
                  <td>778694687</td>
                  <td>Medina</td>
                  <td> 0000000</td>
                  <td>0000000</td>
                  <td class="text-center">   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-warning">
                    Modifier
              </button></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                <th>Adresse Email</th>
                  <th>Numero Telephone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Numero Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>


          </div>
          <!-- /.box -->



          <!-- la partie des partenaire -->


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistre vos image slid</h3>
            </div>
            <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
            <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-8 border-right">
                  <div class="description-block">
                    <h5 class="description-header text-primary">image</h5>
                    <!-- <span class="description-text">SALES</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header text-success"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-editer_part">E</button></h5>
                    <!-- <span class="description-text">FOLLOWERS</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2">
                  <div class="description-block">
                    <h5 class="description-header text-danger"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="">S</button></h5>
                    <!-- <span class="description-text">PRODUCTS</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          </div>
          <!-- /.widget-user -->
        </div>
            </div>


          </div>


          <!-- fin de la partie des partenaire -->

        

     
          <!-- la partie des image gallerie -->


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistre vos image gallerie</h3>
            </div>
            <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
            <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-default">
            
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-8 border-right">
                  <div class="description-block">
                    <h5 class="description-header text-primary">image1</h5>
                    <!-- <span class="description-text">SALES</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header text-success"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-editer_part">E</button></h5>
                    <!-- <span class="description-text">FOLLOWERS</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2">
                  <div class="description-block">
                    <h5 class="description-header text-danger"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="">S</button></h5>
                    <!-- <span class="description-text">PRODUCTS</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          </div>
          <!-- /.widget-user -->
        </div>
            </div>


          </div>


          <!-- fin de la partie des images gallerie -->



  




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