<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reminder</title>

    <!--Bootstrap4-->
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <style>
    .card-body{
        font-size: 15px;
    }

    .type {
    padding: 2px 4px;
    outline: 0;
    border: 0px;
    background: transparent;
    font-size: 20px;
    width:80%;
    }

    .card-text{
      margin-top: -10px;
    }

    </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/reminder/index') }}">
          Reminder
          </a>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Practice2019</a>
                </li>
        </ul>
    </div>
</nav>

    <div>
        @yield('content')
    </div>
</body>
</html>
