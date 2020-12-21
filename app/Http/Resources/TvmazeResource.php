<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

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
        try {
            return [
                'provider' => 'tvmaze',
                'id' => $this->resource['show']['id'],
                'name' => $this->resource['show']['name'],
                'trackName' => null,
                'link' => $this->resource['show']['url'],
                'image' => $this->resource['show']['image']['medium'],
                'date' => $this->resource['show']['premiered'],
                'country' => $this->resource['show']['network']['country']['name'],
                'description' => $this->resource['show']['summary'],
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
