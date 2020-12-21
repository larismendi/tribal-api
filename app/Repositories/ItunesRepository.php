<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class ItunesRepository {
    protected $url;

    public function __construct()
    {
        $this->url = env('ITUNES_URL');
    }

    /**
     * Search function
     *
     * @param [type] $param
     * @return void
     */
    public function search($param)
    {
        $term = 'term=' . $param['q'];
        $response = Http::get($this->url . '/search?' . $term);

        return json_decode($response, true)['results'];
    }
}
