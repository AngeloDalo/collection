<?php

namespace App\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'nome',
        'comprati',
        'usciti',
        'letti',
        'finito',
        'costo_singolo',
        'costo_totale',
        'image',
        'slug',
        'user_id',
        'created_at',
        'updated_at',
    ];

    //1 to *
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($nome)
    {
        $slug = Str::slug($nome, '-');

        $oldComic = Comic::where('slug', $slug)->first();

        $counter = 0;
        while ($oldComic) {
            $newSlug = $slug . '-' . $counter;
            $oldComic = Comic::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
