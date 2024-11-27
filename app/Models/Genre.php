<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    protected $fillable = ['title'];

    public $timestamps = false;

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'film_genre');
    }
}

