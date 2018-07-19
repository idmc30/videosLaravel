@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            
        <h2>Busqueda: {{$search}}</h2>
           
          
          @include('video.videoslist');
       
        </div>
       
     
    </div>
</div>
@endsection
