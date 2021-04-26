@extends('admin.layouts.app')


@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('main-content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>
                    Read Mail
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Mailbox</li>
                </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                    <div class="col-md-3">
                    <a href="" class="btn btn-primary btn-block margin-bottom">Compose</a>

                    <div class="box box-solid">
                        <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                            <span class="label label-primary pull-right">12</span></a></li>
                            <li><a href="{{ route('admin.contact.edit',$show_contact->id) }}"><i class="fa fa-envelope-o"></i> Repondre</a></li>
                            <li><a href="{{ route('admin.contact.index') }}"><i class="fa fa-reply"></i> Retoure</a></li>
                        </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                    <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Read Mail</h3>

                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>Objet : {{ $show_contact->subject }}</h3>
                            <h5>From: {{ $show_contact->email }}
                            <span class="mailbox-read-time pull-right">{{ $show_contact->created_at->toFormattedDateString() }} PM</span></h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                <i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                                <i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                                <i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                            <i class="fa fa-print"></i></button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p>Hello John,</p>

                            <p>{{ $show_contact->message }}</p>

                         

                            <p>Merci,<br>{{ $show_contact->nom }}</p>
                        </div>
                        <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{ route('admin.contact.index') }}" class=""><i class="fa fa-reply btn btn-xs btn-warning"> Retoure</i> </a>
                            <form id="delete-form-{{$show_contact->id}}" method="post" action="{{ route('admin.contact.destroy',$show_contact->id) }}" style="display:none">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            </form>
                            <a href="" onclick="
                                if(confirm('Etes vous sure de vouloire supprimer ce message ?')){

                                event.preventDefault();document.getElementById('delete-form-{{$show_contact->id}}').submit();

                                }else{

                                event.preventDefault();

                                }
                                
                                "><i class="fa fa-trash btn btn-danger btn-xs"> Supprimer</i></a>
                        </div>

                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
        </div>

@endsection


@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection