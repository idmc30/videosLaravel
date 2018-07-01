<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table='comments';
   //relacion a de Muchos a uno
   public function user(){
    return $this->belongsTo('App\User', 'user_id');
 }

}
