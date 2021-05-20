@extends('pakets.layout')

@section('title')
    <title>Detail Resto</title>
@endsection

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-secondary">
                <div class="card-header bg-secondary text-light">
                    <h3>Paket {{ $paketd->nama }}</h3>
                </div>
                    <div class="card-header ">
                        <img src="{{asset('storage/pakets/'. $paketd->gambar) }}" width="700px" height="500px" class="img-fluid mx-auto d-block rounded">
                    </div>
                    <div class="card-body">

                        <!-- <div class="row justify-content-center"> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-secondary"><strong>Nama</strong></h6>
                                            <p>{{ $paketd->nama }}</p>
                                            <hr>
                                            <h6 class="text-secondary"><strong>Jumlah Minimal Orang</strong></h6>
                                            <p>{{ $paketd->min }} Orang</p>
                                            <hr>
                                            <h6 class="text-secondary"><strong>Jumlah Maximal Orang</strong></h6>
                                            <p>{{ $paketd->max }} Orang</p>
                                            <hr>
                                            <h6 class="text-secondary"><strong>Harga/Orang</strong></h6>
                                            <p>Rp {{ number_format($paketd->harga)}}/Orang</p>
                                            <hr>
                                            <a href="{{ route('order.index', $paketd->id )}}"class="btn btn-primary">Pesan Sekarang!</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-secondary"><strong>Wisata</strong></h6>
                                            @foreach($paketd->wisataItem as $row)
                                            <p>{{ $row->wisata->nama}}
                                            <!-- <a href="{{route('wisata.detail', $row->wisata_id) }}" class="btn btn-outline-info btn-sm text-right">lihat</a></p> -->
                                            <hr>
                                            @endforeach

                                            <h6 class="text-secondary"><strong>Hotel</strong></h6>
                                            @foreach($paketd->hotelItem as $row)
                                            <hr>
                                            <p>{{ $row->hotel->nama}}
                                            <!-- <a href="{{route('hotel.detail', $row->hotel_id) }}" class="btn btn-outline-info btn-sm text-right">lihat</a></p> -->
                                            @endforeach

                                            <h6 class="text-secondary"><strong>Restoran</strong></h6>
                                            @foreach($paketd->restoItem as $row)
                                            <hr>
                                            <p>{{ $row->resto->nama}}
                                            <!-- <a href="{{route('resto.detail', $row->resto_id) }}" class="btn btn-outline-info btn-sm text-right">lihat</a></p> -->
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            </div>
                        <!-- </div> -->
                    
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection