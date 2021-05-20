<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>
   
    
    @yield('title')
    <link rel="icon" href="{{ asset('icon/icon1.png') }}">

</head>
<body>
<div class="mb-5">
<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('icon/icon1.png') }}" width="90" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin.index')}}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wisata.index')}}" class="nav-link">Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hotel.index')}}" class="nav-link">Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resto.index')}}" class="nav-link">Restoran</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paket.index')}}" class="nav-link">Paket</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <strong>
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </a>
                        </strong>
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

@yield('js')
    
    
    
</body>
    
</html>
