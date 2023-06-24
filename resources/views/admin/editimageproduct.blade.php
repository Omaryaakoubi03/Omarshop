@extends('admin.lyouts.templete')
@section('title-page')

    Edit Image product
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Upadte Image Product</h5>
                        <small class="text-muted float-end">Input Information </small>
                    </div>
                    <div class="card-body">
                        <form action="{{route('upadteimageproduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Previoce Image Product</label>
                                <div class="col-sm-10">
                                <img src="{{asset($imageinfoo1)}}">
                                </div>
                                <input type="hidden" name="id" value="{{$imageinfoo}}">
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
                                        name="product_img",
                                        id="product_img"
                                    />
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Image Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

@endsection
