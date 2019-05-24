<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function getRouteKeyName()
   {
        return 'url';
   }
   
   // relacion uno a muchos
   public function posts()
   {
		return $this->hasMany(Post::class);
   }

   public function setNombreAttribute($nombre)
   {
		$this->attributes['nombre'] = $nombre;
		$this->attributes['url'] = str_slug($nombre);
   }
}
