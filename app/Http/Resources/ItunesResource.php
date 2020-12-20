<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class ItunesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try {
            return [
                'provider' => 'Itunes',
                'id' => $this->resource['trackId'],
                'name' => $this->resource['artistName'],
                'trackName' => $this->resource['trackName'],
                'link' => $this->resource['trackViewUrl'],
                'date' => $this->resource['releaseDate'],
                'country' => $this->resource['country'],
                'genre' => $this->resource['primaryGenreName'],
                'description' => $this->resource['shortDescription'] ?? null,
                'price' => $this->resource['trackPrice'],
                'rentalPrice' => $this->resource['trackRentalPrice'] ?? null,
                'hdPrice' => $this->resource['trackHdPrice'] ?? null,
                'hdRentalPrice' => $this->resource['trackHdRentalPrice'] ?? null,
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
