<?php

namespace App\Http\Resources\Members\Search;

use App\Helpers\BasicResponse;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BadRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $now = Carbon::now()->setTimezone('Asia/Taipei')->format('Y-m-d H:i:s');
        
        $basic = new BasicResponse($now, '000', '測試');
        $basic = $basic->getBasic();
        // dd($basic->getBasic());

        return $basic;

        
        }
    
    }
    