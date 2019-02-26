@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="title">
                <h1 class="display-6">Ultimos videos subidos</h1>
            </div>
        </div>

        <hr>

            <!-- Test Tarjeta Bootstrap -->

        <div class="container">
            <div class="row">
                <div class="grid"> 

                        @foreach($videos as $video)
                        
                            <div class="card">
                                <div class="top-img">
                                    <div class="full-img">
                                        <img class="card-img-top img-thumbnail dimimg" src="{{url('/miniatura/'.$video->image)}}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="card-body">
                                    <a href="{{ route('videoDetail', ['video_id' => $video->id]) }}" class="video-title">{{$video->title}}</a>
                                    <p class="card-text">{{ substr($video->description,0, 50).' ...' }}</p>
                                    <p class="card-text sub-card-text">{{$video->user->name}}</p>                                   
                                </div>
                            </div>

                        @endforeach

                </div> 
            </div>
        </div>
            <!-- Fin Test Tarjeta -->     
        <div class="container">
            <hr>
            <div class="row">
                {{$videos->links()}}
            </div>
        </div>


    </div>

@endsection
