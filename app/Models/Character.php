<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'mass', 'height', 'gender', 'picture'];

    /**
     * Get the movies for the character.
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_characters', 'character_id', 'movie_id');
    }
}
