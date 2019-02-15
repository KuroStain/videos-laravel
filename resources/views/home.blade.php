@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="title">
                <h1 class="display-6">Ultimos videos subidos</h1>
            </div>

            <div id="videos-list">
                @foreach($videos as $video)
                    <div class="videos-item col-md-7 fa-pull-left panel panel-default">
                        <div class="panel-body">
                            <!-- imagen del video -->
                            @if(Storage::disk('image')->has($video->image))
                                <div class="video-image-thumb col-md-2 pull-left">
                                    <div class="video-image-mask">
                                        <img class="video-image" src="{{url('/miniatura/'.$video->image)}}"/>
                                    </div>
                                </div>
                            @endif

                            <div class="data">
                                <h3 class="video-title"><a href="">{{$video->title}}</a></h3>
                                <p>{{ $video->description }}</p>
                            </div>

                            <!-- botones de accion -->
                        </div>
                    </div>
                @endforeach
                </div>
        </div>

        {{$videos->links()}}

    </div>
</div>
@endsection
