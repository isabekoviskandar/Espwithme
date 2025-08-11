<?php

namespace App\Domain\Category\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = 
    [
        'name',
        'status',
    ];
}
