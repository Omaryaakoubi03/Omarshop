@extends('user.lyouts.templete')
@section('main-content')
    <div class="container deteles">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div class="product-info">

                        <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                        <p class="price_text text-left">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>


                    </div>
                    <div class="my-3 prduct-details">
                        <p class="lead">
{{$product->product_short_description}}
                        </p>
                        <ul class="p-2 bg-light my-2">
                            <li> Category - {{$product->product_category_name	}}</li>
                            <li>Sub Category _ {{$product->product_subcategory_name	}}</li>
                            <li>Available Quantity - {{$product->quntiti	}}</li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form  action="{{route('addproducttocart')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id"/>
                      <div class="form-group">
                          <label for="quntiti">How to many ?</label>
                          <input type="hidden" value="{{$product->price}}" name="price"/>

                          <input type="number" class="form-control" id="quntiti" min="1" placeholder="1" name="quntiti"  max="{{$product->quntiti}}" />
                      </div>
                            <br>
                            <input type="submit" value="Add To cart" class="btn btn-warning"/>


                        </form>
                    </div>

                </div>
            </div>
            <div class="fashion_section">
                <div id="main_slider">
                    <div class="container">
                        <h1 class="fashion_taital">Related Product</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach($related_product as $allproducte)
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
                                                </div>
                                                <div class="seemore_bt"><a href="{{route('omarshopproduct',[$allproducte->id,$allproducte->slug])}}">See More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
@endsection
