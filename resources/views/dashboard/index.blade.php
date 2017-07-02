<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Template for Bootstrap</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  </head>

  <body>

  @include('dashboard.topmenu')

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        @include('dashboard.navbar')
        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @include('dashboard.content')
        </div>

      </div>
    </div>

    <!-- Bootstrap core JavaScript -->


    <script src="{{ asset('js/app.js') }}"></script>


  </body>
</html>
