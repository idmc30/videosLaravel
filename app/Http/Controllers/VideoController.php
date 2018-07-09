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
    

}
