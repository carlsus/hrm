
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>InTech Network | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.css')
    <style>
        body {
         background: url('./../img/bg.jpeg') no-repeat center center fixed;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
        }

        .card-default {
         opacity: 0.8;
         margin-top:30px;
        }
        .form-group.last {
         margin-bottom:0px;
        }
    </style>

</head>

<body>
    @yield('content')
</body>
@include('layouts.scripts')
</html>

