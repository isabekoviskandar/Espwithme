<?php

namespace App\Domain\VideoLesson\Service;

use App\Api\Resources\VideoLessonResource;
use App\Domain\VideoLesson\Model\VideoLesson;

class VideoLessonService{


    public function index()
    {
        $video_lessons = VideoLesson::paginate();
        return VideoLessonResource::collection($video_lessons);
    }

    public function filterByCategory($category_id)
    {
        $video_lessons = VideoLesson::where('category_id' , $category_id)->get();
        return VideoLessonResource::collection($video_lessons);
    }
}