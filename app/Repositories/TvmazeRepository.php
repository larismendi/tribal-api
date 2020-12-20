<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class TvmazeRepository {
    protected $url;

    /**
     * Construct function
     */
    public function __construct()
    {
        $this->url = env('TVMAZE_URL');
    }

    /**
     * Search function get items from Tvmaze
     *
     * @param [type] $param
     * @return void
     */
    public function search($param)
    {
        $param = 'q=' . $param['q'];
        $response = Http::get($this->url . '/search/shows?' . $param);
        return json_decode($response, true);
    }
}
