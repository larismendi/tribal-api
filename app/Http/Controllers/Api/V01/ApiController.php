<?php

namespace App\Http\Controllers\Api\V01;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Repositories\ApiRepository;

/**
* @OA\Info(title="Tribal API", version="1.0")
*
* @OA\Server(url="http://localhost:8000")
*/
class ApiController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/search",
    *     summary="Mostrar contents",
    *     @OA\Parameter(
    *         description="Q: valor a buscar.",
    *         in="query",
    *         name="q",
    *         required=true,
    *         example="girls",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los contents."
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    /**
     * Search method
     *
     * @param ApiRequest $request
     * @return void
     */
    public function search(ApiRequest $request) {
        $repository = new ApiRepository();
        $result = $repository->getApiPost($request->only(['q']));

        return json_encode($result);
    }
}
