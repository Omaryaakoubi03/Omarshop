@extends('admin.lyouts.templete')
@section('title-page')

    Dshboard omarShop
@endsection
@section('content')
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Order Statistics</h5>
                    <small class="text-muted">  Total Sales</small>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column align-items-center gap-1">
                        @php $count = App\Models\Order::count(); @endphp
                        <h2 class="mb-2">@php echo $count; @endphp</h2>
                        <span>Total Orders</span>
                    </div>
                    <div id="orderStatisticsChart"></div>
                </div>
                @php $allctego=\App\Models\Subcategory::latest()->get(); @endphp
                @foreach($allctego as $catg)
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                            ><i class="bx bx-mobile-alt"></i
                                ></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{$catg->category_name}} </h6>
                                    <small class="text-muted">{{$catg->subcategory_name}}</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{$catg->product_count}}k</small>
                                </div>
                            </div>
                        </li>

                    </ul>
                @endforeach
            </div>
        </div>
    </div>


@endsection
