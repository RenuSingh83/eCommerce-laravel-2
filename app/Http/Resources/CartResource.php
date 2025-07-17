<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);

       return [

        'pid'=>$this->product_id,
         'uname'=>$this->cartUser->name,
        'gallery'=>$this->cartProductDetail->gallery,
        'name'=>$this->cartProductDetail->name,
            'price'=>$this->cartProductDetail->price,
        'category'=>$this->cartProductDetail->category,
        'description'=>$this->cartProductDetail->description,
 'cartRowID'=>$this->id,
       ];

    }
}
