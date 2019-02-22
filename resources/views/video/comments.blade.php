<p class="mt-3">Comentarios</p>
<hr>

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="comment col-md-11">
    @if(Auth::check())
        <form action="{{url('/comment')}}" method="post">
            
            @csrf

            <input type="hidden" name="video_id" value="{{$video->id}}" required>
            <p>
                <textarea class="form-control" name="body" cols="30" rows="3" required></textarea>
            </p>
            <input type="submit" value="Comentar" class="btn btn-success">
        </form>

        <div class="clearfix"></div>
        <hr>
    @endif

    @if(isset($video->comments))

        <div id="comments-list">
            @foreach($video->comments as $comment)

                <div class="panel panel-default mt-1">
                    <div class="panel-heading size-panel-superior">
                    
                        <!-- Boton de eliminado de comentarios y otras opciones -->
                        @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))

                        <!-- Dropdown para opciones -->
                            <div class="dropdown fa-pull-right">
                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <!-- listado desplegable -->
                                    <a class="dropdown-item" href="#deleteModal2{{$comment->id}}" data-target="#deleteModal2{{$comment->id}}" data-toggle="modal">Eliminar</a>
                                </div>
                            </div>

                            <!-- Modal de eliminado -->
                            <div id="deleteModal2{{$comment->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                            <button type="button" class="close fa-pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>                                         
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que quieres borrar este comentario?</p>
                                            <p class="text-secondary"><small>{{$comment->body}}</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <!-- <button type="button" class="btn btn-danger">Eliminar</button> -->
                                            <a href="{{url('/delete-comment/'.$comment->id)}}" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                        <!-- fin dropdown -->
                        <p class="ml-3"><strong>{{$comment->user->name}}</strong> {{ \FormatTime::LongTimeFilter($comment->created_at) }}</p>
                    </div>

                    <div class="panel-body">
                        <p class="ml-3 align-content-center">{{$comment->body}}</p>
                    </div>
                </div>
                
            @endforeach
        </div>
    @endif
</div>