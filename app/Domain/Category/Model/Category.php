<?php

namespace App\Domain\Category\Model;

use App\Domain\VideoLesson\Model\VideoLesson;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = 
    [
        'name',
        'status',
    ];


    public function video_lesson()
    {
        return $this->hasMany(VideoLesson::class , 'category_id');
    }
}
