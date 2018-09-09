<?php

namespace Supports;

use GuzzleHttp\Client;

class HttpRequest
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
                'timeout' => 10.0
            ]);
    }

    public function get($url)
    {
        $contents = null;

        try {
            $response = $this->client->get($url);
            $body = $response->getBody();
            $header = $response->getHeaders();
            $statusCode = $response->getStatusCode();
            $contents = $body->getContents();
        } catch (\Exception $ex) {
            throw $ex;
        }

        return compact('statusCode', 'header', 'contents');
    }
}
