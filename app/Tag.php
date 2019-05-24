<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = [];
	
    public function getRouteKeyName()
    {
    	return 'url';
	}
    
    // relacion muchos a muchos
	public function posts()
    {
    	return $this->belongsToMany(Post::class);
	}

	public function setNombreAttribute($nombre)
    {
		$this->attributes['nombre'] = $nombre;
		$this->attributes['url'] = str_slug($nombre);
    }
}
