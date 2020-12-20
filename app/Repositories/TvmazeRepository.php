<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class TvmazeRepository {
    protected $url;

    public function __construct()
    {
        $this->url = env('TVMAZE_URL');
    }

    public function search($param)
    {
        $param = 'q=' . $param['q'];
        $response = Http::get($this->url . '/search/shows?' . $param);
        // regresa como matriz
        $results = json_decode($response, true);
        return response()->success(['result' => [
            'resultCount' => count($results),
            'results' => $results
        ]]);
    }
}
