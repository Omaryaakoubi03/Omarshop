@extends('user.lyouts.templete')
@section('main-content')
 <!-- Breadcrumbs -->

<!-- End Breadcrumbs -->

<!-- Start Checkout -->


    <h2 class="fashion_taital p-5">Final step </h2>
    <div class="container p-5">
        <div class="row " style="background-color: whitesmoke">
            <div class="col-8">
                    <div class="box-main">
<h3>                        Product will send At-
    Product will send At-
</h3>
                        <p> Phone Number -{{$number}}</p>
                        <p> City  -{{$city}}</p>
                        <p>Code Postal -{{$codepostal}}</p>

                    </div>
            </div>
            <div class="col-4">
                <div class="box-main">
                    <h3>your final product are</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            @php
                                $total=0;
                            @endphp
                            @foreach($cart as $cat)
                                @php
                                    $nameproduct=\App\Models\Product::where('id',$cat->product_id)->value('product_name');

                                @endphp
                                <tr>
                                    <td>{{$nameproduct}}</td>
                                    <td>{{$cat->quntity}}</td>
                                    <td>{{$cat->price}}</td>
                                </tr>
                                @php
                                    $total=$total+$cat->price;
                                @endphp
                            @endforeach

                                <tr>
                                    <td></td>


                                    <td>Total</td>
                                    <td>{{$total}}</td>





                                </tr>


                        </table>
                    </div>



                </div>
            </div>
        </div>
        <div class="d-flex">

        <form method="POST" >
            @csrf
            <input type="submit" value="Cancel Order" class="btn btn-danger m-3  "/>

        </form>
        <form method="POST" action="{{route('placeorder')}}">
            @csrf
            <input type="submit" value="Place Order" class="btn btn-primary m-3 "/>

        </form>
        </div>

    </div>

@endsection
