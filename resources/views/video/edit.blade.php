@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar {{$video->title}}</h2>
    <hr>
    <div class="row">  
    <form action="{{route('updateVideo',$video->id)}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
     <div class="form group">
       <label for="title">Titulo</label>
       <input type="text" class="form-control" id="title" name="title" value="{{$video->title}}">
     </div>
     <div class="form group">
       <label for="description">Descripcion</label>
       <textarea class="form-control" id="description" name="description"> {{$video->description}}</textarea>
     </div>
     <div class="form group">
       <label for="image">Miniatura</label>
       @if(Storage::disk('images')->has($video->image)) {{-- has sirve para comprobar si existe o no la imagen --}}                              
            <div class="vide-image-thumb col-3">
            <div class="video-image-mask">
                <img src="{{ url('/miniatura/'.$video->image)}}" class="video-imagen"/>
            </div>
            </div>
         @endif
       <input type="file" class="form-control" id="image" name="image" />
     </div>
     <div class="form group">
       <label for="video">Archivo de Video</label>
        <!-- video -->
        <video controls id="video-player" style="width: 644px;">
               <source src="{{ route('fileVideo',['filename'=> $video->video_path])}}">
                Tu navegadoor no es compatible con Html5

        </video>       
       <input type="file" class="form-control" id="video" name="video"/>
     </div>
      <br>
       <button type="submit" class="btn btn-success">Modificar Video</button>
       
     
    </form>
    </div>
   
</div>

@endsection  