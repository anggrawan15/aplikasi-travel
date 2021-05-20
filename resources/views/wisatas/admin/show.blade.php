@extends('wisatas.admin.layout-admin')

@section('title')
    <title>Detail Data Wisata</title>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <!-- bagian card -->
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="card-title text-light">
                        Wisata {{ $wisata->nama}}
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm float-right">Ubah</a>
                    </h4>
                </div>
            
                <div class="card-header">
                    <img src="{{ asset('storage/wisatas/' . $wisata->gambar) }}" 
                    class="img-fluid mx-auto d-block" width="700px" height="500px">
                </div>
                <!-- bagian card body -->
                <div class=card-body> 
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <h5 class="text-secondary"><strong>Nama</strong></h5>
                            <p>{{ $wisata->nama }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Lokasi</strong></h5>
                            <p>{{ $wisata->lokasi }}</p>
                            <hr>
                            <h5 class="text-secondary"><strong>Deskripsi</strong></h5>
                            <p>{{ $wisata->deskripsi }}</p>
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