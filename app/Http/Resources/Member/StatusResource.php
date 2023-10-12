<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusResource extends JsonResource
{
    
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'     => $this->getKey(),
            'name'   => $this->name,
            'mobile' => $this->mobile,
        ];
    }
}
