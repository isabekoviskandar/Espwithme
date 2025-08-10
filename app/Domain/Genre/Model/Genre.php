<?php

namespace App\Domain\Genre\Model;

use App\Domain\Book\Model\Book;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'status',
    ];

    public function genre()
    {
        return $this->hasMany(Book::class, 'genre_id');
    }
}
