<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class TvmazeRepository {
    protected $url = 'https://api.tvmaze.com';

    public function search($parameterkeyvalue = [])
    {
        $param = 'q=' . $parameterkeyvalue['q'];
        $response = Http::get($this->url . '/search/shows?' . $param);
        // regresa como matriz
        return json_decode ($response, true);
    }
}
