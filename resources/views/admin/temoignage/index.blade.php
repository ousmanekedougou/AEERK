@extends('admin.layouts.app')


@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
   

              <div class="box-body">
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 0)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid silver;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding: 20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                    <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>
                                        <!-- <a data-toggle="modal" data-id="{{$temoignage->id}}" data-name="{{$temoignage->title}}" data-target="#modal-default-chambre-{{ $temoignage->id }}" style="margin-right:5px;"><i class="fa fa-eye btn btn-warning btn-xs card-link">  </i></a>
                                    
                                        <a href="{{ route('admin.temoignage.edit',$temoignage->id) }}" style="margin-right:5px;"><i class="card-link fa fa-edit btn btn-primary btn-xs"> </i></a> -->
                                        <form  id="update-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.update',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('PATCH')}}
                                          <input type="hidden" name="status" value="1">
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de d\'aprouver ce temoignage ?')){  event.preventDefault();document.getElementById('update-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-edit btn btn-success card-link btn-xs"> Aprouver </i>
                                        </a>

                                        <form  id="update-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.update',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('PATCH')}}
                                          <input type="hidden" name="status" value="2">
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de desprouver ce temoignage ?')){  event.preventDefault();document.getElementById('update-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-edit btn btn-info card-link btn-xs"> Desaprouver </i>
                                        </a>

                                        <form  id="delete-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.destroy',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('delete')}}
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de supprimer cette article ?')){  event.preventDefault();document.getElementById('delete-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-trash btn btn-danger card-link btn-xs"> Supprimer </i>
                                        </a>
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
                  <h4 class="btn btn-success">Temoignages aprouver</h4>
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 1)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid green;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding:20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                  <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>
                                        <!-- <a data-toggle="modal" data-id="{{$temoignage->id}}" data-name="{{$temoignage->title}}" data-target="#modal-default-chambre-{{ $temoignage->id }}" style="margin-right:5px;"><i class="fa fa-eye btn btn-warning btn-xs card-link">  </i></a>
                                    
                                        <a href="{{ route('admin.temoignage.edit',$temoignage->id) }}" style="margin-right:5px;"><i class="card-link fa fa-edit btn btn-primary btn-xs"> </i></a> -->
                                        <form  id="update-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.update',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('PATCH')}}
                                          <input type="hidden" name="status" value="2">
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure desapprover ce temoignage ?')){  event.preventDefault();document.getElementById('update-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-edit btn btn-info card-link btn-xs"> Desaprouver </i>
                                        </a>

                                        <form  id="delete-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.destroy',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('delete')}}
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de supprimer cette article ?')){  event.preventDefault();document.getElementById('delete-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-trash btn btn-danger card-link btn-xs"> Supprimer </i>
                                        </a>
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
                  <h4 class="btn btn-danger">Temoignages desaprouver</h4>
                <div class="row" style="margin-top: 10px;">
                  @foreach($temoignages as $temoignage)
                    @if($temoignage->status == 2)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <div class="card mb-3" style="width:100%;border:1px solid red;border-radius:5px;padding:5px">
                            <div class="row g-0" style="padding: 20px;">
                                <h5 class="card-title text-bold text-sm">Prenom et nom : {{ $temoignage->nom }}</h5>
                                <h5 class="card-title text-bold text-sm">E-mail : {{ $temoignage->email }}</h5>
                                <div class="card-body">
                                  <p class="card-text text-bold text-md">Temoignage :</p>
                                  <p class="card-text">
                                    <div class="text-muted text-center">
                                    <p class="card-text text-muted text-justify"> {!! $temoignage->message !!}</p>
                                        <!-- <a data-toggle="modal" data-id="{{$temoignage->id}}" data-name="{{$temoignage->title}}" data-target="#modal-default-chambre-{{ $temoignage->id }}" style="margin-right:5px;"><i class="fa fa-eye btn btn-warning btn-xs card-link">  </i></a>
                                    
                                        <a href="{{ route('admin.temoignage.edit',$temoignage->id) }}" style="margin-right:5px;"><i class="card-link fa fa-edit btn btn-primary btn-xs"> </i></a> -->
                                    
                                        <form  id="update-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.update',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('PATCH')}}
                                          <input type="hidden" name="status" value="1">
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de d\'approuver ce temoignage ?')){  event.preventDefault();document.getElementById('update-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-edit btn btn-success card-link btn-xs"> Approuver </i>
                                        </a>

                                        <form  id="delete-form-{{$temoignage->id}}" method="post" action="{{ route('admin.temoignage.destroy',$temoignage->id) }}"  style="display:none">
                                          {{csrf_field()}}
                                          {{method_field('delete')}}
                                        </form>
                                        <a  href="" onclick=" if(confirm('Etes Vous sure de supprimer cette article ?')){  event.preventDefault();document.getElementById('delete-form-{{$temoignage->id}}').submit();
              
                                          }else{event.preventDefault();} "><i class="fa fa-trash btn btn-danger card-link btn-xs"> Supprimer </i>
                                        </a>
                                      
                                    </div>
                                  </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
              </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




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


