@extends('orders.layout')

@section('title')
    <title>Cart Order</title>
@endsection

@section('content')
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card border-secondary">
                    <div class="card-header">
                    <h3 class=card-title>
                        Cart Pemesanan Paket
                    </h3>
                        
                    </div>
                        <div class="card-body">

                            <div class="row">
                            @forelse($list as $row)
                                <div class="col-md-6">
                                    <div class="card">
                                        <!-- atas -->
                                            <div class="card-body">
                                                <h6 class="text-secondary"><strong>Id Pemesan</strong></h6>
                                                <p>{{ $row['customer_id'] }}</p>
                                                <hr>
                                                <h6 class="text-secondary"><strong>Nama Pemesan</strong></h6>
                                                <p>{{ $row['customer_nama'] }}</p>
                                                <hr>
                                                <h6 class="text-secondary"><strong>Email</strong></h6>
                                                <p>{{ $row['customer_email'] }}</p>
                                                <hr>
                                                <h6 class="text-secondary"><strong>Alamat</strong></h6>
                                                <p>{{ $row['customer_alamat'] }}</p>
                                                <hr>
                                                <h6 class="text-secondary"><strong>No Telephone</strong></h6>
                                                <p>{{ $row['customer_notlp'] }}</p>
                                                <hr>
                                            </div>
                                        <!-- bawah -->
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card">
                                    <!-- atas -->
                                        <div class="card-body">
                                            <h6 class="text-secondary"><strong>Invoice</strong></h6>
                                            <p>{{$row['invoice']}}</p>
                                            <hr>

                                            <h6 class="text-secondary"><strong>Nama Paket</strong></h6>
                                            <p>{{$row['paket_nama']}}</p>
                                            <hr>

                                            <h6 class="text-secondary"><strong>Jumlah Touris</strong></h6>
                                            <p>{{$row['jumlah']}}</p>
                                            <hr>

                                            <h6 class="text-secondary"><strong>Tanggal Tour</strong></h6>
                                            <p>{{$row['tgl_datang']}}</p>
                                            <hr>

                                            <h6 class="text-secondary"><strong>Total</strong></h6>
                                            <p>Rp{{number_format($row['total'])}}</p>
                                            <hr>

                                            <div class="form-inline mr-5">
                                                <form action="{{ route('order.simpan') }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary">Order!</button>
                                                </form>  
                                                

                                                <form action="{{ route('order.hapus.cart', $row['customer_id'])}}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">Hapus Cart</button>
                                                </form>  
                                            </div>
                                        </div>
                                    <!-- bawah -->
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <p class="text-center">Tidak Ada Data Order</p>   
                                </div>
                                
                            @endforelse
                            </div>
                            
                        </div>
                    
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection