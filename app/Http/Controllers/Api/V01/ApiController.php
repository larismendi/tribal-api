<?php

namespace App\Http\Controllers\Api\V01;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Repositories\ItunesRepository;
use App\Repositories\Repository;

class ApiController extends Controller
{
    /**
     * Search method
     */
    public function search(ApiRequest $request) {
        $repository = new Repository($request->only(['provider']));
        $result = $repository->getPost($request->all());

        return json_encode($result);
    }
}
