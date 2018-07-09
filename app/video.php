<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    //enlasando a la tabla videos
    protected $table='videos';
    
    //relacion one to many
    public function comments(){
        return $this->hasMany('App\Comment');
        //para poder hacer un listado ordenado se puede agrgar el orderby
        //  return $this->hasMany('App\Comment')->orderBy('id','desc');
    }
   
    //relacion a de Muchos a uno
     public function user(){
        return $this->belongsTo('App\User', 'user_id');
     }





}
