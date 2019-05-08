<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['fecha_publicacion'];

    public function getRouteKeyName()
    {
        return 'url';
    }


    // Relacion uno a muchos
    public function categoria ()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('fecha_publicacion')
                ->where('fecha_publicacion', '<=', Carbon::now())
                ->latest('fecha_publicacion');
    }
}
