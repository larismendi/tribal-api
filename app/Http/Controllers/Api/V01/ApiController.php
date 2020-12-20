<?php

namespace App\Http\Controllers\Api\V01;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Repositories\Repository;

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
    *     summary="Mostrar posts",
    *     @OA\Parameter(
    *         description="Provider: el proveedor a consultar (podria ser itunes, tvmaze o crcind).",
    *         in="query",
    *         name="provider",
    *         required=true,
    *         example="itunes",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         description="Term: valor a buscar (es requerido si provider es Itunes).",
    *         in="query",
    *         name="term",
    *         required=false,
    *         example="jack+johnson",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         description="Media: tipo de resultado (es requerido si provider es Itunes).",
    *         in="query",
    *         name="media",
    *         required=false,
    *         example="music",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         description="Name: valor a buscar (es requerido si provider es Tvmaze).",
    *         in="query",
    *         name="name",
    *         required=false,
    *         example="Adam",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         description="Q: valor a buscar (es requerido si provider es Crcind).",
    *         in="query",
    *         name="q",
    *         required=false,
    *         example="girls",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los posts."
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    /**
     * Search method
     */
    public function search(ApiRequest $request) {
        $repository = new Repository($request->only(['provider']));
        $result = $repository->getPost($request->all());

        return json_encode($result);
    }
}
