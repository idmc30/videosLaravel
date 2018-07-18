<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Comment;

class VideoController extends Controller
{
    //
   public function createVideo(){
     return view('video.createVideo');

   }

   public function saveVideo(Request $request){
    //validar formulario
    $validatedata = $this->validate($request, [
         'title'=>'required|min:5',
         'description'=>'required',
         'video'=>'mimes:mp4'

    ]);

    $video= new Video();
    $user = \Auth::user();//conseguimos el usuario
    $video->user_id=$user->id;
    $video->title = $request->input('title');
    $video->description= $request->input('description');
     
    //subienda de la miniatura
    $image = $request->file('image');
     if($image){
        $image_path= time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $video->image = $image_path;
     }

     //subida de el video
     $video_file= $request->file('video');
     if($video_file){
         $video_path = time().$video_file->getClientOriginalName();
         \Storage::disk('videos')->put($video_path,\File::get($video_file));

         $video->video_path= $video_path;
     }


    $video->save();

    return redirect()->route('home')->with(array(
     "message"=> 'El video se ha subiro correctamente!!'
    ));

   }

   public function getImage($filename){
       $file= Storage::disk('images')->get($filename);
       return new Response($file, 200);
   }

   public function getVideoPage($video_id){
      $video= Video::find($video_id);
      $comments = Comment::where('video_id', $video_id)
      ->orderBy('id','desc')
      ->get();
      
    //   $videos= Video::orderBy('id','desc')->paginate(5);
      return view('video.detail',array(
          'video'=>$video,
          'comments'=>$comments
      ));
   }
   
   public function getVideo($filename){
    $file= Storage::disk('videos')->get($filename);
    return new Response($file, 200);
   }
    
   public function delete($video_id){
       $user= \Auth::user();
       $video = Video::find($video_id);
       $comments= Comment::where('video_id',$video_id)->get();

       if($user && $video->user_id == $user->id){
           if($comments && count($comments)>=1){ //verifico si existen comentarios del video
                  //eliminar comentarios                                      
              Comment::where('video_id', $video_id)->get()->each->delete();
           }          

            //eliminar ficheros
            Storage::disk('images')->delete($video->image);
            Storage::disk('videos')->delete($video->video_path);

            //eliminar registro
            $video->delete();
            $message=array('message'=>'Video eliminado correctamente');
       }  else{
           $message=array('message'=>'El Video no se ha podido eliminar');

       }
       return redirect()->route('home')->with($message);

   }
   
/*
 Las findOrFaily firstOrFaillos
 métodos recuperará el primer resultado de la consulta; sin embargo, si no se encuentra 
 ningún resultado, se arrojará a:Illuminate\Database\Eloquent\ModelNotFoundException
*/
   public function edit($id){
    $user= \Auth::user();
    $video=Video::findOrFail($id);
    if($user && $video->user_id == $user->id){     
       return view('video.edit',array(
           'video'=> $video
       ));
    }else{
         return redirect()->route('home');

    }
   }
  
   public function update($video_id,Request $request){
     $validate= $this->validate($request, array(
        'title'=>'required|min:5',
        'description'=>'required',
        'video'=>'mimes:mp4'
     ));
     $user= \Auth::user(); 
     $video= Video::findOrFail($video_id);
     $video->user_id= $user->id;
     $video->title= $request->input('title');
     $video->description= $request->input('description');

     $image = $request->file('image');
     //subir imagen
     if($image){
        // Delete image
        if($video->image) {
            Storage::disk('images')->delete($video->image);
        }
          //update de la imagen
        $image_path= time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $video->image = $image_path;
     }

      //video
     $video_file= $request->file('video');
     if($video_file){
          // Delete video
          if($video->video_path) {
            Storage::disk('videos')->delete($video->video_path);
        }

         $video_path = time().$video_file->getClientOriginalName();
         \Storage::disk('videos')->put($video_path,\File::get($video_file));

         $video->video_path= $video_path;
     } 
     
     $video->update();
     return redirect()->route('home')->with(array('message'=>'Video actualizado correctamente'));
     
   }

}
