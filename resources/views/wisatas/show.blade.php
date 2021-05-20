@extends('wisatas.layout')

@section('title')
    <title>Detail Wisata</title>
@endsection

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-secondary">
                    <div class="card-header bg-secondary text-light">
                        <h4>Wisata {{ $wisatad->nama }}</h4>
                    </div>

                    <div class="card-header">
                        <img src="{{asset('storage/wisatas/'. $wisatad->gambar) }}" width="700px" height="500px" class="img-fluid mx-auto d-block rounded">
                    </div>
                    
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <h5 class="text-secondary"><strong>Nama</strong></h5>
                                <p>{{ $wisatad->nama }}</p>
                                <hr>
                                <h5 class="text-secondary"><strong>Lokasi</strong></h5>
                                <p>{{ $wisatad->lokasi }}</p>
                                <hr>
                                <h5 class="text-secondary"><strong>Deskripsi</strong></h5>
                                <p>{{ $wisatad->deskripsi }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection