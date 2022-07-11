<?php

namespace App\Http\Resources;

use App\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

class OderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data=Book::where('ma', '=' , $this->product_id)->first();
        $this->name_product = $data->title;
        $this->images = $data->images;
        return [
            'id' => $this->id,
            'ma' => $this->product_id,
            'order_id' => $this->order_id,
            'name_product' => $this->name_product,
            'images' => $this->images,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}
