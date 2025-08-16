<?php

namespace App\Models;

use App\Domain\Category\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = 
    [
        'category_id',
        'title',
        'description',
        'status',
        'file',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
