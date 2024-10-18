<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    //tiến hành customize kiểu trả về JSON
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'name'=> $this->name,
        'price' => $this->price
       ];
    }
}
