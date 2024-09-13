<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ingredient extends JsonResource
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
            'id' => $this->id,
            "name" => $this->name,
            "thumbnail" => $this->thumbnail,
            "description" => $this->description
        ];
    }
    /** Return with success = true so frontend can be sure that it is correct */
    public function with($request)
    {
        return [
            'success' => true
        ];
    }
}
