<?php

namespace App\Domain\Book\Model;

use App\Domain\Genre\Model\Genre;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = 
    [
        'genre_id',
        'title',
        'author',
        'genre',
        'description',
        'image',
        'file',
    ];


    public function genre()
    {
        return $this->belongsTo(Genre::class , 'genre_id');
    }
}
