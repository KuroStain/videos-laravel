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

                            

                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top img-thumbnail dimimg" src="{{url('/miniatura/'.$video->image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <a href="{{ route('videoDetail', ['video_id' => $video->id]) }}" class="video-title">{{$video->title}}</a>
                                    <p class="card-text">{{ substr($video->description,0, 50).' ...' }}</p>
                                    <p class="card-text sub-card-text">[autor]</p>
                                    
                                </div>
                                <div class="card-body">
                                    {{-- <a href="" class="btn btn-success">Ver</a> --}}
                                    @guest<!--(Auth::check() && Auth::user()->id == $video->user->id)-->
                                    @else
                                        {{--@if(Auth::user()->id == $video->user->id) --}}
                                            {{--<a href="#" class="btn btn-warning">Editar</a>
                                            <a href="" class="btn btn-danger">Eliminar</a> --}}
                                        {{--@endif--}}

                                    @endguest
                                    
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
