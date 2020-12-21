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
                'provider' => 'itunes',
                'id' => $this->resource['trackId'],
                'name' => $this->resource['artistName'],
                'trackName' => $this->resource['trackName'],
                'link' => $this->resource['trackViewUrl'],
                'image' => $this->resource['artworkUrl100'],
                'date' => $this->resource['releaseDate'],
                'country' => $this->resource['country'],
                'description' => $this->resource['shortDescription'],
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
