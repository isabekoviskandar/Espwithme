<?php

namespace App\Domain\Category\Model;

use App\Domain\Audio\Model\Audio;
use App\Domain\VideoLesson\Model\VideoLesson;
use App\Models\Presentation;
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

    public function presentation()
    {
        return $this->hasMany(Presentation::class , 'category_id');
    }

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }
}
