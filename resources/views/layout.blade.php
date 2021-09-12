<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--ICONS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Comtrade 2021</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images\comtrade_app.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
            {{__('home.title')}}
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('home.login')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="signup" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('home.email')}}</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@mail.com">
                            <small style="color: red">@error('email'){{$message}}@enderror</small>
                            <small id="emailHelp" class="form-text text-muted">{{__('home.smallMessage')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('home.password')}}</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="{{__('home.password')}}">
                            <small style="color: red">@error('password'){{$message}}@enderror</small>
                        </div>    
                        <button type="submit" class="btn btn-primary">{{__('home.login')}}</button>         
                    </form>
                </div>
                </div>
            </div>
        </div>

        @if (Session::get('loggedUser'))
        <h4 style="color: white">{{session('loggedUser')}}</h4>
        @endif

        <div class="btn-group pr-5" role="group" aria-label="Button group with nested dropdown">        
        <!-- Button trigger modal -->
        @if (!Session::get('loggedUser'))
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-sign-in"></i> {{__('home.login')}}
        </button> 
        @else
        <a type="button" class="btn btn-danger" href="/logout">
            <i class="fa fa-sign-out"></i> {{__('home.logout')}}
        </a> 
        @endif  
        
        <div class="btn-group" role="group">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-globe"></i> {{__('home.lang')}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/en"><span class="flag-icon flag-icon-gb"></span> English</a>
                <a class="dropdown-item" href="/ba"><span class="flag-icon flag-icon-ba"></span> Bos/Hrv/Srp</a>
                <a class="dropdown-item" href="/si"><span class="flag-icon flag-icon-si"></span> Slovenski</a>
            </div>
        </div>
        </div>
        
    </nav> 
    <div class="container mt-2">
        @yield('content')
    </div>
</body>
</html>