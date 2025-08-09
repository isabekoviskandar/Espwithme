<?php

namespace App\Domain\Genre\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'status',
    ];
}
