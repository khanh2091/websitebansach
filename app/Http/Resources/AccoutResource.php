<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccoutResource extends JsonResource
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
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'telephone' => $this->telephone,
            'role' => $this->role,
            'address' => $this->address,
            
            'created_at' => $this->created_at->format("M d Y"),
            'updated_at' => $this->updated_at->format("M d Y"),
        ];
    }
}
