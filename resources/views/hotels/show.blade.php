@extends('hotels.layout')

@section('title')
    <title>Detail Hotel</title>
@endsection

@section('content')
<!-- ini bagian baru -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-secondary">

                    <div class="card-header bg-secondary text-light">
                        <h4>Hotel {{ $hoteld->nama }}</h4>
                    </div>

                    <div class="card-header">
                        <img src="{{asset('storage/hotels/'. $hoteld->gambar) }}" width="700px" height="500px" class="img-fluid mx-auto d-block rounded">
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                            <h5 class="text-secondary"><strong>Nama</strong></h5>
                            <p>{{ $hoteld->nama }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Lokasi</strong></h5>
                            <p>{{ $hoteld->lokasi }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Deskripsi</strong></h5>
                            <p>{{ $hoteld->deskripsi }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection