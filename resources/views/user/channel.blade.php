@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="container">
           <div class="row">
              <div class="col-md-9">
                    <h2>Canal de : {{$user->name.' '.$user->surname}}</h2>                                      
                     
                    </div>
                        
            </div>
              </br>

          @include('video.videoslist')
       
        </div>
       
     
    </div>
</div>
@endsection