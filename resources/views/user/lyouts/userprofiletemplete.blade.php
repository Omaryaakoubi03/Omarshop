@extends('user.lyouts.templete')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('admindashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('pendingordrs')}}">Pending Orders</a></li>
                        <li><a href="{{route('history')}}">History</a></li>
                        <li><a href= "{{ route('logoutt') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('contentprofile')
                </div>
            </div>
        </div>
    </div>
@endsection
