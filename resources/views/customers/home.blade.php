@extends('customers.layout-customer')

@section('title')
    <title>Customer Dashbord</title>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Dashbord</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-group">
                            <a href="{{route('order.carts')}}" class="list-group-item list-group-item-action">
                                Cart Order
                            </a>
                            <a href="{{route('order.list')}}" class="list-group-item list-group-item-action">
                                List Order
                            </a>
                        </div>
                    </div>


                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection