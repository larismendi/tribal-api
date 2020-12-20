<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TvmazeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'provider' => 'Tvmaze',
            'id' => $this->resource['show']['id'],
            'name' => $this->resource['show']['name'],
            'trackName' => null,
            'link' => $this->resource['show']['url'],
            'date' => $this->resource['show']['premiered'],
            'country' => $this->resource['show']['network']['country']['name'],
            'genre' => $this->resource['show']['genres'],
            'description' => $this->resource['show']['summary'] ?? null,
            'price' => null,
            'rentalPrice' => null,
            'hdPrice' => null,
            'hdRentalPrice' => null,
        ];
    }
}
