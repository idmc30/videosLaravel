@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
              @if(session('message'))
               <div class="alert alert-success">
                    {{ session('message')}}
               </div>
              @endif

              <div class="videos-list">
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
                                  <h4>{{$video->title}}</h4>
                                </div>
                                <!-- botones de accion -->
                             </div> 
                            </div> 
                          </div>  {{--fin de la clase container--}}                              
                        </div> 
                        <br>
                    </div>
                 @endforeach              
              </div>
        </div>
        {{$videos->links()}}
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> -->

    </div>
</div>
@endsection
