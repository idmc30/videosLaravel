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

              <ul class="videos-list">
                 @foreach($videos as $video)
                     <li class="video-item col-md-4 pull-left">
                        <!-- imangen de video -->
                        @if(Storage::disk('images')->has($video->image)) {{-- has sirve para comprobar si existe o no la imagen --}}
                        <div class="vide-image-thumb">
                           <div class="col-md-6 col-md-offset-3">
                             <img src="{{ url('/miniatura/'.$video->image)}}"/>
                           </div>
                        </div>
                        
                        @endif
                        <div class="data">
                          <h4>{{$video->title}}</h4>
                        </div>
                        <!-- botones de accion -->
                    </li>
                 @endforeach
              
              </ul>
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
