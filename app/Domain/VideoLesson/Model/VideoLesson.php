<?php

namespace App\Domain\VideoLesson\Model;

use App\Domain\Category\Model\Category;
use Illuminate\Database\Eloquent\Model;

class VideoLesson extends Model
{
    protected $fillable = 
    [
        'category_id',
        'title',
        'description',
        'source_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
