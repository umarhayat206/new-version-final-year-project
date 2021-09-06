<style>
    a {
        cursor: pointer;
        color: #6c757d;
    }

</style>


@extends('layouts.MasterAdmin')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">{{ $notification->title }}</h3>
                    <a href="{{ route('notifications.index') }}" class="btn btn-outline-secondary float-right">Back To
                        notifications</a>
                </div>
                <br>
                <div class="media">
                    <div class="media-body">
                        <p>{{ $notification->description }}</p>
                        <div class="float-right">
                            <span class="text-muted">Dated : {{$notification->created_at}} </span>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
