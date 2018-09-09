<?php
namespace Controllers;

use \Models\Video;

class IndexController
{
    public function index()
    {
        $videos = Video::getAll();
        $title = 'Video Search Result';

        return view('index', compact('title', 'videos'));
    }
}
