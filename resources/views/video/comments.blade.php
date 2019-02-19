<hr>
<p>Comentarios</p>
<hr>
<div class="comment col-md-11">
    <form action="#" method="post">
        
        @csrf

        <input type="hidden" name="video_id" value="{{$video->id}}" required>
        <p>
            <textarea class="form-control" name="body" cols="30" rows="10" required></textarea>
        </p>
        <input type="submit" value="Comentar" class="btn btn-success">
    </form>
</div>