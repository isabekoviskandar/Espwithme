<?php

namespace App\Domain\BookCategory\Model;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'status',
    ];
}
