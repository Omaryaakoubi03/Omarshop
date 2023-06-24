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
                        <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Electronics" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="10" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantiti</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="quntiti" name="quntiti" placeholder="1000" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short description</label>
                                <div class="col-sm-10">
                                    <textarea cols="30" rows="10"  name="product_short_description" id="product_short_description" class="form-control"> </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                                <div class="col-sm-10">
                                    <textarea cols="30" rows="10" name="product_long_description" id="product_long_description" class="form-control"> </textarea>
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


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"> Upload image Product</label>
                                <div class="col-sm-10">
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04"
                                        aria-label="Upload"
                                        name="product_img"
                                        id="product_img"
                                    />
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">z
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

@endsection
