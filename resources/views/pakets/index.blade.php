@extends('pakets.layout')

@section('title')
    <title>Paket Travel</title>
@endsection

@section('content')
<br>
<br>
    <div class="container">
        <div class="row">
            @forelse($pakets as $row)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/pakets/'. $row->gambar) }}" class="card-img-top" alt="{{ $row->nama}}" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{$row->nama}}</h5>
                            <a href="{{route('paket.detail', $row->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{route('order.index', $row->id) }}" class="btn btn-warning">Order!</a>
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
                {!! $pakets->links() !!}
            </div>
        </div>
        

    </div>
@endsection