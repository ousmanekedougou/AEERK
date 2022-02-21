<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">

    <div class="wrapper">
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')



        @section('main-content')
        @show




    @include('admin.modals.personel')
    @include('admin.modals.logement')
    @include('admin.modals.disigne')
    @include('admin.layouts.footer')

    </div>

</body>
</html>