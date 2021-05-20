@extends('admins.layout')

@section('title')
    <title>pay test</title>
@endsection

@section('content')

<br>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Data Payment Customer
                    </h4>
                </div>

               
                    <div class="card-body">
                    @foreach($file as $rowpay)

                        <p>{{$rowpay->store}}</p>
                        <p>{{$rowpay->payment_code}}</p>
                        <p>{{$rowpay->order_id}}</p>
                        <p>{{$rowpay->transaction_status}}</p>
                    
                    @endforeach
                    </div>
                
                
            </div>
        </div>
    </div>


</div>
@endsection