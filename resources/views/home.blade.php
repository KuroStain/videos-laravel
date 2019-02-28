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

        @include('video.listVideo')

    </div>

@endsection
