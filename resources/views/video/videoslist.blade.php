<div class="videos-list">
              @if(count($videos) >= 1)
                 @foreach($videos as $video)
                     <div class="video-item col-md-12 pull-left panel panel-default">                          
                         <div class="card">
                           <div class="card-body">
                           <div class="container"> {{--clase container--}}  
                           <div class="row">                               
                              @if(Storage::disk('images')->has($video->image)) {{-- has sirve para comprobar si existe o no la imagen --}}
                              
                                <div class="vide-image-thumb col-3">
                                  <div class="video-image-mask">
                                    <img src="{{ url('/miniatura/'.$video->image)}}" class="video-imagen"/>
                                  </div>
                                </div>

                                @endif
                                <div class="data col">
                                  <h4 class="video-title"><a href="">{{$video->title}}</a></h4>
                                    <p> <a href="{{route('channel',['user_id'=>$video->user->id])}}">  {{$video->user->name.' '.$video->user->surname}}</a>| {{\FormatTime::LongTimeFilter($video->created_at)}}</p>
                                   <!-- botones de accion -->
                                   <a href="{{url('/video/'.$video->id)}}" class="btn btn-outline-info">Ver</a>
                                    @if(Auth::check() && Auth::user()->id == $video->user->id)

                                     <a href="{{url('/editar-video/'.$video->id)}}" class="btn btn-outline-warning">Editar</a>
                                     <!-- Eliminar video -->
                                       <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminarvideo{{$video->id}}">Eliminar</button>       
                                   
                                        <!-- Modal / Ventana / Overlay en HTML -->                        
                                        <div class="modal fade" id="eliminarvideo{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">¿Estas seguro?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <p>¿Seguro que quieres borrar el video?: </p>
                                                <p class="text-warning"><small>{{$video->title}}</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                                          
                                                <a href="{{url('/delete-video/'.$video->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                               
                             </div> 
                            </div> 
                          </div>  {{--fin de la clase container--}}                              
                        </div> 
                        <br>
                    </div>
                 @endforeach
               @else
                  <div class="alert alert-warning">no hay videos actualmente</div>

               @endif                
           {{$videos->links()}} 
        </div>