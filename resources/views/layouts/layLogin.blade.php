<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>

    @yield('title')
</head>
<body>

<div class="mb-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('icon/icon1.png') }}" alt="" width="90" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>
<br>
<br>

@yield('content')





    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>   
</body>
</html>