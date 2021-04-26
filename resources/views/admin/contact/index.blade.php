@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
       <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
            Mailbox
            <small>{{ $contact_all->count() }} nouveaux messages</small>
          </h1>
      </section>
      

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12 ">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="{{ route('admin.contact.create') }}" class="btn btn-primary btn-block margin-bottom">Creer un message groupe</a></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($contact_all  as $contac)
                    @if($contac->count() > 0)
                    <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a  onclick="document.getElementById('update-form-{{$contac->id}}').submit();">{{ $contac->nom }}</a></td>
                    <td class="mailbox-subject"> Objet : <b> {{ $contac->subject }}</b> | message...
                    </td>
                    <td class="mailbox-attachment">
                    <form id="update-form-{{$contac->id}}" method="post" action="{{ route('admin.contact.update',$contac->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    </form>  
                    <a onclick="document.getElementById('update-form-{{$contac->id}}').submit();"> <i class="fa fa-eye btn btn-warning btn-xs"> Lire</i> </a></td>

                    <td>
                      @if($contac->status == 1)
                      <span class="text-success">Message Lu</span>
                      @else 
                      <span class="text-primary">Message Non Lu</span>
                      @endif
                    </td>
                
                    <td class="mailbox-date">Depuis    le {{ $contac->created_at->toFormattedDateString() }}</td>
                  </tr>
                  @else 
                    <tr><td><h1 class="text-primary">Il n'y a pas de message</h1></td></tr>
                  @endif
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
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