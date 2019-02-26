@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="{{ route('updateVideo', ['video_id' => $video->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-8">

            @csrf

            <h2>Editar {{$video->title}}</h2>
            <hr></hr>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $video->title }}">
            </div>

            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea name="description" class="form-control" id="description">{{ $video->description }}</textarea>
            </div>	

            <div class="form-group custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Miniatura</label>
                <div class="row clearfix pt-1 pb-1">
                    <div class="col-2">
                        <label class="text-muted align-top">Miniatura actual</label>
                    </div>
                    <div class="col-6">
                        <img class="img-thumbnail dimimg-edit" src="{{url('/miniatura/'.$video->image)}}" alt="Card image cap">
                    </div>
                </div>

            </div>	

            <div class="form-group custom-file">
                <input type="file" class="custom-file-input" id="video" name="video">
                <label class="custom-file-label" for="video">Seleccionar video</label>
                <div class="row clearfix pt-1 pb-1">
                    <div class="col-2">
                        <label class="text-muted align-top">Video actual</label>
                    </div>
                    <div class="col-6">
                        <video controls id="video-player" class="dimimg-edit">
                        <source src="{{ route('fileVideo', ['filename' => $video->video_path])  }}" type="video/mp4">
                            Tu navegador vale callampa, no tiene HTML5
                        </video>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success">	
                <i class="far fa-save"></i>
                Guardar cambios
            </button>
        </form>
    </div>
</div>
    
@endsection