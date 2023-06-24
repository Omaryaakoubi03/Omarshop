@extends('admin.lyouts.templete')

@section('title-page')

Message
@endsection
@section('content')
@foreach ($messagee as $message )
<div class="card p-1 m-5">
    <h5 class="card-header">Message</h5>
    <div class="card-body">

          <img src="{{asset('dashboard/assets/img/avatar.png')}}" class="rounded-circle " style="margin-left:44%;">

          <div class="py-4"> <br>
             Name :{{$message->name}}<br>
             Email :{{$message->email}}<br>
             Phone :{{$message->phone}}
          </div>
          <hr/>
    <h5 class="text-center" style="text-decoration:underline"><strong>Subject :</strong> {{$message->subject}}</h5>
          <p class="py-5">{{$message->message}}</p>


    </div>
  </div>

@endforeach
@endsection
