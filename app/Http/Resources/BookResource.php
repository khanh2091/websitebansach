<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'price' => $this->price,
            'quantity' => $this->quantity,
            'images' => $this->images,
            'sold' => $this->sold,
            'page_number' => $this->page_number,
            'description' => $this->description,
            'discount' => $this->discount,
            'status' => $this->status,
            'reprint_date' => $this->reprint_date,
            'publication_date' => $this->publication_date,
            'category_id' => $this->category_id,
            'language_id' => $this->language_id,
            'publisher_id' => $this->publisher_id,
            'author_id' => $this->author_id,
            'created_at' => $this->created_at->format("M d Y"),
            'updated_at' => $this->updated_at->format("M d Y"),
        ];
    }
}
