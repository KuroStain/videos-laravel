@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-12 col-md-offset-1">

		<h3>{{ $video->title }}</h3>
		<hr>
		<div class="col-md-8">

			<video controls id="video-player" class="video-size">
				<source src="{{ route('fileVideo', ['filename' => $video->video_path])  }}" type="video/mp4">
					Tu navegador vale callampa, no tiene HTML5
			</video>

			<div class="panel panel-default video-data mt-2">
				<div class="panel-heading size-panel-superior">
					
					<!-- Dropdown de opciones -->
					@if(Auth::check() && (Auth::user()->id == $video->user_id))

					<!-- Dropdown para opciones -->
						<div class="dropdown fa-pull-right">
							<button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<!-- listado desplegable -->
								<a class="dropdown-item" href="#deleteVideo{{$video->id}}" data-target="#deleteVideo{{$video->id}}" data-toggle="modal">Eliminar</a>
								<a class="dropdown-item" href="{{url('/edit-video/'.$video->id)}}">Modificar</a>
							</div>
						</div>

						<!-- Modal de eliminado -->
						<div id="deleteVideo{{$video->id}}" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">¿Estás seguro?</h4>
										<button type="button" class="close fa-pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>                                         
									</div>
									<div class="modal-body">
										<p>¿Seguro que quieres borrar este video?</p>
										<p class="text-secondary"><small>{{$video->title}}</small></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										<a href="{{url('/delete-video/'.$video->id)}}" class="btn btn-danger">Eliminar</a>
									</div>
								</div>
							</div>
						</div>

					@endif
					<!-- fin dropdown -->

					<p class="card-text ml-3">Video subido por <a href="{{ route('channelUser', ['user_id' => $video->user->id]) }}" class="card-text sub-card-text">{{$video->user->name}}</a> {{ \FormatTime::LongTimeFilter($video->created_at) }}</p>
					
				</div>

				<div class="panel-body">
					<p class="card-text ml-3">{{ $video->description }}</p>
				</div>
			</div>

			@include('video.comments')

		</div>


		

	</div>
</div>


@endsection