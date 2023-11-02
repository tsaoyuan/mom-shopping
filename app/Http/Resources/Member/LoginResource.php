<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->getKey(),
            'mobile'          => $this->mobile,
            'name'            => $this->name,
            'token'           => $this->token,
        ];
    }
}
