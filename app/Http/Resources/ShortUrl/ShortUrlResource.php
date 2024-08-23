<?php

namespace App\Http\Resources\ShortUrl;

use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrlResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'original_url' => @$this['original_url'],
            'short_url'    => asset(@$this['url_code']),
            'expired_at'   => dateFormat1_1(@$this['expired_at']),
        ];
    }
}
