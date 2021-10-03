@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container">
        <div>
            <img src="{{url('images',$notification->image)}}" 
                        alt="" height="400px" width="100%"/><br><br>
                        
            <h1 id="about-us-h1"><b>{{$notification->title}}</b></h1>
            <p id="about-us-p">{{$notification->description}}</p>           
          
        </div><br><br>
         <h1 id="about-us-h1" class="text-center">Recent Notifications</h1><br>
        <div class="row">
            @foreach ($latestNotification as $item)
            <div class="col-lg-4 col-md-4" data-aos="fade-up">

                <div id="services-div">
                    <a href="{{route('public.view.notification',$item->id)}}"><img src="{{url('images',$item->image)}}" height="250px" width="100%"></a><br><br>
                    <a href="{{route('public.view.notification',$item->id)}}" style="text-decoration:none;font-family:Playfair Display, serif;
                        font-weight: 550;color:black;"><h2 id="about-us-h1" class="text-center">{{$item->title}}</h2></a>
                    <p id="about-us-p" class="text-center">
                        {{Illuminate\Support\Str::limit($item->description,180)}}
                        
                    </p><br><br>
                </div>

            </div>
            @endforeach
        </div><br><br>

    </div>
    <br>
    <br>

@endsection
@push('js')
@endpush



