<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CrcindResource extends JsonResource
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
            'provider' => 'Crcind',
            'id' => $this->resource['ID'],
            'name' => $this->resource['Name'],
            'trackName' => null,
            'link' => null,
            'date' => $this->resource['DOB'],
            'country' => null,
            'genre' => null,
            'description' => $this->resource['SSN'] ?? null,
            'price' => null,
            'rentalPrice' => null,
            'hdPrice' => null,
            'hdRentalPrice' => null,
        ];
    }
}
