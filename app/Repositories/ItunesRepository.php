<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class ItunesRepository {
    protected $url = 'https://itunes.apple.com';

    public function search($params = [])
    {
        $param = 'term=' . $params['term'] . '&media=' . $params['media'];
        $response = Http::get($this->url . '/search?' . $param);
        // regresa como matriz
        return json_decode($response, true);
    }
}
