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
             <div class="comment-item cold-md-12  pull-left">
                   <!-- Botón en HTML (lanza el modal en Bootstrap) -->                   
                <div class="card">
                      <div class="card-header">
                          <strong>{{$comment->user->name.' '.$comment->user->surname}}</strong>
                          {{\FormatTime::LongTimeFilter($comment->created_at)}}
                      </div>
                      <div class="card-body">
                         
                          
                          <div class="row">
                            <div class="col-10">
                            {{$comment->body}}
                            </div>
                            <div class="col-2">
                            @if(Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id)
                              <div class="pull-right">
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#idmcmodal{{$comment->id}}">Eliminar</button>       
                                  
                                  <!-- Modal / Ventana / Overlay en HTML -->                        
                                  <div class="modal fade" id="idmcmodal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>¿Seguro que quieres borrar este elemento?</p>
                                          <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          <button type="button" class="btn btn-danger">Eliminar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>    
                        @endif
                            </div>
                          </div>
                      </div>
                  </div>
         
              </div>
         
              </br>
        @endforeach
      </div>
@endif  