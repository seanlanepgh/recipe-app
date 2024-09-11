<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Recipe extends JsonResource
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
            "category" => $this->category,
            "area" => $this->area,
            "instructions" => $this->instructions,
            "ingredients" => $this->ingredients,
            "source" => $this->source,
            "thumbnail" => $this->thumbnail,
            "youtube" => $this->youtube,
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
