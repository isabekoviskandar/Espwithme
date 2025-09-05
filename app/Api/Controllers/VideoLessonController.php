<?php

namespace App\Api\Controllers;

use App\Domain\VideoLesson\Service\VideoLessonService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoLessonController extends Controller
{

    protected $video_lesson;


    public function __construct(VideoLessonService $video_lesson)
    {
        $this->video_lesson = $video_lesson;
    }


    public function index()
    {
        return $this->video_lesson->index();
    }

    public function filterByCategory($category_id)
    {
        return $this->video_lesson->filterByCategory($category_id);
    }
}
