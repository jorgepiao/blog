<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['fecha_publicacion'];

    // Relacion uno a muchos
    public function categoria ()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
