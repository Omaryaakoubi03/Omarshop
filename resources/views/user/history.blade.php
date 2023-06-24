
@extends('user.lyouts.userprofiletemplete')
@section('contentprofile')
    <h2 class="fashion_taital p-5">History </h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>

    @endif
    <table class="table">
        <tr>
            <th> Product Name</th>
            <th> Date</th>
        </tr>
        @php

        @endphp

        @foreach($pendingorders as $orders)
            <tr>
                <td>{{$orders->product_name}} </td>
                <td>  @php

                        echo now()->format('d-m-Y')
                    @endphp
                </td>


            </tr>




        @endforeach
    </table>



@endsection
