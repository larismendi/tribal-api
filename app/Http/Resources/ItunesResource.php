<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'provider' => 'Itunes',
            'name' => $this->resource['artistName'],
            // 'description' => $this->resource['product']['description'],
            // 'price' => $this->resource['product']['rental_rate']['price']
        ];
    }
}
