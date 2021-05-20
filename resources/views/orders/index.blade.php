@extends('orders.layout')

@section('title')
    <title>Order Paket Wisata</title>
@endsection

@section('content')
<br>
<br>
<div class ="container">
    
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

        

        <form action="{{ route('order.cart') }}" method="post">
        @csrf
        
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="card-title">
                    <h3>Form Order</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                <!-- start -->
                <div class="card">
                    <div class="card-body">
                    
                        <input type="hidden" class="form-control" value="{{ auth()->guard('customer')->user()->id }}" name="customer_id" required>

                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" name="customer_nama" class="form-control" value="{{ auth()->guard('customer')->user()->nama }}" required readonly>
                            <p class="text-danger">{{ $errors->first('customer_nama') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" name="customer_email" class="form-control" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                            <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">No Tlp</label>
                            <input type="text" name="customer_notlp" class="form-control" value="{{ auth()->guard('customer')->user()->no_tlp }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                            <p class="text-danger">{{ $errors->first('customer_notlp') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="customer_alamat" class="form-control" value="{{ auth()->guard('customer')->user()->alamat }}" required {{ auth()->guard('customer')->check() ? 'readonly' : ''}}>
                            <p class="text-danger">{{ $errors->first('customer_alamat') }}</p>
                        </div>

                    </div>
                </div>

                <!-- end -->
                </div>

                <!-- ini untuk nama paket dan lain -->

                <div class="col-md-6">
                <!-- start -->
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" class="form-control" value="{{ $paketw->id }}" name="paket_id" required>

                        <div class="form-group">
                            <label for="">Nama Paket Wisata</label>
                            <input type="text" class="form-control" name="paket_nama" value="{{ $paketw->nama }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Pengunjung</label>
                            <select name="jumlah" class="form-control">
                                <option value="">Pilih</option>
                                @for ($i = $paketw->min; $i <= $paketw->max; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Tanggal Tour</label>
                            <input type="text" name="tgl_datang" id="tgl_datang" class="form-control" required >
                            <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                        </div> -->

                        <div class="form-group" data-provide="datepicker">
                            <label for="">Tanggal Tour</label>
                            <input type="text" class="form-control" name="tgl_datang" id="tgl_datang">
                            <p class="text-danger">{{ $errors->first('tgl_datang') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Harga/Orang</label>
                            <input type="hidden" name="harga" class="form-control" value="{{$paketw->harga}}" required>
                            <br>
                            <h5> <span class="badge badge-secondary">Rp {{number_format($paketw->harga) }} /Orang</span></h5>
                            
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Cart Order!</button>
                        </div>

                    </div>
                </div>

                <!-- end -->
                </div>
            </div>

        </div>
        </form>

</div>

@endsection

@section('js')
    <!-- <script src="{{ asset('bootstrap-4.5.0-dist/js/datepicker.js')}}"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
    <!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
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