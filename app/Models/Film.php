<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    protected $fillable = ['title', 'status', 'link', 'poster'];

    public $timestamps = false;
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    public function getPosterUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->poster ?? 'posters/default.jpg');
    }
}
