@extends('orders.layout')

@section('title')
    <title>List Order User</title>
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    List Order
                    <a href="{{ route('paket.public')}}" class="btn btn-primary btn-sm float-right">Order!</a>
                </h4>
                
            </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <div class="row">
                        <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-md-1">invoice</th>
                            <th class="col-md-2">Nama Paket</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-2">Tanggal Tour</th>
                            <th class="col-md-1">Jumlah Peserta</th>
                            <th class="col-md-2">Total Pembayaran</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </div>
                        
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                        @forelse ($orderp as $row)
                        <tr>
                        

                            <td>{{ $no++ }}</td>
                            <td class="text-center">{{$row->invoice}}</td>
                            <td class="text-center">{{$row->paket->nama}}</td>
                            <td>{!! $row->status_order !!}</td>
                            <td>{{ $row->tgl_datang }}</td>
                            <td class="text-center">{{ $row->jumlah }}</td>
                            <td class="text-center">{{$row->total}}</td>
                            

                            <td class="form-inline">
                                @if($row->status == 0)

                                <form action="{{ route('order.batal', $row->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                </form>

                                @elseif($row->status == 1)

                                    <div class="btn-group">
                                        <form action="{{ route('order.payment.bayar', $row->id) }}" method="get">
                                        @csrf
                                            <button class="btn btn-success">Bayar</button>
                                        </form>

                                        <form action="{{ route('order.batal', $row->id)}}" method="post">
                                        @csrf
                                            <button class="btn btn-danger"onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                        </form>
                                    </div>

                                

                                @elseif($row->status == 2)
                                    <div class="btn-group">
                                        <form action="{{ route('order.payment.view', $row->id)}}" method="GET">
                                        @csrf
                                            <button class="btn btn-success">Bayar</button>
                                        </form>

                                        <form action="{{ route('order.batal', $row->id)}}" method="post">
                                        @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Order ini?')">Batal</button>
                                        </form>
                                    </div>
                                
                                @elseif($row->status == 3)
                                    <p class="text-danger">Maaf Order Ini Dibatalkan!</p>


                                @elseif($row->status == 4)
                                    <p class="text-primary">Silahakan Tour Pada Tanggal : {{$row->tgl_datang}}</p>
                            
                                @else
                                    <p class="text-success">Order Ini Telah Selesai Terimakasih!</p>
                                @endif
                            

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    
                    
                    </tbody>

                
                </table>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                    {!! $orderp->links() !!}
                </div>
            </div>
            
           
        </div>
    </div>


        
        </div>
    </div>
    
</div>
@endsection