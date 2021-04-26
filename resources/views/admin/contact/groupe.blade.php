@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row ">
        
        <!-- /.col -->
        <div class="col-md-8 col-sm-offset-2">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Envoyer un Message groupe</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('admin.contact.post') }}" method="post">
              @csrf
              <div class="form-group">
                <input class="form-control" name="subject"  placeholder="Subject:">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="msg" class="form-control" style="height: 300px">
                     
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <div class="btn btn-warning">
                  <a style="color: white;" href="{{ route('admin.contact.index') }}">Retoure</a>
                </div>
                <div class="pull-right">
                  <button type="reset" class="btn btn-default"><i class="fa fa-pencil"></i> Anuller</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Envoyer</button>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            
            </div>
            <!-- /.box-footer -->
          </div>
          </form>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->