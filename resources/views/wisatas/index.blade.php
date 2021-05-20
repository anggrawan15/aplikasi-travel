@extends('wisatas.layout')

@section('title')
    <title>Wisata Lombok</title>
@endsection

@section('content')
<br>
<br>
    <div class="container">
        <div class="row">
            @forelse($wisatas as $row)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/wisatas/'. $row->gambar) }}" class="card-img-top" alt="{{ $row->nama}}" height="200px" >
                        <div class="card-body">
                            <h5 class="card-title">{{$row->nama}}</h5>
                            <a href="{{route('wisata.detail', $row->id) }}" class="btn btn-info">Detail</a>
                        </div>
                </div>
                <br>
            </div>
            @empty
                <div class="col-md-12">
                    <h4 class="text-center text-secondary">Tidak Ada Data</h4>
                </div>
            @endforelse
        </div>
    
        
        <div class="row">
            <br>
            <div class="col-md-3">
                {!! $wisatas->links() !!}
            </div>
        </div>

    </div>
@endsection