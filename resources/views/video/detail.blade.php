@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12 col-md-offset-1">

        <h3>{{ $video->title }}</h3>
        <hr>
        <div class="col-md-8">

            <video controls id="video-player">
                <source src="{{ route('fileVideo', ['filename' => $video->video_path])  }}" type="video/mp4">
                    Tu navegador vale callampa, no tiene HTML5
            </video>

            <div class="panel panel-default mt-3">
                <div class="panel panel-heading">
                    <p>Video subido por <strong> [user] </strong> {{ \FormatTime::LongTimeFilter($video->created_at) }}</p>
                </div>
                <div class="panel panel-body">
                    <p class="card-text">{{ $video->description }}</p>
                </div>
            </div>

            @include('video.comments')

        </div>


        

    </div>
</div>


@endsection