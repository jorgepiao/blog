<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['fecha_publicacion'];

    public function categoria ()
    {
        return $this->belongsTo(Categoria::class);
    }
}
