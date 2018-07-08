<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //

     public function store(Request $request){
         $validate = $this->validate($request,[
            'body'  => 'required|min:5'        
         ]);         

         $comment = new Comment();
         $user= \Auth::user();
         $comment->user_id=$user->id;
         $comment->video_id =$request->input('videoid');
         $comment->body=$request->input('body');
         $comment->save();
        
         return redirect()->route('detailvideo',['video_id'=>$comment->video_id])->with(array(
             'message'=> 'Comentario añadido correctamente!!'
         ));
     }


}
