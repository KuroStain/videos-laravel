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
        <h2>Canal de {{$user->name}}</h2>
        </div>
    </div>

    <hr>

    @include('video.listVideo')

</div>
    
@endsection