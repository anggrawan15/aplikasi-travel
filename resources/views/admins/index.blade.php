@extends('admins.layout')

@section('title')
    <title>Admin Home</title>
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Halaman Admin</h5>
            </div>
            <div class="card-body">
            <!-- card body -->
                <div class="row">
                <!-- row card 1 -->
                    <div class="col-md-6">
                        <div class="list-group">
                           
                            <a href="{{route('admin.daftar.customer')}}" class="list-group-item list-group-item-action">
                                Daftar Customer
                            </a>

                            <a href="{{route('admin.daftar.order')}}" class="list-group-item list-group-item-action">
                                Daftar Order
                            </a>

                            

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="list-group">

                            <a href="{{route('admin.order.memesan')}}" class="list-group-item list-group-item-action list-group-item-secondary">
                                Order Status Memesan
                            </a>

                            <a href="{{route('admin.order.menunggu')}}" class="list-group-item list-group-item-action list-group-item-info">
                                Order Status Menunggu
                            </a>

                            <a href="{{route('admin.order.menunggu.bayar')}}" class="list-group-item list-group-item-action list-group-item-warning">
                                Order Status Menunggu Pembayaran
                            </a>

                            <a href="{{route('admin.order.dibatalkan')}}" class="list-group-item list-group-item-action list-group-item-danger">
                                Order Status Dibatalkan
                            </a>

                            <a href="{{route('admin.order.telahdibayar')}}" class="list-group-item list-group-item-action list-group-item-primary">
                                Order Status Telah Dibayar
                            </a>

                            <a href="{{route('admin.order.selesai')}}" class="list-group-item list-group-item-action list-group-item-success">
                                Order Status Selesai
                            </a>
                        </div>                

                    </div>
                    
                <!-- row card 1 -->
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <!-- col md 12 -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice</th>
                                        <th>Nama paket</th>
                                        <th>Status</th>
                                        <th>TGL Tour</th>
                                        <th>Touris</th>
                                        <th>Total Bayar</th>
                                        <th>Tools</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($instat as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->invoice}}</td>
                                        <td>{{$row->paket->nama}}</td>
                                        <td>{!! $row->status_order !!}</td>
                                        <td>{{ $row->tgl_datang }}</td>
                                        <td class="text-center">{{ $row->jumlah }}</td>
                                        <td>Rp {{ number_format($row->total) }}</td>
                                        
                                        <td>
                                            <form action="{{route('admin.view.order', $row->id)}}" method="get">
                                            @csrf
                                                <button class="btn btn-outline-info">Detail</button>
                                            </form>
                                        </td>        
                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <br>

                            <!-- <div class="row"> -->
                                <div class="col-sm-3">
                                        <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                                    {!! $instat->links() !!}
                                </div>
                            <!-- </div> -->

                    <!-- col md 12 -->
                    </div>
                        
                </div>
            <!-- card Body -->
            </div>
        </div>
    </div>

@endsection