@extends('admin.lyouts.templete')

@section('title-page')

    pending orders
@endsection
@section('content')
<div class="container my-5">
    <div class="card p-5">
        <div class="card-title">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>   Pending orders</h4>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>




            @endif


        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th> User id</th>
                    <th>shpping Information</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>

                </tr>
                @foreach($pendingorders as $order)
                    <tr>
                        <th> {{$order->user_id}}</th>
                        <th>
                            <ul>
                                <li> Phone Number -{{$order->shpping_number}}</li>
                                <li>City - {{$order->shpping_city}}</li>
                                <li>Code Postal - {{$order->shpping_codepostal}}</li>
                            </ul>
                        </th>
                        <th>{{$order->product_name}}</th>
                        <th>{{$order->qunatiti}}</th>
                        <th>{{$order->totalprice}}</th>
                        <th><a href="{{route('deleteorder',$order->user_id)}}" class="btn btn-success"> Aprouve Now</a></th>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection
