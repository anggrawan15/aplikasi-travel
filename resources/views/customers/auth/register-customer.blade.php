@extends('customers.auth.layout-login');

@section('title')
    <title>Halaman Registrasi Customer</title>
    
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card border-secondary">

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                
                <div class="card-header bg-dark text-light">Register</div>

                <div class="card-body">
                    <form action="{{ route('customer.register') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>  
                        <div class="form-group">
                            <label for="no_tlp">No Telpone</label>
                            <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}" required>
                            <p class="text-danger">{{ $errors->first('no_tlp') }}</p>
                        </div> 
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat"required>{{ old('alamat') }}</textarea>
                            <p class="text-danger">{{ $errors->first('alamat') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div> 
                        <div class="form-group">
                            <label for="password2">Password Confirm</label>
                            <input type="password" name="password2" class="form-control" value="{{ old('password2') }}" required>
                            <p class="text-danger">{{ $errors->first('password2') }}</p>
                        </div>   
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection