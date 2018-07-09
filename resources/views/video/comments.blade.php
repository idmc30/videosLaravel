@if(session('message'))
               <div class="alert alert-success">
                    {{ session('message')}}
               </div>
@endif
@if(Auth::check())
      <form method="POST" action="{{route('comment')}}">
      {{csrf_field()}}
        @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all()  as $error)
                      <li>{{$error}}</li>
                  @endforeach         
              </ul>
            </div>
          @endif
          <div class="form-group">
            <input type="hidden" id="videoid" name="videoid" value="{{$video->id}}" required/>
          </div>
          <div class="form-group">
          <label for="exampleFormControlTextarea1">Agregar un comentarios</label>
          <textarea class="form-control" name="body" rows="3"></textarea>
          </div>
        <input type="submit" value="Comentar" class="btn btn-success" />
      </form>
@endif
<br>
</hr>
@if(isset($comments))

<!-- este codigo va siempre y cuando en el modelo se use la clausula orderby y no en el controlador
como esta en este momento
   @if(isset($video->comments)) -->

<div>
<!-- @foreach($video->comments as $comment) -->
    @foreach($comments as $comment)
          <div class="comment-item cold-md-12 pull-left">
            <div class="card">
                  <div class="card-header">
                      <strong>{{$comment->user->name.' '.$comment->user->surname}}</strong>
                      {{\FormatTime::LongTimeFilter($comment->created_at)}}
                  </div>
                  <div class="card-body">
                      {{$comment->body}}
                  </div>
              </div>
            
          </div>
          </br>
    @endforeach
  </div>
@endif  