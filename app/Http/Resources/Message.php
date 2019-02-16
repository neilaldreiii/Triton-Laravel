<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'message' => $this->message,
            'sender' => $this->sender,
            'sender_id' => $this->sender_id,
            'created_at' => $this->created_at
        ];
    }
    //
    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_url' => url('http:://projectowl.dev')
        ];
    }
}