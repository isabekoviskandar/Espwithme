<?php

namespace App\Domain\Book\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = 
    [
        'title',
        'author',
        'genre',
        'description',
        'image',
        'file',
    ];
}
