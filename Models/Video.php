<?php

namespace Models;

use Supports\Model;
use Supports\HttpRequest;

class Video extends Model
{
    public function getAll()
    {
        $client = new HttpRequest();
        $items = [];

        try {
            $contents = $client->get('https://s3-ap-southeast-1.amazonaws.com/ysetter/media/video-search.json');
            $contents = json_decode($contents, true);
            $items = $contents['items'];
            $videos = [];
            foreach ($items as $item) {
                $snippet = $item['snippet'];
                $id = $item['id'];

                if ($id['kind'] == 'youtube#channel') {
                    continue;
                }
                $video = new Video();
                $video->id = $id['videoId'];
                $video->title = $snippet['title'];
                $video->description = $snippet['description'];
                $video->thumbnail = $snippet['thumbnails']['medium'];
                $video->url = 'http://www.youtube.com/embed/' . $id['videoId'] . '?rel=0&amp;autoplay=1';
                $videos[] = $video;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $videos;
    }
}
