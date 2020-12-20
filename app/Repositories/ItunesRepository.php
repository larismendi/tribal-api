<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class ItunesRepository {
    protected $url;

    public function __construct()
    {
        $this->url = env('ITUNES_URL');
    }

    public function search($params = [])
    {
        $param = 'term=' . $params['term'] . '&media=' . $params['media'];
        $response = Http::get($this->url . '/search?' . $param);
        // regresa como matriz
        return response()->success(['result' => json_decode($response, true)]);
    }
}
