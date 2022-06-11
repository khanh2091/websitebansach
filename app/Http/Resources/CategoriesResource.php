<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->parent_id==null){
            $this->parent_id = '';
        }        
        return [
            'ma' => $this->ma,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at->format("M d Y"),
            'updated_at' => $this->updated_at->format("M d Y"),
        ];
    }
    public function toString($request)
    {       
        return [
            'value' => $this->ma,
            'text' => $this->title,
        ];
    }
}
