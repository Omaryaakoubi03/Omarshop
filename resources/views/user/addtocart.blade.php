@extends('user.lyouts.templete')
@section('main-content')
    <div class="container p-8">
        <h2 class="fashion_taital p-5">Cart</h2>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>




    @endif
    <div class="row">
        <div class="col-12">
            <div class="box-main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Image product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @php
                        $total=0;
                        @endphp
                        @foreach($category as $cat)
                            @php
                            $nameproduct=\App\Models\Product::where('id',$cat->product_id)->value('product_name');
                      $imgproduct=\App\Models\Product::where('id',$cat->product_id)->value('product_img');

                            @endphp
                            <tr>
                                <td>{{$nameproduct}}</td>
                                <td><img class="imgcat" src="{{asset($imgproduct)}}"></td>
                                <td>{{$cat->quntity}}</td>
                                <td>{{$cat->price}}</td>
                                <td> <a href="{{ route('removcart',$cat->id) }}" class="btn btn-warning"/> Remove </td>
                            </tr>
                            @php
                            $total=$total+$cat->price;
                            @endphp
                        @endforeach
                        @if($total > 0)

                        <tr>
                            <td></td>
                            <td></td>

                            <td>Total</td>
                            <td>{{$total}}</td>
                            <td><a href="{{route('sppingadresse')}}" class="btn btn-primary " /> Checkout </td>





                        </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
