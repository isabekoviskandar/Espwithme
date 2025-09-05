<?php

namespace App\Domain\Audio\Model;

use App\Domain\Category\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{

    protected $fillable = 
    [
        'category_id',
        'title',
        'description',
        'audio',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
