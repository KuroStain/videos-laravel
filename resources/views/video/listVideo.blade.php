<div class="container">
        <div class="row">
            <div class="grid"> 
                @if(sizeof($videos) >= 1)

                    @foreach($videos as $video)
                    
                        <div class="card">
                            <div class="top-img">
                                <div class="full-img">
                                    @if($video->image == NULL)
                                        <img class="card-img-top img-thumbnail dimimg" src="#" alt="Card image cap">
                                    @else
                                        <img class="card-img-top img-thumbnail dimimg" src="{{url('/miniatura/'.$video->image)}}" alt="Card image cap">
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('videoDetail', ['video_id' => $video->id]) }}" class="video-title">{{$video->title}}</a>
                                <p class="card-text">{{ substr($video->description,0, 50).' ...' }}</p>
                                <a href="{{ route('channelUser', ['user_id' => $video->user->id]) }}" class="card-text sub-card-text">{{$video->user->name}}</a>                                
                            </div>
                        </div>

                    @endforeach

                @else
                    <div class="alert alert-warning">Busqueda no arrojo resultados</div>
                @endif

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