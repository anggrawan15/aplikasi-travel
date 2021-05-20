@extends('orders.layout')

@section('title')
    <title>Payment</title>
@endsection

@section('content')
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <div class="card-header">
                    
                        <div class="card-title">
                            <h3>Payment</h3>
                        </div>
                    </div>

                        <div class="card-body">
                        <!-- start -->

                        <div class="form-group">
                            <label for="">Nama Customer</label>
                            <input type="text" class="form-control" name="customer_nama" value="{{ $payment->customer_nama }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Email Customer</label>
                            <input type="email" class="form-control" name="customer_email" value="{{ $payment->customer_email }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Total Bayar</label>
                            <input type="text" class="form-control" name="total" value="{{ $payment->total }}" required readonly>
                        </div>

                        <button id="pay-button" class="btn btn-success">Bayar</button>

                        <!-- End -->
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    


@endsection

@section('js')

        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

        <div class="container">
            <form action= "{{ route('payment.simpan') }}" id="form-submit" onfocus="paySubmit()" method="post" >
                @csrf
            
                <input type="hidden" class="form-control" value="{{ $payment->id }}" name="order_id" required>

                <input type="hidden" id="invoice_order" class="form-control" value="{{ old('invoice_order')}}" name="invoice_order" required>

                <input type="hidden" id="token_order" class="form-control" value="{{ old('token_order') }}" name="token_order" required>

                <input type="hidden" id="payment_type" class="form-control" value="{{ old('payment_type') }}" name="payment_type" required>

                <input type="hidden" id="payment_code" class="form-control" value="{{ old('payment_code') }}" name="payment_code" required>
                <input type="hidden" id="pdf_url"  name="pdf_url" class="form-control" value="{{ old('pdf_url') }}" required>

                <input type="hidden" id="total" name="total" class="form-control" value="{{ old('total') }}" required>

                <input type="hidden" id="status"  name="status" class="form-control" value="{{ old('status') }}" required>

                <input type="hidden" id="transaction_time"  name="transaction_time" class="form-control" value="{{ old('transaction_time') }}" required >

                <!-- <div class="form-group">
                    <label for="invoice_order">Invoice Order</label>
                    <input id="invoice_order" type="text" name="invoice_order" class="form-control" value="{{ old('invoice_order')}}" required>
                </div>

                <div class="form-group">
                    <label for="token_order">Token Order</label>
                    <input id="token_order" type="text" name="token_order" class="form-control" value="{{ old('token_order') }}" required>
                </div>

                <div class="form-group">
                    <label for="payment_type">Type Pembayaran</label>
                    <input id="type_pay" type="text" name="payment_type" class="form-control" value="{{ old('payment_type') }}" required>
                </div>

                <div class="form-group">
                    <label for="payment_code">Payment Code</label>
                    <input id="payment_code" type="text" name="payment_code" class="form-control" value="{{ old('payment_code') }}" required>
                </div>

                <div class="form-group">
                    <label for="pdf_url">link Pdf</label>
                    <input id="pdf_url" type="text" name="pdf_url" class="form-control" value="{{ old('pdf_url') }}" required>
                </div>

                <div class="form-group">
                    <label for="total">total</label>
                    <input id="total" type="text" name="total" class="form-control" value="{{ old('total') }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ old('status') }}" required>
                </div>

                <div class="form-group">
                    <label for="transaction_time">Transaction Time</label>
                    <input id="transaction_time" type="text" name="transaction_time" class="form-control" value="{{ old('transaction_time') }}" required >
                </div> -->

                <!-- <div class="form-group">
                    <button class="btn btn-primary btn-sm" id="btntb">Tambah</button>
                </div> -->
            </form>

        </div>

       
        



        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-GTn6T8XHx7EujKPz"></script>

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script type="text/javascript">
        
        function paySubmit() {
            document.getElementById("form-submit").submit();
        }
        
        
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snapToken ?? '' ?>', {
                    // Optional
                    onSuccess: function (result){
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

                         //merubah file json menjadi string
                         var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        

                        if(objJson.payment_type == "bank_transfer"){

                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;

                                document.getElementById('payment_code').value = y;

                                document.getElementById('pdf_url').value = objJson.pdf_url;

                                document.getElementById('token_order').value = objJson.transaction_id;

                                document.getElementById('invoice_order').value = objJson.order_id;

                                document.getElementById('transaction_time').value = objJson.transaction_time;

                                document.getElementById('total').value = objJson.gross_amount;

                                document.getElementById('status').value = objJson.transaction_status;

                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = objJson.payment_code;

                            document.getElementById('pdf_url').value = objJson.pdf_url;

                            document.getElementById('token_order').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;

                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;

                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();

                        }  
                        
                        
                    },
                    // Optional
                    onPending: function(result){
                       //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

                        // var x,y,i;
                        // for(i in objJson.va_numbers){
	                    //     x = objJson.va_numbers[0].bank;
                        //     y = objJson.va_numbers[0].va_number;
                        // }
                        //     document.getElementById('va_bank').innerHTML = x;
                        //     document.getElementById('va_number').innerHTML = y;

                            //merubah file json menjadi string
                            var comJson = JSON.stringify(result, null, 2);
                            //merubah file string menjadi object
                            var objJson = JSON.parse(comJson);

                        

                        if(objJson.payment_type == "bank_transfer"){

                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;

                                document.getElementById('payment_code').value = y;

                                document.getElementById('pdf_url').value = objJson.pdf_url;

                                document.getElementById('token_order').value = objJson.transaction_id;

                                document.getElementById('invoice_order').value = objJson.order_id;

                                document.getElementById('transaction_time').value = objJson.transaction_time;

                                document.getElementById('total').value = objJson.gross_amount;

                                document.getElementById('status').value = objJson.transaction_status;

                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = objJson.payment_code;

                            document.getElementById('pdf_url').value = objJson.pdf_url;

                            document.getElementById('token_order').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;

                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;

                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();

                        }  
                    },
                    // Optional
                    onError: function(result){
                        //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

                         //merubah file json menjadi string
                        var comJson = JSON.stringify(result, null, 2);
                        //merubah file string menjadi object
                        var objJson = JSON.parse(comJson);


                        if(objJson.payment_type == "bank_transfer"){

                            var x,y,i;
                            for(i in objJson.va_numbers){
                                // x = objJson.va_numbers[0].bank;
                                y = objJson.va_numbers[0].va_number;
                            }
                                // document.getElementById('va_bank').innerHTML = x;
                                document.getElementById('payment_type').value = objJson.payment_type;

                                document.getElementById('payment_code').value = y;

                                document.getElementById('pdf_url').value = objJson.pdf_url;

                                document.getElementById('token_order').value = objJson.transaction_id;

                                document.getElementById('invoice_order').value = objJson.order_id;

                                document.getElementById('transaction_time').value = objJson.transaction_time;

                                document.getElementById('total').value = objJson.gross_amount;

                                document.getElementById('status').value = objJson.transaction_status;

                                document.getElementById("form-submit").onfocus();



                        }else{
                            document.getElementById('payment_type').value = objJson.payment_type;

                            document.getElementById('payment_code').value = objJson.payment_code;

                            document.getElementById('pdf_url').value = objJson.pdf_url;

                            document.getElementById('token_order').value = objJson.transaction_id;

                            document.getElementById('invoice_order').value = objJson.order_id;

                            document.getElementById('transaction_time').value = objJson.transaction_time;

                            document.getElementById('total').value = objJson.gross_amount;

                            document.getElementById('status').value = objJson.transaction_status;

                            document.getElementById("form-submit").onfocus();

                        }  
                    }
            });
        };

        </script>


@endsection