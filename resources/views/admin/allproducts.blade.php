@extends('admin.lyouts.templete')

@section('title-page')

    all product
@endsection
@section('content')
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product </h4>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>

            @endif
            <div class="card">
                <h5 class="card-header">Available Product Information</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Img</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($product as $products)
                            <tr>
                                <td>{{$products->id}}</td>
                                <td>{{$products->product_name}}</td>
                                <td> <img style="height: 100px" src="{{asset($products->product_img)}}">
                                    <br>
                                    <a href="{{ route('editproductiiimage',$products->id) }}" class="btn btn-primary">Edit Image</a>


                                </td>
                                <td>{{$products->price}}</td>


                                <td>
                                    <a href="{{route('editeproduct',$products->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletproduct',$products->id) }}" class="btn btn-warning">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    @endsection

@endsection
