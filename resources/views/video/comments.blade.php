@if(session('message'))
               <div class="alert alert-success">
                    {{ session('message')}}
               </div>
@endif

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
     <label for="exampleFormControlTextarea1">Agregar un comentario</label>
     <textarea class="form-control" name="body" rows="3"></textarea>
    </div>
  <input type="submit" value="Comentar" class="btn btn-success" />
</form>