@extends('hotels.admin.layout-admin')

@section('title')
    <title>Detail Data Hotel</title>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- bagian card -->
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="card-title text-light">
                        Hotel {{ $hotel->nama}}
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning btn-sm float-right">Ubah</a>
                    </h4>
                    
                </div>
            
                <div class="card-header">
                <img src="{{ asset('storage/hotels/' . $hotel->gambar) }}" class="mx-auto d-block" width="700px" height="500px">
                </div>
                <!-- bagian card body -->
                <div class=card-body> 
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <h5 class="text-secondary"><strong>Nama</strong></h5>
                            <p>{{ $hotel->nama }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Lokasi</strong></h5>
                            <p>{{ $hotel->lokasi }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Deskripsi</strong></h5>
                            <p>{{ $hotel->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                <!-- bagian card body -->
            </div>
            <!-- bagian card -->
        </div>
    </div>
</div>


@endsection