<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

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
        try {
            return [
                'provider' => 'crcind',
                'id' => $this->resource['ID'],
                'name' => $this->resource['Name'],
                'trackName' => null,
                'link' => null,
                'image' => null,
                'date' => $this->resource['DOB'],
                'country' => null,
                'description' => $this->resource['SSN'],
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
