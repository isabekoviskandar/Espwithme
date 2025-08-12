<?php

namespace App\Domain\VideoLesson\Service;

use App\Api\Resources\VideoLessonResource;
use App\Domain\VideoLesson\Model\VideoLesson;

class VideoLessonService{


    public function index()
    {
        $video_lessons = VideoLesson::paginate();
        return new VideoLessonResource($video_lessons);
    }
}