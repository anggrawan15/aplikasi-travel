<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
   
    <link rel="icon" href="{{ asset('icon/icon1.png') }}">
    @yield('title')
    

</head>
<body>
<div class="mb-5">
<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('icon/icon1.png') }}" width="90" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</div>

    

<br>
    
    
@yield('content')

    
    
<br>
<div class="container">
    
</div>




    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>
    
    
    
</body>
    
</html>