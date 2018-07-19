@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
           <div class="row">
              <div class="col-md-10">
                    <h2>Busquedas: {{$search}}</h2>
                    </div>
                    <div class="col-md-2">
                    <form class="col-md-3 pull-right" action="{{url('/buscar/'.$search)}}" method="post">
                            <label for="filter">Odernar:</label>
                            <select name="" id="">
                                <option value="new">Mas nuevos primero</option>
                                <option value="old">Mas antiguos primero</option>
                                <option value="alfa">De la A a la Z</option>
                            </select>
                        </form>
               </div>            
            </div>
              </br>

          @include('video.videoslist')
       
        </div>
       
     
    </div>
</div>
@endsection
