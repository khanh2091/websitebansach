<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ma' => $this->ma,
            'name' => $this->name,
            'created_at' => $this->created_at->format("M d Y"),
            'updated_at' => $this->updated_at->format("M d Y"),
        ];
    }
}
