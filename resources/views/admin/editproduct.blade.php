@extends('admin.lyouts.templete')
@section('title-page')

    add product
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add New Product</h5>
                        <small class="text-muted float-end">Input Information </small>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$infoproduct->product_name}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price" value="{{$infoproduct->price}}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantiti</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="quntiti" name="quntiti" value="{{$infoproduct->quntiti}}" />
                                </div>
                            </div>
<input type="hidden" name="idproduct" id="idproduct" value="{{$infoproduct->id}}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short description</label>
                                <div class="col-sm-10">
                                    <textarea cols="30" rows="10"  name="product_short_description"  id="product_short_description" class="form-control">{{$infoproduct->product_short_description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                                <div class="col-sm-10">
                                    <textarea cols="30" rows="10" name="product_long_description" id="product_long_description" class="form-control">{{$infoproduct->product_long_description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Category</label>
                                <div class="col-sm-10">
                                    <select id="product_category_name" name="product_category_name" class="form-select form-select-lg">
                                        <option> select category</option>

                                        @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>


                                        @endforeach

                                    </select>                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Sub Category</label>
                                <div class="col-sm-10">
                                    <select id="product_subcategory_id" name="product_subcategory_id" class="form-select form-select-lg">
                                        <option> select Sub category</option>

                                        @foreach($subcategorys as $category)
                                            <option value="{{$category->id}}">{{$category->subcategory_name}}</option>


                                        @endforeach

                                    </select>                                </div>
                            </div>




                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

@endsection
