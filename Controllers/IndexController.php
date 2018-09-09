<?php
namespace Controllers;

use \Models\Video;

class IndexController
{
    public function index()
    {
        $video = new Video();
        $video = $video->getAll();
        $data['title'] = 'Video Search Result';
        $data['video'] = $video;

        return view('index', $data);
    }
}
