@extends('admins.layout')

@section('title')
    <title>Detail Order</title>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Order {{$viewOrder->invoice}}
            </h4>
        </div>

        <form action="{{route('admin.order.update', $viewOrder->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="invoice">Invoice</label>
                    <input type="text" name="invoice" class="form-control" value="{{ $viewOrder->invoice }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="customer_email">Email Customer</label>
                    <input type="text" name="customer_email" class="form-control" value="{{ $viewOrder->customer_email }}" required readonly>
                    <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                </div>

                <div class="form-group">
                    <label for="customer_notlp">customer_notlp</label>
                    <input type="text" name="customer_notlp" class="form-control" value="{{ $viewOrder->customer_notlp }}" required readonly>
                    <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                </div>

                <div class="form-group">
                    <label for="customer_nama">Nama Customer</label>
                    <input type="text" name="customer_nama" class="form-control" value="{{ $viewOrder->customer_nama }}" required>
                    <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                </div>

                <div class="form-group">
                    <label for="customer_alamat">customer_alamat</label>
                    <input type="text" name="customer_alamat" class="form-control" value="{{ $viewOrder->customer_alamat }}" required>
                    <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                </div>

                <div class="form-group" data-provide="datepicker">
                    <label for="tgl_datang">Tanggal Tour</label>
                    <input type="text" class="form-control" name="tgl_datang" id="tgl_datang" value="{{$viewOrder->tgl_datang}}">
                    <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                </div>

                <label for="">Status</label>
                        @if($viewOrder->status == 0)
                            <span class="badge badge-secondary">Memesan</span>
                        @elseif($viewOrder->status == 1)
                            <span class="badge badge-info">Menunggu</span>
                        @elseif($viewOrder->status == 2)
                            <span class="badge badge-warning">Menunggu Pembayaran</span>
                        @elseif($viewOrder->status == 3)
                            <span class="badge badge-danger">Dibatalkan</span>
                        @elseif($viewOrder->status == 4)
                            <span class="badge badge-primary">Telah Di Bayar</span>
                        @else
                            <span class="badge badge-success">Selesai</span>
                        @endif
                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status">
                        <option selected value="{{ $viewOrder->status }}">Pilih..</option>
                        <option value="0">Memesan</option>
                        <option value="1">Menunggu</option>
                        <option value="2">Menunggu Pembayaran</option>
                        <option value="3">Dibatalkan</option>
                        <option value="4">Telah Di Bayar</option>
                        <option value="5">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Pengunjung</label>
                    <input type="text" name="jumlah" class="form-control" value="{{ $viewOrder->jumlah }}" required readonly>
                    <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" name="total" class="form-control" value="{{ $viewOrder->total }}" required readonly>
                    <p class="text-danger">{{ $errors->first('total') }}</p>
                </div>

                <div class="form-group">
                    <!-- <button class="btn btn-primary btn-sm">Ubah</button> -->
                    <button class="btn btn-warning btn-lg btn-block">Update</button>
                </div>

            </div>
        </form>
        
    </div>
</div>


@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/js/smoothness/jquery-ui.css')}}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery/jquery-1-12-4.js')}}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery-ui.js')}}"></script>
    <script>
        $('#tgl_datang').datepicker({
            "dateFormat":'dd-mm-yy',
            "todayHighlight": true,
            "setDate": new Date(),
            "autoclose": true
            
        })
    </script>
@endsection