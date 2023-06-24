@extends('user.lyouts.userprofiletemplete')
@section('contentprofile')
   <h2 class="fashion_taital p-5">Pending Orders </h2>

   @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>

    @endif
    <table class="table">
        <tr>
            <th> Product Name</th>
            <th> Price</th>
        </tr>
        @php
            $total=0;
        @endphp
    @foreach($pendingorders as $orders)
            <tr>
                <td>{{$orders->product_name}} </td>
                <td>{{$orders->totalprice}}</td>
                @php

                $total=$total+$orders->totalprice;
                @endphp

            </tr>




    @endforeach
    </table>
   <a  href="{{ route('pyment') }}" style="align-items: center ;margin-left: 250px" class="btn btn-success">Pay {{$total}} from Paypal</a>



@endsection
