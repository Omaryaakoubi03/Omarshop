@extends('user.lyouts.templete')
@section('main-content')

    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital"> {{$categoryname}}-({{$product_count}})</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach($product as $allproducte)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{$allproducte->product_name}}</h4>
                                    <p class="price_text">Price  <span style="color: #262626;">$ {{$allproducte->price}}</span></p>
                                    <div class="tshirt_img"><img src="{{asset($allproducte->product_img)}}"></div>
                                    <div class="btn_main">
                                        <div class="buy_bt">
                                            <form  action="{{route('addproducttocart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$allproducte->id}}" name="product_id"/>

                                                <input type="hidden" value="{{$allproducte->price}}" name="price"/>
                                                <input type="hidden" value="1" name="quntiti"/>


                                                <input type="submit" value="Buy Now" class="btn btn-warning"/>


                                            </form>
                                        </div>                                        <div class="seemore_bt"><a href="{{route('omarshopproduct',[$allproducte->id,$allproducte->slug])}}">See More</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
