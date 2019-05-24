<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo', 'cuerpo', 'iframe', 'extracto', 'fecha_publicacion', 'categoria_id',
    ];

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

    public function setTituloAttribute($titulo)
    {
		$this->attributes['titulo'] = $titulo;
		$this->attributes['url'] = str_slug($titulo);
    }

    public function setFechaPublicacionAttribute($fecha_publicacion)
    {
        $this->attributes['fecha_publicacion'] = $fecha_publicacion ? Carbon::parse($fecha_publicacion) : null;
    }

    public function setCategoriaIdAttribute($categoria)
    {
        $this->attributes['categoria_id'] = Categoria::find($categoria)
                                ? $categoria
                                : Categoria::create(['nombre' => $categoria])->id;
    }

    public function syncTags($tags){
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['nombre' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}
