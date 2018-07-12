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
  <!-- comentario-->
   {{-- este codigo va siempre y cuando en el modelo se use la clausula orderby y no en el controlador como esta en este momento  @if(isset($video->comments))  --}}  
    <div>
    <!--comentario -->
    {{-- @foreach($video->comments as $comment) --}}
    <!-- fin de comentario -->
     
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
                  @if(Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id)
                       <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Abrir ventana modal</button>
                       <!-- Modal / Ventana / Overlay en HTML -->
                        <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                               <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                @endif
              </div>
              </br>
        @endforeach
      </div>
@endif  