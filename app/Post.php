<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo', 'cuerpo', 'iframe', 'extracto', 'fecha_publicacion', 'categoria_id', 'user_id'
    ];

    protected $dates = ['fecha_publicacion'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

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

    public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

    public function scopePublished($query)
    {
        $query->whereNotNull('fecha_publicacion')
                ->where('fecha_publicacion', '<=', Carbon::now())
                ->latest('fecha_publicacion');
    }

    public function isPublished()
    {
        // return (bool) $this->fecha_publicacion;

        return ! is_null($this->fecha_publicacion) && $this->fecha_publicacion < today();
    }

    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl(){
        $url = str_slug($this->titulo);

        if ($this->whereUrl($url)->exists()){
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;

        $this->save();
    }

    // public function setTituloAttribute($titulo)
    // {
    //     $this->attributes['titulo'] = $titulo;
        
    //     $originalUrl = str_slug($titulo);
    //     $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();
    //     $count = 1;

    //     while($Post::where('url', $url)->exists()){
    //         $url = "{$originalUrl}-" . ++$count;
    //     }

    //     $this->attributes['url'] = $url;
    // }

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
