<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function getRouteKeyName()
   {
		return 'nombre';
   }
   
   // relacion uno a muchos
   public function posts()
   {
		return $this->hasMany(Post::class);
   }
}
