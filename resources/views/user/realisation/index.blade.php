@extends('user.app.app',['title' => 'realisation'])
 @section('bg-img',asset('user/img/home-bg.jpg'))
 @section('title','Clean Blog')
@section('sub-heding','Bootstrap Template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-up:hover{
        color:red;
    }
  </style>
@endsection
 @section('main-content')

 
 @endsection

 @section('js')
<script src=" {{ asset('js/app.js') }} "></script>
 @endsection

