<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->getKey(),
            'mobile'                => $this->mobile,
            'name'                  => $this->name,
        ];
    }
}
