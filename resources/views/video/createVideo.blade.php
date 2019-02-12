@extends('layouts.app')

@section('content')

	<div class="container">
	
		@if($errors->any()) 
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>
							{{ $error }}
						</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="row">
			
			<form action="{{ route('saveVideo') }}" method="post" enctype="multipart/form-data" class="col-lg-8">

				@csrf

				<h2>Subir un video culiao</h2>
				<hr></hr>
				<div class="form-group">
					<label for="title">Titulo</label>
					<input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
				</div>

				<div class="form-group">
					<label for="description">Descripcion</label>
					<textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
				</div>	

				<div class="form-group custom-file">
  					<input type="file" class="custom-file-input" id="image" name="image">
					<label class="custom-file-label" for="image">Miniatura</label>
				</div>	

				<br></br>

				<div class="form-group custom-file">
  					<input type="file" class="custom-file-input" id="video" name="video">
  					<label class="custom-file-label" for="video">Seleccionar video</label>
				</div>

				<br></br>

				<button type="submit" class="btn btn-success">	
					<span class="fas fa-file-upload"></span>
					Subir Video
				</button>
			</form>
		</div>
	</div>

@endsection