@extends('layouts.app')

@section('content')
  </div>
    <div class="container">
       <div class="col-md-12 col-md-offset-1">
           <h2>{{$video->title}}</h2>
           <hr/>
       </div>
       <div class="col-md-12 col-sm-12">
           <!-- video -->
           <video controls id="video-player" style="width: 644px;">
               <source src="{{ route('fileVideo',['filename'=> $video->video_path])}}">
                Tu navegadoor no es compatible con Html5

           </video>       
           <!-- descripcion -->
           <div class="card">
                <div class="card-header">
                    Subido por <strong><a href="{{route('channel',['user_id'=>$video->user->id])}}">  {{$video->user->name.' '.$video->user->surname}}</a></strong>
                    {{\FormatTime::LongTimeFilter($video->created_at)}}
                </div>
                <div class="card-body">
                    {{$video->description}}
                </div>
            </div>
            <br>
            </hr>
              <h4>Comentarios</h4>
            </hr>
                     
           <!-- comentarios -->
               @include('video.comments')    

       </div>
    </div>


@endsection
