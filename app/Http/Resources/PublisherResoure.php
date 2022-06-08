<?php

namespace App\Http\Resources;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Resources\Json\JsonResource;

class PublisherResoure extends JsonResource
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
            'description' => $this->description,
            'created_at' => $this->created_at->format("M d Y"),
            'updated_at' => $this->updated_at->format("M d Y"),
        ];
    }
}
