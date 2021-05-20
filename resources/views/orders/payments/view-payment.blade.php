@extends('orders.layout')

@section('title')
    <title>View Payment</title>
@endsection

@section('content')

<br>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Data Payment
                    </h4>
                </div>

               
                    <div class="card-body">
                    @foreach($viewpay as $rowpay)

                        <div class="form-group">
                            <label for="">Invoice Order</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->invoice_order }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Token Order</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->token_order }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Tipe Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->payment_type }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Kode Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->payment_code }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Total Pembayaran</label>
                            <input type="text" class="form-control"  value="{{ $rowpay->total }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Link Pembayaran</label>
                            <a href="{{ $rowpay->pdf_url}}" class="btn btn-outline-info">{{ $rowpay->pdf_url}}</a>
                        </div>

                        

                        

                    
                    @endforeach
                    </div>
                
                       
                
            </div>
        </div>
    </div>


</div>
@endsection